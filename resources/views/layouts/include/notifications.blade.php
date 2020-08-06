@php
	$cantNotificaciones = DB::table('notifications')
							->where('user_id', '=', Auth::user()->ID)
							->where('status', '=', false)
							->count();

	$notificacionesPendientes = DB::table('notifications')
									->where('user_id', '=', Auth::user()->ID)
									->where('status', '=', '0')
									->orderBy('date', 'DESC')
									->get();
@endphp

                           <ul class="menu">
                                @foreach ($notificacionesPendientes as $notificacion)
                                <li>
                                    <a href="{{ url($notificacion->route) }}">
                                        <i class="{{ $notificacion->icon }}"></i> {{ $notificacion->description }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>


 
