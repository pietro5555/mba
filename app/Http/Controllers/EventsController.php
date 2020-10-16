tations = SetEvent::where('event_id', $event_id)
        ->where('type', 'presentation')
        ->get();
        return view('live.live', compact ('event','notes', 'menuResource', 'surveys', 'resources_video', 'files', 'presentations','survey_id', 'resources_offer', 'survey_response'));



    }

    public function timeliveEvent($event_id){
        $evento = Events::find($event_id);

        $streamingConnect = new StreamingController();
        $streamingConnect->setToken();
        $statusLive = $streamingConnect->getStatus($evento->uuid);

        return view('timelive.timeliveEvent')->with(compact('evento', 'statusLive'));
    }


    public function edit($id){
        $evento = Events::find($id);

        return response()->json(
            $evento
        );
    }

    public function update(Request $request){
        $streamingConnect = new StreamingController();

        $evento = Events::find($request->event_id);

        if (is_null(Auth::user()->streaming_token)){
            $streamingConnect->setToken();
        }

        if ($evento->user_id != $request->user_id){
            $datosMentor = DB::table('wp98_users')
                                ->select('display_name', 'user_email', 'password')
                                ->where('id', '=', $request->user_id)
                                ->first();

            $userStreaming = $streamingConnect->verifyUser($datosMentor->user_email);
            if (!is_null($userStreaming)){
                $userId = $userStreaming->id;
                $contactStreaming = $streamingConnect->verifyContact($userId);

                if (!is_null($contactStreaming)){
                    $contactId = $contactStreaming->id;
                }else{
                    $requestContact = new Request(array('name' => $datosMentor->user_email, 'email' => $datosMentor->user_email, 'user_id' => $userId));
                    $contactId = $streamingConnect->newContact($requestContact);
                }
            }else{
                $requestUser = new Request(array('role_id' => 4, 'name' => $datosMentor->display_name, 'email' => $datosMentor->user_email, 'username' => $datosMentor->user_email, 'password' => $datosMentor->password));
                $userId = $streamingConnect->newUser($requestUser);

                $requestContact = new Request(array('name' => $datosMentor->user_email, 'email' => $datosMentor->user_email, 'user_id' => $userId));
                $contactId = $streamingConnect->newContact($requestContact);
            }

            $request->user_streaming_id = $userId;
        }

        $streamingConnect->updateMeeting($request, $evento->uuid);

        $evento->fill($request->all());
        if ($request->hasFile('banner')){
            $file = $request->file('banner');
            $name = $evento->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/banner', $name);
            $evento->image = $name;
        }
        $evento->save();

        return redirect('admin/events')->with('msj-exitoso', 'El evento '.$evento->title.' ha sido modificado con éxito.');
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


    /* Reservar Evento */
    /* Añadirlo a la agenda de eventos del usuario*/
    public function book($evento){
        $check = DB::table('events_users')
                    ->where('user_id', '=', Auth::user()->ID)
                    ->where('event_id', '=', $evento)
                    ->first();

        if (is_null($check)){
            $datosEvento = DB::table('events')
                            ->select('date')
                            ->where('id', '=', $evento)
                            ->first();

            $fechaEvento = date('Y-m-d', strtotime($datosEvento->date));
            $horaEvento = date('H:i:s', strtotime($datosEvento->date));

            $disponibilidad = DB::table('events_users')
                                ->where('user_id', '=', Auth::user()->ID)
                                ->where('date', '=', $fechaEvento)
                                ->where('time', '=', $horaEvento)
                                ->first();

            if (is_null($disponibilidad)){
                Auth::user()->events()->attach($evento, ['date' => $fechaEvento, 'time' => $horaEvento]);

                return redirect('/')->with('msj-exitoso', 'El evento ha sido reservado en su agenda con éxito.');
            }else{
                return redirect('/')->with('msj-erroneo', 'No se puede agendar este evento porque ya posee en su agenda otro evento en la misma fecha y hora.');
            }
        }else{
            return redirect('/')->with('msj-erroneo', 'Ya este evento se encuentra registrado en su agenda.');

        }
    }


    /**
    * Admin / Cursos / Listado de Cursos / Eliminar Curso (Lógico)
    */
    public function change_status($id, $status){
        $event = Events::find($id);
        $event->status = $status;
        $event->save();

        if ($status == 0){
            return redirect('admin/events')->with('msj-exitoso', 'El evento '.$event->title.' ha sido deshabilitado con éxito.');
        }else{
            return redirect('admin/events')->with('msj-exitoso', 'El evento '.$event->title.' ha sido habilitado con éxito.');
        }
    }


   /*Vista con la información del streaming Time/timelive*/
   public function timelive(Request $request){
      setlocale(LC_TIME, 'es_ES.UTF-8');
      //setlocale(LC_TIME, 'es');//Local
     // Carbon::setLocale('es');
      //$total_eventos = count(Events::all());
      $total_eventos = Events::where('date', '>', Carbon::now()->format('Y-m-d'))
                      ->orwhere('date', '=', date('Y-m-d'))
                      ->where('time', '>=', date('H:i:s'))
                           ->where('status','1')->count();
        //return dd( $total_eventos, date('H:i:s'));
      $evento = Events::where('date', '>=', date('Y-m-d'))
                  ->where('time', '>=', date('H:i:s'))
                  ->where('status', '=',1)
                  ->get()
                  ->first();

                  //dd($evento);

      if(!empty($evento)){
          //dd($evento, $total_eventos);
         if ($request->sigEvent == '' or $request->sigEvent == null) {

            if($total_eventos > 1){
               $prox = true;
               $i = 1;
               $id = $evento->id;
               while($prox){
          $id = $id+1;
          $nextEvent = Events::where('id', $id)->get()->first();
                  if($nextEvent != null)
                 $prox = false;
               }
            }else{
               $nextEvent = null;
            }
         }else {
         $lastEvent = Events::all()->last();
            $evento = Events::find($request->sigEvent);

            if ($lastEvent->id == $evento->id) {
               $nextEvent = Events::where('date', '>=', Carbon::now())->first();
               //return dd($lastEvent, $total_eventos, $nextEvent);
            }else {
               if($total_eventos > 1){
                  $prox = true;
                  $i = 1;
                  $id = $evento->id;
                  while($prox){
                     $id = $id+1;
                     $nextEvent = Events::where('id', $id)->get()->first();
                     //return dd($lastEvent, $evento, $id, $total_eventos, $nextEvent);
                     if ($nextEvent != null)
                        $prox = false;
                  }
               }else{
                  $nextEvent = null;
               }
            }
         }
      }else{
         $evento= '';
         $nextEvent = '';
         $proximos = '';
         $total= $total_eventos;
         $fechaActual = Carbon::now()->format('Y-m-d');
         return view('timelive/timelive', compact('evento', 'nextEvent', 'proximos', 'total', 'total_eventos', 'fechaActual'));
      }

      /*PROXIMOS EVENTOS*/
      if($total_eventos>0){
<<<<<<< HEAD
         $proximos = Events::where('date', '>', date('Y-m-d'))
                      ->where('id', '!=', $evento->id)
                      ->orwhere('date', '=', date('Y-m-d'))
                      ->where('time', '>=', date('H:i:s'))
                      ->get();
                      //dd(date_default_timezone_get(),Carbon::now()->format('H:i:s') , date('Y-m-d'), date('H:i:s'));
=======
         $proximos = Events::where('date', '>=', date('Y-m-d'))
                        ->where('id', '!=', $evento->id)
                        ->where('time', '>=', date('H:i:s'))
                        ->where('status', '=', '1')
                        ->get();
>>>>>>> 2b5f4410bb4a67a0a1d96e1a1e1d3c4c0143f78f
         $total = count($proximos);
      }else{
         $proximos ='';
         $total =0;
      }

      $fechaActual = Carbon::now()->format('Y-m-d');
      $checkEvento = NULL;
      if (!Auth::guest()){
        $checkEvento = DB::table('events_users')
                        ->where('event_id', '=', $evento->id)
                        ->where('user_id', '=', Auth::user()->ID)
                        ->first();



      }


      $misEventosArray = [];
      if (!Auth::guest()){
         $misEventos = DB::table('events_users')
                        ->select('event_id')
                        ->where('user_id', '=', Auth::user()->ID)
                        ->get();

         foreach ($misEventos as $miEvento){
            array_push($misEventosArray, $miEvento->event_id);
         }
      }

        if ((!is_null($evento)) && ($evento != '') ){
            $streamingConnect = new StreamingController();

            if (is_null(Auth::user()->streaming_token)){
                $streamingConnect->setToken();
            }

            $statusLive = $streamingConnect->getStatus($evento->uuid);
        }

      //dd($evento, $proximos);
      return view('timelive/timelive', compact('evento', 'nextEvent', 'proximos', 'total', 'total_eventos', 'fechaActual', 'checkEvento' , 'misEventosArray', 'statusLive'));
    }


     public function dias($fecha){

       $dia ='';
       $fech = Carbon::parse($fecha)->format('l');

       if($fech == 'Saturday'){
         $dia='Sábado';
       }elseif($fech == 'Sunday'){
           $dia='Domingo';
       }elseif($fech == 'Monday'){
           $dia='Lunes';
       }elseif($fech == 'Tuesday'){
            $dia='Martes';
       }elseif($fech == 'Wednesday'){
           $dia='Miércoles';
       }elseif($fech == 'Thursday'){
           $dia='Jueves';
       }elseif($fech == 'Friday'){
           $dia='Viernes';
       }


       return $dia;
    }

    public function meses($fecha){

       $mes ='';
       $fech = Carbon::parse($fecha)->format('F');

       if($fech == 'January'){
         $mes='Enero';
       }elseif($fech == 'February'){
           $mes='Febrero';
       }elseif($fech == 'March'){
            $mes='Marzo';
       }elseif($fech == 'April'){
           $mes='Abril';
       }elseif($fech == 'May'){
           $mes='Mayo';
       }elseif($fech == 'June'){
           $mes='Junio';
       }elseif($fech == 'July'){
           $mes='Julio';
       }elseif($fech == 'August'){
           $mes='Agosto';
       }elseif($fech == 'September'){
           $mes='Septiembre';
ch == 'October'){
           $mes='Octubre';
       }elseif($fech == 'November'){
           $mes='Noviembre';
       }elseif($fech == 'December'){
           $mes='Diciembre';

       return $mes;
    }

    /*EVENTO FAVORITO*/
    public function event_favorite($event_id){

        $user_id = Auth::user()->ID;

        $favorite = DB::table('events_users')
        ->where('event_id', '=',$event_id)
('user_id', '=', $user_id)
        ->update(['favorite' => 1]);
        date_default_timezone_set('Europe/Madrid');
            setlocale(LC_TIME, 'spanish');

        //Eventos favoritos de un usuario
        $eventos_favoritos = DB::table('events')
        ->join('events_users', 'events_users.event_id', '=', 'events.id')
        ->where('events_users.user_id', '=',$user_id )
        ->where('events_users.favorite', '=',1 )
        ->get();
        return redirect()->action('CourseController@favorites');

    }



    /*LISTADO DE EVENTOS AGENDADOS POR EL USUARIO*/

    /*MOSTRAR CALENDARIO DE EVENTOS DEL USUARIO*/
    public function calendar()
    {
            /*DATOS PARA PINTAR EL CALENDARIO*/
        $user_calendar = Calendario::where('iduser', Auth::user()->ID)->get();
        $usuario = Auth::user()->ID;
        date_default_timezone_set('Europe/Madrid');
            setlocale(LC_TIME, 'spanish');

        //TODOS LOS EVENTOS AGENDADOS POR ESE USUARIO
        $eventos_agendados = Events::join('events_users', 'events_users.event_id', '=', 'events.id')
        ->where('events_users.user_id', '=', Auth::user()->ID)
        ->select('events.*')
        ->get();
        $misEventosArray = [];
      if (!Auth::guest()){
         $misEventos = DB::table('events_users')
                        ->select('event_id')
                        ->where('user_id', '=', Auth::user()->ID)
                        ->get();

         foreach ($misEventos as $miEvento){
            array_push($misEventosArray, $miEvento->event_id);
         }
      }

      //  return dd($user_calendar);
      //linea de referidos Directos
      $refeDirec =0;
      if(Auth::user()){
         $refeDirec = User::where('referred_id', Auth::user()->ID)->count('ID');
      }
        return view('agendar/calendar',compact('usuario','eventos_agendados', 'user_calendar', 'refeDirec','misEventosArray'));
    }

    public function timeliveEvent($event_id){
        $evento = Events::find($event_id);
        $streamingConn$streamingConnect = new StreamingController();
$streamingConnect->setToken();
        $statusLive = $streamingConnect->getStatus($evento->uuid);
    <<<<<<< HEAD
     //  dd($survey_response);
=======

>>>>>>> 2b5f4410bb4a67a0a1d96e1a1e1d3c4c0143f78f

        /*Files*/
        $files = SetEvent::where('event_id', $event_id)
        ->where('type', 'file')
        ->get();
        /*Presentations */
        $presentations = SetEvent::where('event_id', $event_id)
        ->where('type', 'presentation')
        ->get();
        return view('live.live', compact ('event','notes', 'menuResource', 'surveys', 'resources_video', 'files', 'presentations','survey_id', 'resources_offer', 'survey_response'));



    }

    public function timeliveEvent($event_id){
        $evento = Events::find($event_id);

        $streamingConnect = new StreamingController();
        $streamingConnect->setToken();
        $statusLive = $streamingConnect->getStatus($evento->uuid);

        return view('timelive.timeliveEvent')->with(compact('evento', 'statusLive'));
    }


    public function edit($id){
        $evento = Events::find($id);

        return response()->json(
            $evento
        );
    }

    public function update(Request $request){
        $streamingConnect = new StreamingController();

        $evento = Events::find($request->event_id);

        if (is_null(Auth::user()->streaming_token)){
            $streamingConnect->setToken();
        }

        if ($evento->user_id != $request->user_id){
            $datosMentor = DB::table('wp98_users')
                                ->select('display_name', 'user_email', 'password')
                                ->where('id', '=', $request->user_id)
                                ->first();

            $userStreaming = $streamingConnect->verifyUser($datosMentor->user_email);
            if (!is_null($userStreaming)){
                $userId = $userStreaming->id;
                $contactStreaming = $streamingConnect->verifyContact($userId);

                if (!is_null($contactStreaming)){
                    $contactId = $contactStreaming->id;
                }else{
                    $requestContact = new Request(array('name' => $datosMentor->user_email, 'email' => $datosMentor->user_email, 'user_id' => $userId));
                    $contactId = $streamingConnect->newContact($requestContact);
                }
            }else{
                $requestUser = new Request(array('role_id' => 4, 'name' => $datosMentor->display_name, 'email' => $datosMentor->user_email, 'username' => $datosMentor->user_email, 'password' => $datosMentor->password));
                $userId = $streamingConnect->newUser($requestUser);

                $requestContact = new Request(array('name' => $datosMentor->user_email, 'email' => $datosMentor->user_email, 'user_id' => $userId));
                $contactId = $streamingConnect->newContact($requestContact);
            }

            $request->user_streaming_id = $userId;
        }

        $streamingConnect->updateMeeting($request, $evento->uuid);

        $evento->fill($request->all());
        if ($request->hasFile('banner')){
            $file = $request->file('banner');
            $name = $evento->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/banner', $name);
            $evento->image = $name;
        }
        $evento->save();

        return redirect('admin/events')->with('msj-exitoso', 'El evento '.$evento->title.' ha sido modificado con éxito.');
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


    /* Reservar Evento */
    /* Añadirlo a la agenda de eventos del usuario*/
    public function book($evento){
        $check = DB::table('events_users')
                    ->where('user_id', '=', Auth::user()->ID)
                    ->where('event_id', '=', $evento)
                    ->first();

        if (is_null($check)){
            $datosEvento = DB::table('events')
                            ->select('date')
                            ->where('id', '=', $evento)
                            ->first();

            $fechaEvento = date('Y-m-d', strtotime($datosEvento->date));
            $horaEvento = date('H:i:s', strtotime($datosEvento->date));

            $disponibilidad = DB::table('events_users')
                                ->where('user_id', '=', Auth::user()->ID)
                                ->where('date', '=', $fechaEvento)
                                ->where('time', '=', $horaEvento)
                                ->first();

            if (is_null($disponibilidad)){
                Auth::user()->events()->attach($evento, ['date' => $fechaEvento, 'time' => $horaEvento]);

                return redirect('/')->with('msj-exitoso', 'El evento ha sido reservado en su agenda con éxito.');
            }else{
                return redirect('/')->with('msj-erroneo', 'No se puede agendar este evento porque ya posee en su agenda otro evento en la misma fecha y hora.');
            }
        }else{
            return redirect('/')->with('msj-erroneo', 'Ya este evento se encuentra registrado en su agenda.');

        }
    }


    /**
    * Admin / Cursos / Listado de Cursos / Eliminar Curso (Lógico)
    */
    public function change_status($id, $status){
        $event = Events::find($id);
        $event->status = $status;
        $event->save();

        if ($status == 0){
            return redirect('admin/events')->with('msj-exitoso', 'El evento '.$event->title.' ha sido deshabilitado con éxito.');
        }else{
            return redirect('admin/events')->with('msj-exitoso', 'El evento '.$event->title.' ha sido habilitado con éxito.');
        }
    }


   /*Vista con la información del streaming Time/timelive*/
   public function timelive(Request $request){
      setlocale(LC_TIME, 'es_ES.UTF-8');
      //setlocale(LC_TIME, 'es');//Local
<<<<<<< HEAD
     // Carbon::setLocale('es');
      //$total_eventos = count(Events::all());
      $total_eventos = Events::where('date', '>', Carbon::now()->format('Y-m-d'))
                      ->orwhere('date', '=', date('Y-m-d'))
                      ->where('time', '>=', date('H:i:s'))
                           ->where('status','1')->count();
        //return dd( $total_eventos, date('H:i:s'));
      $evento = Events::where('date', '>=', date('Y-m-d'))
                  ->where('time', '>=', date('H:i:s'))
=======
      Carbon::setLocale('es');
      //$total_eventos = count(Events::all());
      $total_eventos = Events::where('date', '>=', Carbon::now()->format('Y-m-d'))
                           ->where('status','1')->count();
        //return dd( $total_eventos, date('H:i:s'));
      $evento = Events::where('date', '>=', Carbon::now()->format('Y-m-d'))
                  //->where('time', '>=', date('H:i:s'))
>>>>>>> 2b5f4410bb4a67a0a1d96e1a1e1d3c4c0143f78f
                  ->where('status', '=',1)
                  ->get()
                  ->first();

<<<<<<< HEAD
                  //dd($evento);

      if(!empty($evento)){
          //dd($evento, $total_eventos);
         if ($request->sigEvent == '' or $request->sigEvent == null) {

=======
                 // dd($evento);

      if(!empty($evento)){
         //return dd($evento, !empty($evento));
         if ($request->sigEvent == '' or $request->sigEvent == null) {
>>>>>>> 2b5f4410bb4a67a0a1d96e1a1e1d3c4c0143f78f
            if($total_eventos > 1){
               $prox = true;
               $i = 1;
               $id = $evento->id;
               while($prox){
                  $id = $id+1;
                  $nextEvent = Events::where('id', $id)->get()->first();
                  if($nextEvent != null)
                     $prox = false;
               }
            }else{
               $nextEvent = null;
<<<<<<< HEAD

=======
>>>>>>> 2b5f4410bb4a67a0a1d96e1a1e1d3c4c0143f78f
            }
         }else {
            $lastEvent = Events::all()->last();
            $evento = Events::find($request->sigEvent);

            if ($lastEvent->id == $evento->id) {
               $nextEvent = Events::where('date', '>=', Carbon::now())->first();
               //return dd($lastEvent, $total_eventos, $nextEvent);
            }else {
               if($total_eventos > 1){
                  $prox = true;
                  $i = 1;
                  $id = $evento->id;
                  while($prox){
                     $id = $id+1;
                     $nextEvent = Events::where('id', $id)->get()->first();
                     //return dd($lastEvent, $evento, $id, $total_eventos, $nextEvent);
                     if ($nextEvent != null)
                        $prox = false;
                  }
               }else{
                  $nextEvent = null;
               }
            }
         }
      }else{
         $evento= '';
         $nextEvent = '';
         $proximos = '';
         $total= $total_eventos;
         $fechaActual = Carbon::now()->format('Y-m-d');
         return view('timelive/timelive', compact('evento', 'nextEvent', 'proximos', 'total', 'total_eventos', 'fechaActual'));
      }

      /*PROXIMOS EVENTOS*/
      if($total_eventos>0){
<<<<<<< HEAD
         $proximos = Events::where('date', '>', date('Y-m-d'))
                      ->where('id', '!=', $evento->id)
                      ->orwhere('date', '=', date('Y-m-d'))
                      ->where('time', '>=', date('H:i:s'))
                      ->get();
                      //dd(date_default_timezone_get(),Carbon::now()->format('H:i:s') , date('Y-m-d'), date('H:i:s'));
=======
         $proximos = Events::where('date', '>=', date('Y-m-d'))
                        ->where('id', '!=', $evento->id)
                        ->where('time', '>=', date('H:i:s'))
                        ->where('status', '=', '1')
                        ->get();
>>>>>>> 2b5f4410bb4a67a0a1d96e1a1e1d3c4c0143f78f
         $total = count($proximos);
      }else{
         $proximos ='';
         $total =0;
      }

      $fechaActual = Carbon::now()->format('Y-m-d');
      $checkEvento = NULL;
      if (!Auth::guest()){
        $checkEvento = DB::table('events_users')
                        ->where('event_id', '=', $evento->id)
                        ->where('user_id', '=', Auth::user()->ID)
                        ->first();



      }


      $misEventosArray = [];
      if (!Auth::guest()){
         $misEventos = DB::table('events_users')
                        ->select('event_id')
                        ->where('user_id', '=', Auth::user()->ID)
                        ->get();

         foreach ($misEventos as $miEvento){
            array_push($misEventosArray, $miEvento->event_id);
         }
      }

        if ((!is_null($evento)) && ($evento != '') ){
            $streamingConnect = new StreamingController();

            if (is_null(Auth::user()->streaming_token)){
                $streamingConnect->setToken();
            }

            $statusLive = $streamingConnect->getStatus($evento->uuid);
        }

      //dd($evento, $proximos);
      return view('timelive/timelive', compact('evento', 'nextEvent', 'proximos', 'total', 'total_eventos', 'fechaActual', 'checkEvento' , 'misEventosArray', 'statusLive'));
    }


     public function dias($fecha){

       $dia ='';
       $fech = Carbon::parse($fecha)->format('l');

       if($fech == 'Saturday'){
         $dia='Sábado';
       }elseif($fech == 'Sunday'){
           $dia='Domingo';
       }elseif($fech == 'Monday'){
           $dia='Lunes';
       }elseif($fech == 'Tuesday'){
            $dia='Martes';
       }elseif($fech == 'Wednesday'){
           $dia='Miércoles';
       }elseif($fech == 'Thursday'){
           $dia='Jueves';
       }elseif($fech == 'Friday'){
           $dia='Viernes';
       }


       return $dia;
    }

    public function meses($fecha){

       $mes ='';
       $fech = Carbon::parse($fecha)->format('F');

       if($fech == 'January'){
         $mes='Enero';
       }elseif($fech == 'February'){
           $mes='Febrero';
       }elseif($fech == 'March'){
            $mes='Marzo';
       }elseif($fech == 'April'){
           $mes='Abril';
       }elseif($fech == 'May'){
           $mes='Mayo';
       }elseif($fech == 'June'){
           $mes='Junio';
       }elseif($fech == 'July'){
           $mes='Julio';
       }elseif($fech == 'August'){
           $mes='Agosto';
       }elseif($fech == 'September'){
           $mes='Septiembre';
       }elseif($fech == 'October'){
           $mes='Octubre';
       }elseif($fech == 'November'){
           $mes='Noviembre';
       }elseif($fech == 'December'){
           $mes='Diciembre';
       }


       return $mes;
    }

    /*EVENTO FAVORITO*/
    public function event_favorite($event_id){

        $user_id = Auth::user()->ID;

        $favorite = DB::table('events_users')
        ->where('event_id', '=',$event_id)
        ->where('user_id', '=', $user_id)
        ->update(['favorite' => 1]);
        date_default_timezone_set('Europe/Madrid');
            setlocale(LC_TIME, 'spanish');

        //Eventos favoritos de un usuario
        $eventos_favoritos = DB::table('events')
        ->join('events_users', 'events_users.event_id', '=', 'events.id')
        ->where('events_users.user_id', '=',$user_id )
        ->where('events_users.favorite', '=',1 )
        ->get();
        return redirect()->action('CourseController@favorites');

    }



    /*LISTADO DE EVENTOS AGENDADOS POR EL USUARIO*/

    /*MOSTRAR CALENDARIO DE EVENTOS DEL USUARIO*/
    public function calendar()
    {
            /*DATOS PARA PINTAR EL CALENDARIO*/
        $user_calendar = Calendario::where('iduser', Auth::user()->ID)->get();
        $usuario = Auth::user()->ID;
        date_default_timezone_set('Europe/Madrid');
            setlocale(LC_TIME, 'spanish');

        //TODOS LOS EVENTOS AGENDADOS POR ESE USUARIO
        $eventos_agendados = Events::join('events_users', 'events_users.event_id', '=', 'events.id')
        ->where('events_users.user_id', '=', Auth::user()->ID)
        ->select('events.*')
        ->get();
        $misEventosArray = [];
      if (!Auth::guest()){
         $misEventos = DB::table('events_users')
                        ->select('event_id')
                        ->where('user_id', '=', Auth::user()->ID)
                        ->get();

         foreach ($misEventos as $miEvento){
            array_push($misEventosArray, $miEvento->event_id);
         }
      }

      //  return dd($user_calendar);
      //linea de referidos Directos
      $refeDirec =0;
      if(Auth::user()){
         $refeDirec = User::where('referred_id', Auth::user()->ID)->count('ID');
      }
        return view('agendar/calendar',compact('usuario','eventos_agendados', 'user_calendar', 'refeDirec','misEventosArray'));
    }

    public function timeliveEvent($event_id){
        $evento = Events::find($event_id);

        $streamingConnect = new StreamingController();
        $streamingConnect->setToken();
        $statusLive = $streamingConnect->getStatus($evento->uuid);

