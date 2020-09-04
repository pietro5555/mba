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
        // CREATE TABLE `mba`.`events` ( `id` INT NOT NULL AUTO_INCREMENT ,  `title` VARCHAR(255) NOT NULL ,  `date` DATETIME NOT NULL ,  `type` VARCHAR(100) NULL ,  `url_streaming` VARCHAR(255) NULL ,  `url_video` VARCHAR(255) NULL ,  `user_id` INT NULL ,  `created_at` TIMESTAMP NULL ,  `updated_at` TIMESTAMP NULL ,  PRIMARY KEY  (`id`)) ENGINE = InnoDB;
   

        // CREATE TABLE `mba`.`event_content` ( `id` INT NOT NULL AUTO_INCREMENT ,  `title` VARCHAR(255) NOT NULL ,  `type` VARCHAR(100) NULL ,  `url` VARCHAR(255) NULL ,  `event_id` INT NOT NULL , `created_at` TIMESTAMP NULL ,  `updated_at` TIMESTAMP NULL ,   PRIMARY KEY  (`id`)) ENGINE = InnoDB;
   

        //  CREATE TABLE `mba`.`survey_options` ( `id` INT NOT NULL AUTO_INCREMENT ,  `question` TEXT NOT NULL ,  `content_event_id` INT NOT NULL ,  `created_at` TIMESTAMP NULL ,  `updated_at` TIMESTAMP NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;


        //  CREATE TABLE `mba`.`survey_options_response` ( `id` INT NOT NULL AUTO_INCREMENT ,  `response` TEXT NOT NULL ,  `survey_options_id` INT NOT NULL ,  `user_id` INT NOT NULL ,  `created_at` TIMESTAMP NULL ,  `updated_at` TIMESTAMP NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;

    
        // http://localhost:8000/?access_token=234357c92534a1238561fd35dbf36eb15b4b1bc6&token_type=bearer&expires_in=86400&state=XYZ
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
            'Authorization' => '1be2f4beeb416fa024d2ba4107e389e857d90deb',
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => 'f462391e32e1374ceebeac9e840dc94c1c3c71d5',
                'client_secret' => 'ea6b8144deeec575c3d327faa8015b5729d43ddf',
                'redirect_uri' => 'http://localhost:8000/',
                'code' => '1be2f4beeb416fa024d2ba4107e389e857d90deb',
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
