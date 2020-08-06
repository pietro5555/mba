<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;
use App\Models\Sidebar; use App\Models\MenuAction; use App\Models\User;
use Auth; use DB; use Hash; use App\Models\Rol;
use Mail;

class RecuperarController extends Controller
{

  public function Correo(Request $dato)
  {
    $user = User::where('user_email', $dato['email'])->get()->toArray();
    if (!empty($user)) {
      $usuario = User::find($user[0]['ID']);
      $numerorando = random_int(1000000, 9999999);
      $combinar = $numerorando.$user[0]['ID'];
      $token = base64_encode($combinar);
      $usuario->token_correo = $token;
      $usuario->save();

      $data = [
        'codigo' => $token
      ];

      Mail::send('emails.recuperarcorreo',  ['data' => $data], function($msj) use ($dato){
          $msj->subject('Cambio de Clave');
          $msj->to($dato['email']);
      });

      return redirect('login')->with('msj2', 'Por Favor revise su correo electronico');
    } else {
      return redirect('login')->with('msj3', 'El Correo Electronico no esta registrado');
    }
  }

  public function getCodigo($codigo)
  {
    $user = User::where('token_correo', $codigo)->get()->toArray();
    if (!empty($user)) {
      $iduser = $user[0]['ID'];
      return view('auth.resetcorreo')->with(compact('iduser'));
    }else{
      return redirect('login')->with('msj3', 'El código de validación ya expiro');
    }
  }

  public function change(Request $data)
  {
      $validatedData = $data->validate([
        'password' => 'required|string|min:6|confirmed',
    ]);
    if ($validatedData) {
      $usuario = User::find($data['iduser']);
      $usuario->user_pass = md5($data['password']);
      $usuario->password = bcrypt($data['password']);
      $usuario->clave = encrypt($data['password']);
      $usuario->save();
      return redirect('login')->with('msj2', 'Cambio de Clave Exitoso');
    }
  }

  // public function nuevoLogin(Request $datos)
  // {
  //   $data = [
  //   	'user_email' => $datos['user_email'],
  //   	'password' => $datos['password']
  //   ];
  //
  //   if (Auth::attempt($data)) {
  //   	$result = true;
  //   }else{
  //     $data = [
  //         	'user_login' => $datos['user_email'],
  //         	'password' => $datos['password']
  //         ];
  //     if (Auth::attempt($data)) {
  //     	$result = true;
  //     }else{
  //     	$result = false;
  //     }
  //   }
  //
  //   if ($result) {
  //     var_dump(Auth::user()->ID);
  //   } else {
  //     return redirect('login')->with('msj3', 'Estas credenciales no coinciden con nuestros registros.');
  //   }
  // }
}
