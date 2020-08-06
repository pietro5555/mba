@extends('layouts.dashboardnew')

@section('content')

<section class="content">
     <div class="row">
         
         <div class="col-md-4 col-xs-12">
              <!-- DIRECT CHAT -->
              <div class="box box-info direct-chat direct-chat-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Lista de Chats</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="height: 200px; overflow-x: hidden; 
 overflow-y: scroll;">
                    
                    
                    
                   <div class="form-group col-md-12">
                    <input type="text" class="form-control" id="texto" placeholder="Ingresar nombre">
           
                    </div>
                    
                    <div id="resultados" style="display:none;"></div>
                    
                   
                
                     <div class="col-md-12 col-xs-12"  id="contenedor">  
                    @include('nombres.paginas')
                     
                    </div>
                     
                </div>
                <!-- /.box-body -->
                
                
              </div>
           </div>
         
         
            <div class="col-md-8 col-xs-12">
              <!-- DIRECT CHAT -->
              <div class="box box-info direct-chat direct-chat-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Chat</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    @if($visualizar > 0)
                    @foreach($chats as $chat)
                    @php
                    $nombre_origen = DB::table($settings->prefijo_wp.'users')->where('ID', $chat->origen)->first();
                    
                    @endphp
                    @if(Auth::user()->ID != $chat->origen)
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left">{{$nombre_origen->display_name}}</span>
                        <span class="direct-chat-timestamp pull-right">{{date('d-m-Y', strtotime($chat->created_at))}}</span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="{{asset('/avatar/'.$nombre_origen->avatar)}}" alt="message user image">
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
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                     @if($visualizar > 0)
                  <form action="{{route('chat-guardar-privado')}}" method="POST">
                      {{ csrf_field() }}
                      
                    <div class="input-group">
                        
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


//buscador en tiempo real
    window.addEventListener('load',function(){
        document.getElementById("texto").addEventListener("keyup", () => {
            if((document.getElementById("texto").value.length)>=1){
                fetch(`{{$ruta}}/admin/chat/nombres/buscador?texto=${document.getElementById("texto").value}`,{ method:'get' })
                .then(response  =>  response.text())
                .then(html      =>  {document.getElementById("resultados").innerHTML = html})
                
                $('#resultados').show();
                $('#contenedor').hide();
                
            }else{
                document.getElementById("resultados").innerHTML = ""
                
                $('#resultados').hide();
                $('#contenedor').show();
            }
        })
    });  
  
    </script>
@endpush