@extends('layouts.dashboardnew')

@section('content')

<section class="content">
     <div class="row">
         @if($mostrar != '0')
         <div class="col-md-4 col-xs-12">
              <!-- DIRECT CHAT -->
              <div class="box box-info direct-chat direct-chat-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Lista de Chats</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="height: 200px; overflow-x: hidden; 
 overflow-y: scroll;">
                
                     @foreach ($listas as $lista)
                   
                 <div class="col-md-12 col-xs-12">                  
                    <a href="{{route('chat-publicoadmin', $lista['codigo'])}}">
                                <h4>
                        {{$lista['nombre']}}
                        
                        @if ($lista['mensaje'] > 0)
                        <span class="label label-warning pull-right">
                            {{$lista['mensaje']}}
                        </span>
                        @endif
                                </h4>
                           </a>
                        </div>
                        
                        @endforeach
                     
                </div>
                <!-- /.box-body -->
                
                
              </div>
           </div>
         @endif
         
            <div class="col-sm-{{($mostrar == 0) ? '12' : '8'}} col-xs-12">
              <!-- DIRECT CHAT -->
              <div class="box box-info direct-chat direct-chat-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Chat Publico</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    @if($visualizar == '1' || $visualizar == '0')
                    @if (!empty($chats))
                    @foreach($chats as $chat)
                    @php
                    $nombre_origen = DB::table($settings->prefijo_wp.'users')->where('ID', $chat->origen)->first();
                    
                    @endphp
                    @if(Auth::user()->ID != $chat->origen)
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">{{($nombre_origen == null) ? ' ' : $nombre_origen->display_name}}</span>
                        <span class="direct-chat-timestamp pull-right">{{date('d-m-Y', strtotime($chat->created_at))}}</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="{{($nombre_origen == null) ? asset('/avatar/avatar.png') : asset('/avatar/'.$nombre_origen->avatar)}}" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        {!! $chat->contenido !!}
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
                     @else
                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right">{{Auth::user()->display_name}}</span>
                        <span class="direct-chat-timestamp pull-left">{{date('d-m-Y', strtotime($chat->created_at))}}</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="{{asset('/avatar/'.Auth::user()->avatar)}}" alt="message user image">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                       {!! $chat->contenido !!}
                      </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                    @endif
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                   
                     @if($visualizar == '1' || $visualizar == '0')
                  <form action="{{route('chat-guardar-publico')}}" method="POST">
                      {{ csrf_field() }}
                      
                    <div class="col-md-12 input-group">
                        
                    <textarea name="mensaje"></textarea>
                                    
                    <input type="hidden" name="destino" value="{{$visualizar}}">                
                    </div>
                   
                            <button type="submit" class="btn btn-info btn-block">Enviar</button>
                         
                  </form>
                  @endif
                </div>
                <!-- /.box-footer-->
              </div>
           </div>
        </div>  
    </section>

@endsection

@push('script')
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>

<script type="text/javascript">
 $(document).ready(function () {

 CKEDITOR.replace('mensaje', {
    filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    filebrowserUploadMethod: 'form'
  });
 })
  
  //recargar por inactividad
  $(document).ready(function(){
     var time = new Date().getTime();
     $(document.body).bind("mousemove keypress", function(e) {
         time = new Date().getTime();
     });

     function refresh() {
         if(new Date().getTime() - time >= 30000) 
             window.location.reload(true);
         else 
             setTimeout(refresh, 30000);
     }

     setTimeout(refresh, 3000);
  });
  
    </script>
@endpush