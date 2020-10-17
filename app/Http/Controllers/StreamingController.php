<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use GuzzleHttp\Client;
use App\Models\Streaming\User; use App\Models\Streaming\Contact;
use App\Models\Streaming\Meeting; use App\Models\Streaming\Invitation;
use App\Models\Streaming\ModelHasRole;
use Auth; use Carbon\Carbon; use DB;

class StreamingController extends Controller{

    public function setToken(){
        $client = new Client(['base_uri' => 'https://streaming.mybusinessacademypro.com']);

        $response = $client->request('POST', 'api/auth/login', [
            'headers' => ['Accept' => 'application/json', 'Content-Type' => 'application/x-www-form-urlencoded'],
            'form_params' => [
                'email' => 'mbapro',
                'password' => 'mbapro2020',
                'device_name' => 'admin-device',
            ]
        ]);

        $result = json_decode($response->getBody());

        DB::table('wp98_users')
            ->where('ID', '=', Auth::user()->ID)
            ->update(['streaming_token' => $result->token]);
    }

    public function newMeeting(Request $request, $userId){
        $client = new Client(['base_uri' => 'https://streaming.mybusinessacademypro.com']);

        $headers = [
            'Accept'        => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Bearer '.Auth::user()->streaming_token
        ];

        $p = $request->date."T".$request->time;
        $carbon = new Carbon($p);
        $fecha = $carbon->subHours(5);
        $ultFecha = $fecha->format('Y-m-d H:i:s');
        $creacionEvento = $client->request('POST', 'api/meetings', [
            'headers' => $headers,
            'form_params' => [
                'title' => $request->title,
                'agenda' => $request->description,
                'description' => $request->description,
                'start_date_time' => $ultFecha,
                'period' => $request->duration,
                'category' => [$request->category_id],
                'type' => ['webinar']
            ]
        ]);

        $result = json_decode($creacionEvento->getBody());

        $meeting = Meeting::where('uuid', '=', $result->meeting->uuid)->first();
        $meeting->type = 'webinar';
        $meeting->user_id = $userId;
        $meeting->save();

        return $result->meeting->uuid;
    }

    public function updateMeeting(Request $request, $uuid){
        $client = new Client(['base_uri' => 'https://streaming.mybusinessacademypro.com']);

        $headers = [
            'Accept'        => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Bearer '.Auth::user()->streaming_token
        ];

        $consultaEvento = $client->request('GET', 'api/meetings/'.$uuid, ['headers' => $headers]);
        $detallesEvento = json_decode($consultaEvento->getBody());
        
        if ($detallesEvento->status == 'scheduled'){
            $actualizacionEvento = $client->request('PATCH', 'api/meetings/'.$uuid, [
                'headers' => $headers,
                'form_params' => [
                    'title' => $request->title,
                    'agenda' => $request->description,
                    'description' => $request->description,
                    'start_date_time' => $request->date."T".$request->time,
                    'period' => $request->duration,
                    'category' =>[$request->category_id],
                    'type' => ['webinar']
                ]
            ]);
            
            $meeting = Meeting::where('uuid', '=', $uuid)->first();
            $meeting->type = 'webinar';
            $meeting->save();
        }
    }
    
    public function getStatus($uuid){
        $client = new Client(['base_uri' => 'https://streaming.mybusinessacademypro.com']);

        $headers = [
            'Accept'        => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Bearer '.Auth::user()->streaming_token
        ];
        
        $consultaEvento = $client->request('GET', 'api/meetings/'.$uuid, ['headers' => $headers]);
        $detallesEvento = json_decode($consultaEvento->getBody());
        
        return $detallesEvento->status;
    }

    public function verifyUser($email){
        $userStreaming = User::where('email', '=', $email)
                            ->select('id')
                            ->first();

        return $userStreaming;
    }

    public function newUser(Request $request){
        $usuario = new User($request->all());
        $usuario->uuid = Str::uuid();
        $usuario->status = 'activated';
        $usuario->save();

        $role = new ModelHasRole();
        $role->role_id = $request->role_id;
        $role->model_type = 'App\Models\User';
        $role->model_id = $usuario->id;
        $role->save();


        return $usuario->id;
    }

    public function verifyContact($user_id){
        $contactStreaming = Contact::where('user_id', '=', $user_id)
                                ->select('id')
                                ->first();

        return $contactStreaming;
    }

    public function newContact(Request $request){
        $contact = new Contact($request->all());
        $contact->uuid = Str::uuid();
        $contact->save();

        return $contact->id;
    }

    public function getMeetingId($uuid){
        $eventStreaming = Meeting::where('uuid', '=', $uuid)
                            ->select('id')
                            ->first();

        return $eventStreaming->id;
    }

    public function newInvitation($meeting_id, $contact_id){
        $invitation = new Invitation();
        $invitation->uuid = Str::uuid();
        $invitation->meeting_id = $meeting_id;
        $invitation->contact_id = $contact_id;
        $invitation->save();

        return $invitation;
    }
}
