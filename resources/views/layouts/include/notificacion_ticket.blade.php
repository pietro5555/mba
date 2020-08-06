 @php

	$pendientes = DB::table('notificacion_tickets')
									->where('user', '=', Auth::user()->ID)
									->where('status', '=', '0')
									->orderBy('id', 'DESC')
									->get();
									
@endphp


  <!-- Messages: style can be found in dropdown.less-->
     
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                @foreach ($pendientes as $pendi)
                                @php
                                
                   $settings = DB::table('settings')->first();
                            
                    $imagen = DB::table($settings->prefijo_wp.'users')
                            ->where('ID', '=', $pendi->user_id )
                            ->first();
                            
                     $completo = DB::table('user_campo')
                            ->where('ID', '=', $pendi->user_id )
                            ->first();
                                @endphp
                                <li>
                                    <!-- start message -->
                                    <a href="{{url('admin/ticket/'.$pendi->ticket.'/comentar')}}">
                                        <div class="pull-left">
                                            <img src="{{asset('avatar/'.$imagen->avatar)}}" class="img-circle" alt="User Image">
                                        </div>
                                        <h4>
                                            {{$completo->firstname}}  {{$completo->lastname}}
                                            <small><i class="fa fa-clock-o"></i> {{date('d-m-Y', strtotime($pendi->created_at))}}</small>
                                        </h4>
                                        <p>{{$pendi->contenido}}</p>
                                    </a>
                                </li>
                                @endforeach
                                <!-- end message -->
                            </ul> 