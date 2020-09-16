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
        //device username:cgpxzukgpqy
        //device password: hdebc pdtbj qewbr
    

        //Obtener code
        // https://authentication.video.ibm.com/authorize?response_type=code&client_id=ca361d98cfa63255356b644e83130e919e62085e&redirect_uri=http://localhost:8000/&state=XYZ

        //result code (Este lo uso para luego pedir el ACCESS TOKEN)
        // http://localhost:8000/?code=643f3906bf9605da966c6a69c77946c52b0cf180&state=XYZ


	   	return view('streaming.indexstreaming');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAccessToken(Request $request){
        $client = new Client();
        $response = $client->request('POST', 'https://video.ibm.com/oauth2/token', [
            'Authorization' => 'Basic ' .base64_encode('ee69a8f44e5eef4a512eaa7dc4a7501c8b64f019:b115060c57dd13dfce8f0adc25643ca470f8861c'),
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => 'ee69a8f44e5eef4a512eaa7dc4a7501c8b64f019',
                'client_secret' => 'b115060c57dd13dfce8f0adc25643ca470f8861c',
                'redirect_uri' => 'http://localhost:8000/get_access_token',
                'code' => $request->get('code'),
            ]
        ]);

        $result =  json_decode( $response->getBody() );

        $headers = [
            'Authorization' => 'Bearer '.base64_encode($result->access_token),        
            'Accept'        => 'application/json',
        ];

        $response2 = $client->request('GET', 'https://api.video.ibm.com/users/self/channels.json', [
            'headers' => $headers
        ]);
        
        $result2 =  json_decode( $response2->getBody() );

        dd($result2);
	   	return view('streaming.indexstreaming')->with(compact('hola'));

    }

    public function new_channel(){
        $client = new Client(['base_uri' => 'https://api.video.ibm.com/']);
        $headers = [
            'Authorization' => 'Bearer a20eb6e6921f13d3ce76f88892b16f06cfea551d',        
            'Accept'        => 'application/json',
        ];

        $response = $client->request('GET', 'users/self/channels.json', [
            'headers' => $headers
        ]);
        /*$response = $client->request('GET', 'users/self/channels.json', [
            'Authorization' => 'Bearer cb3b4abe13b99aa35c33f66d7044ace8edc2e526'
        ]);
*/
        

         $result =  json_decode( $response->getBody() );

        dd($result);
        
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
