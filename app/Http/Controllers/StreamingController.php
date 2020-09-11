<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class StreamingController extends Controller
{
    public $client;

    function __construct()
	{
        // TITLE
		view()->share('title', 'Test De Streaming');
	}
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

        // CREDENCIALES PARA API DE IBM

        // https://ibm.github.io/video-streaming-developer-docs/
        // usuario: proyectos@fenttix.com
        // Contraseña: Livembapro123*


    
        // http://localhost:8000/?access_token=54644cedbc4818a28a2001e41ea8570fab520e4b&token_type=bearer&expires_in=86400&state=XYZ
        // https://authentication.video.ibm.com/authorize?response_type=token&client_id=f462391e32e1374ceebeac9e840dc94c1c3c71d5&client_secret=5216193d16334f15908940d518d2adf1546dc752&redirect_uri=https://metalinks.com.ve/prueba&state=XYZ

        //Obtener code
        // https://authentication.video.ibm.com/authorize?response_type=code&client_id=ca361d98cfa63255356b644e83130e919e62085e&redirect_uri=http://localhost:8000/&state=XYZ

        //result
        // http://localhost:8000/?code=643f3906bf9605da966c6a69c77946c52b0cf180&state=XYZ



        $client = new Client([
            // El base_uri se utiliza para peticiones relativas
            'base_uri' => 'https://authentication.video.ibm.com'
          ]);

        // $response = $client->post("https://authentication.video.ibm.com/authorize");
        // $response = $client->request('GET', '/authorize', [
        //     'form_params' => [
        //         'response_type' => 'token',
        //         'client_id' => 'ca361d98cfa63255356b644e83130e919e62085e',
        //         'client_secret' => 'ea6b8144deeec575c3d327faa8015b5729d43ddf',
        //         'redirect_uri' => 'http://localhost:8000/',
        //         'state' => 'XYZ',
                
        //     ]
        //   ]);

	   	return view('streaming.indexstreaming')->with(compact('hola'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAccessToken()
    {

        // {
        //     "channel": {
        //         "id": "23961562",
        //         "title": "LaraCanal",
        //         "url": "http://www.ustream.tv/channel/tLScnqZ7KVF",
        //         "tiny_url": "http://www.ustream.tv/channel/id/23961562"
        //     }
        // }

        $client = new Client();
        $response = $client->request('POST', 'https://video.ibm.com/oauth2/token', [
            'Authorization' => 'Basic ' .base64_encode('ca361d98cfa63255356b644e83130e919e62085e:ea6b8144deeec575c3d327faa8015b5729d43ddf'),
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => 'ca361d98cfa63255356b644e83130e919e62085e',
                'client_secret' => 'ea6b8144deeec575c3d327faa8015b5729d43ddf',
                'redirect_uri' => 'http://localhost:8000/get_access_token',
                'code' => '643f3906bf9605da966c6a69c77946c52b0cf180',
            ]
        ]);

    //     +"access_token": "9d17fb622ef158fa70b7c65b6cce9823146fdef7"
    //     +"refresh_token": "f80383c9540efabc0ad11b8b90be2029bb1a1073"
    //     +"token_type": "bearer"
    //     +"expires_in": 86400
    //   }

        $result =  json_decode( $response->getBody() );

        dd($result);
        
	   	return view('streaming.indexstreaming')->with(compact('hola'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
