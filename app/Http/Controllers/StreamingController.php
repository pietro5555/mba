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
    

        //Obtener code
        // https://authentication.video.ibm.com/authorize?response_type=code&client_id=ca361d98cfa63255356b644e83130e919e62085e&redirect_uri=http://localhost:8000/&state=XYZ

        //result code (Este lo uso para luego pedir el ACCESS TOKEN)
        // http://localhost:8000/?code=643f3906bf9605da966c6a69c77946c52b0cf180&state=XYZ


	   	return view('streaming.indexstreaming')->with(compact('hola'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAccessToken()
    {

        $client = new Client();
        $response = $client->request('POST', 'https://video.ibm.com/oauth2/token', [
            'Authorization' => 'Basic ' .base64_encode('ee69a8f44e5eef4a512eaa7dc4a7501c8b64f019:b115060c57dd13dfce8f0adc25643ca470f8861c'),
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => 'ee69a8f44e5eef4a512eaa7dc4a7501c8b64f019',
                'client_secret' => 'b115060c57dd13dfce8f0adc25643ca470f8861c',
                'redirect_uri' => 'http://localhost:8000/get_access_token',
                'code' => '01751189490830cd66308d23eeb10394700715c2',
            ]
        ]);

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
