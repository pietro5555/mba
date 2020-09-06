<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Socialite;
use App\Models\User;
use App\Models\Seguridad;
use Mail;
use DB;
use Hash;
use Carbon\Carbon; 


use Google_Client;
use Google_Service_People;
use PragmaRX\Google2FA\Google2FA;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    
    /*Hacemos la verificacion de seguridad */
    public function login(Request $request){
        
    $this->validateLogin($request);
 
      if ($this->hasTooManyLoginAttempts($request)) {
        $this->fireLockoutEvent($request);
 
        return $this->sendLockoutResponse($request);
      }
      
      $user = User::where($this->username(), '=', $request->user_email)->first();
      
      if (password_verify($request->password, optional($user)->password)) {
        $this->clearLoginAttempts($request);
        
        //para activar el pop up
        $user->pop_up = 1;
        $user->save();
        //fin pop up
        
        if($user->rol_id != 0){
        
        $verdad = $this->verificarTipo($user->ID);
        
        if($verdad){
        $validar = $this->envioCodigo($user->ID);
        
        if($validar == 3){
            return view("auth.codigo", compact('user'));
        }elseif($validar == 2){
            
            $mostrar = $this->mostrarqr($user->ID);
            $urlQR = $this->createUserUrlQR($user->ID);
            return view("auth.autenticacion", compact('user','urlQR','mostrar')); 
        }
        
        }else{
            Auth::loginUsingId($user->ID);
 
           return redirect('/');
          } 
        
        }else{
            Auth::loginUsingId($user->ID);
 
           return redirect('/');
        }
        
      }
      
      $this->incrementLoginAttempts($request);
    
    return $this->sendFailedLoginResponse($request);
    
    }
    
    
    /* verificacmos si hay necesidad de enviar el codigo
    * o usas codigo qr
    */
    public function verificarTipo($usuario){
        
        $true = false;
        $fechaActual = Carbon::now();
        $fechaActual = date('Y-m-d', strtotime($fechaActual));
        $seguridad = Seguridad::where('status','1')->first();
        $user = User::find($usuario);
        
        if($seguridad != null){
            if($seguridad->id == 3){
                
                $codigo = random_int(100000, 999999);
                $user->autenticacion = $codigo;
                $user->save();
                
            }elseif($seguridad->id == 2){
                
            }
            
             if($user->fechaver == null){
                 
                $true = true;
                
             }else{
                 
                if($seguridad->tipo == '1'){
                 $fechauser = date('Y-m-d', strtotime($user->fechaver));
                 if($fechauser < $fechaActual){
                    $true = true; 
                 }
                 
                }elseif($seguridad->tipo == '2'){
                    $true = true;
                }else{
                    $fechauser = new Carbon($user->fechaver);
                    $fechauser = $fechauser->addMonth(1);
                    $fechauser = date('Y-m-d', strtotime($fechauser));
                    if($fechauser < $fechaActual){
                    $true = true; 
                    }
                  } 
               }
            }
        
        
        return $true;
    }
    
    
    /* Enviamos el codigo ya sea por correo o por qr*/
    public function envioCodigo($iduser){
        
        $validar =0;
        $user = User::find($iduser);
        $seguridad = Seguridad::where('status','1')->first();
      
      if($seguridad->id == 3){
        $validar = 3;
        
      $mensaje = str_replace('@nombre', ' '.$user->display_name.' ', $seguridad->contenido);
      $mensaje = str_replace('@correo', ' '.$user->user_email.' ', $mensaje);
      $mensaje = str_replace('@codigo', ' '.$user->autenticacion.' ', $mensaje);
            
      Mail::send('emails.codigoPerfil',  ['data' => $mensaje], function($msj) use ($user, $seguridad){
          $msj->subject($seguridad->titulo);
          $msj->to($user->user_email);
        });
        
      }else{
          $validar = 2;  
      }
      
      return $validar;
    }
    
    
    /* verificamos el codigo del correo */
    public function verificarCodigo(Request $request){
        
        $user = User::find($request->iduser);
        
        if($user->autenticacion == $request->codigo){
            
            $user->fechaver = Carbon::now();
            $user->save();
            
           Auth::loginUsingId($user->ID);
 
           return redirect('/admin');
        }else{
            
        return view("auth.codigo", compact('user'))->withErrors(['error'=> 'Código de verificación incorrecto']);
        }
    }
    
    
    public function createUserUrlQR($iduser){
 
        $user = User::find($iduser);
        $google2fa = (new \PragmaRX\Google2FAQRCode\Google2FA());
        $company = trim(str_replace('/mioficina', ' ', request()->root()));
        $company = trim(str_replace('https://www.', ' ', $company));
        
        if($user->factor2 == null){
         
         $user->factor2 = (new Google2FA)->generateSecretKey();
         $user->save();
         
         $token = $google2fa->generateSecretKey(32);
         $user->factor2 = $token;
         $user->save();

         $inlineUrl = $google2fa->getQRCodeInline(
         $company,
         '',
         $token
          );

        }else{
        
         $inlineUrl = $google2fa->getQRCodeInline(
         $company,
         '',
         $user->factor2
        );
        
        }

        return $inlineUrl;
    }
    
    
    public function mostrarqr($iduser){
        
        $mostrar = 1;
        $user = User::find($iduser);
        if($user->factor2 == null){
            $mostrar = 0;
        }
        
        return $mostrar;
    }
    
    
    public function factor2(Request $request){
 
    $user = User::find($request->iduser);
    if ((new Google2FA())->verifyKey($user->factor2, $request->codigo)) {
        $request->session()->regenerate();
        
        $user->fechaver = Carbon::now();
        $user->save();
            
        Auth::loginUsingId($user->ID);
        return redirect('/admin');
    }

   $mostrar = $this->mostrarqr($user->ID);
   $urlQR = $this->createUserUrlQR($user->ID);
    
 
   return view("auth.autenticacion", compact('urlQR', 'user','mostrar'))->withErrors(['error'=> 'Codigo de verificacion incorrecto']);
  
    }
    

   /**
     * Obtain the user information from provider and log in the user.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try{
            $user = Socialite::driver($provider)->user();
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            abort(403, 'Unauthorized action.');
            return redirect()->to('/');
        }
        $attributes = [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'avatar' => $user->getAvatar(),

        ];

        $user = User::where('provider_id', $user->getId() )->first();
        
        if (!$user){
            try{
                $user=  User::create($attributes);
            }catch (ValidationException $e){
              return redirect()->to('/home');
            }
        }

        $this->guard()->login($user);
        return redirect()->to($this->redirectTo);

    }        
}
