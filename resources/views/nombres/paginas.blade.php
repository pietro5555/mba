 @if (count($listas))
 @foreach ($listas as $lista)
                   
                 <div class="col-md-12 col-xs-12" style="margin-top: 20px;">                  
                    <a href="{{route('chat-privado', $lista['ID'])}}">
                       <div class="pull-left">
                          <img src="{{asset('avatar/'.$lista['avatar'])}}" class="img-circle" alt="User Image" style="width: 50px; height: 40px; border-radius: 60%;">
                        </div>
                                <h4>
                        {{$lista['usuario']}}
                        
                        @if ($lista['mensaje'] > 0)
                        <span class="label label-warning pull-right">
                            {{$lista['mensaje']}}
                        </span>
                        @endif
                                </h4>
                           </a>
                        </div>
                        
                        @endforeach
                    @endif   