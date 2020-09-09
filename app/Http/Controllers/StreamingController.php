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
    
        // http://localhost:8000/?access_token=54644cedbc4818a28a2001e41ea8570fab520e4b&token_type=bearer&expires_in=86400&state=XYZ
        // https://authentication.video.ibm.com/authorize?response_type=token&client_id=f462391e32e1374ceebeac9e840dc94c1c3c71d5&client_secret=5216193d16334f15908940d518d2adf1546dc752&redirect_uri=https://metalinks.com.ve/prueba&state=XYZ


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

        $client = new Client();
        $response = $client->request('POST', 'https://video.ibm.com/oauth2/token', [
            'Authorization' => 'Basic ' .base64_encode('ca361d98cfa63255356b644e83130e919e62085e:ea6b8144deeec575c3d327faa8015b5729d43ddf'),
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => 'ca361d98cfa63255356b644e83130e919e62085e',
                'client_secret' => 'ea6b8144deeec575c3d327faa8015b5729d43ddf',
                'redirect_uri' => 'http://localhost:8000/get_access_token',
                'code' => '2b889e59cfbf4efac57fb43a37ccc3a1b31a5047',
            ]
        ]);

        // {#1074 ▼
        // +"access_token": "acc68c57f68dba834235e728acde96f153c697e4"
        // +"refresh_token": "fd1317d2bf3fbfb078ef5972ac0ef999dd1dbe7c"
        // +"token_type": "bearer"
        // +"expires_in": 86400
        // }

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
