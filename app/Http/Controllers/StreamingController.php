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

        // events

        //     id,
        //     title,
        //     fecha,
        //     type,
        //     link,
        //     id_

        // configurar evento

        // "channel": {
        //     "id": "23955144",
        //     "title": "Vargas test 1",
        //     "url": "http://www.ustream.tv/channel/emv74tKDXUV",
        //     "tiny_url": "http://www.ustream.tv/channel/id/23955144"
        // }

        // curl \
        // ftp://1_23955144_127744603:RvbQ7QfhPh@sjc03-vod-upload02.services.video.ibm.com/1_23955144_1599064233142 \
        // -v -T testFirst.mov
    
        // http://localhost:8000/?access_token=ea2a1e5e4ca4a2d779874e6ff3eff08fa03b0b00&token_type=bearer&expires_in=86400&state=XYZ

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

        // $client = new \GuzzleHttp\Client();
        // $response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');

        // echo $response->getStatusCode();
        // echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
        // echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

        
        // $response = $client->post('https://authentication.video.ibm.com/authorize', 
        //     [
        //         'body' => [
        //             'response_type' => 'token',
        //             'client_id' => 'f462391e32e1374ceebeac9e840dc94c1c3c71d5',
        //             'client_secret' => '5216193d16334f15908940d518d2adf1546dc752',
        //             'redirect_uri' => 'http://localhost:8000/streaming',
        //         ]
        //     ]
        // );

        
        // dump($response->getStatusCode()); 
        // echo $response->getBody(); 


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
