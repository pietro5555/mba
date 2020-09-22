<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\Events; 
use App\Models\Schedule; 
use App\Models\Calendario; 
use App\Models\Subcategory;
use App\Models\Course;
use Auth; 
use DB; 
use Carbon\Carbon;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use Illuminate\Http\Request;
use DateTime; 

class CalendarioGoogleController extends Controller
{
    protected $client;


    function __construct()
    {
        Carbon::setLocale('es'); 
        $this->middleware('auth');
    }



     public function oauth($id)
    {
        session_start();

        $client = new Google_Client();
        $client->setAuthConfig('client_secret.json');
        $client->addScope(Google_Service_Calendar::CALENDAR);

        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);
        $this->client = $client;

        $rurl = action('CalendarioGoogleController@oauth',['id' => $id]);
        $this->client->setRedirectUri($rurl);
        if (!isset($_GET['code'])) {
            $auth_url = $this->client->createAuthUrl();
            $filtered_url = filter_var($auth_url, FILTER_SANITIZE_URL);
            return redirect($filtered_url);
        } else {
            $this->client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $this->client->getAccessToken();

             if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            
            $evento = Events::find($id);  
            $start = new Carbon($evento->date);
            $end = new Carbon('2020-09-10');

            $calendarId = 'primary';
            $event = new Google_Service_Calendar_Event([
                'summary' => $evento->title,
                'description' => 'descripcion',
                'start' => ['dateTime' => $start->format(\DateTime::RFC3339)],
                'end' => ['dateTime' => $end->format(\DateTime::RFC3339)],
                'reminders' => ['useDefault' => true],
            ]);
            $results = $service->events->insert($calendarId, $event); 
               
            return redirect('time/timelive')->with('msj', 'El live a sido agregado con exito a Google Calendar');
           }   
        }
    }


    
}