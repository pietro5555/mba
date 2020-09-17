@extends('layouts.landing')

{{-- fullcalendar--}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/calendario/fullcalendar.min.css')}}">

@push('scripts')
{{-- full calendar --}}
<script src="{{ asset('assets/calendario/moment.min.js')}}"></script>
<script src="{{ asset('assets/calendario/fullcalendar.min.js')}}"></script>
<script src="{{ asset('assets/calendario/idioma/es.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
      
      $('#calendario').fullCalendar({
        header:{
          left:'prev,next,today',
          center:'title',
          right:'month, basicWeek, basicDay'
        },
        
        events    : [
        @foreach($calendarios as $calendario)
        {
          ID        : '{{$calendario['ID']}}',
          iduser    : '{{$calendario['iduser']}}',
          title     : '{{$calendario['titulo']}}',
          contenido : '{{$calendario['contenido']}}',
          color     : '{{$calendario['color']}}',
          start     : '{{$calendario['inicio']}}',
          end       : '{{$calendario['vence']}}',
          backgroundColor: '{{$calendario['color']}}',
          borderColor    : '{{$calendario['color']}}', 
        },
        @endforeach
        
      ],
      
      dayClick:function(date, jsEvent, view){
        $('#fechainicio').val(date.format("YYYY-MM-DD[T]HH:mm:ss"));
        $('#agregar').modal();
      },
      
      eventClick:function(calEvent,jsEvent,view){
        $('#titulo').html(calEvent.title);
        $('#titu').val(calEvent.title);
        $('#contenido').val(calEvent.contenido);
        $('#lugar').val(calEvent.lugar);
        $('#color').val(calEvent.color);
        $('#ID').val(calEvent.ID);
        $('#iduser').val(calEvent.iduser);
        $('#inicio').val(calEvent.start.format());
        $('#vence').val(calEvent.end.format());
        
        
        if($('#iduser').val() == {{$usuario}}){
        $('.habilitar').removeAttr('disabled')
        $(".oculto").show("slow");
        $('#subcate').hide();
        if($('#tipo').val() == 5){
            $('#subcate').show();
         }else{
             $('#subcate').hide();
         }
        }else{
             $(".oculto").hide();
             if($('#tipo').val() == 5){
            $('#subcate').show();
         }else{
             $('#subcate').hide();
         }
        }
        
        $('#mostrar').modal();
      }
      
      });
  });
  
    
    //evitar saltos de linia en el textarea
    function pulsar(e) {
     if (e.which === 13 && !e.shiftKey) {
    e.preventDefault();
    return false;
    }
  }

</script>
@endpush
@section('content')

<div>
  <h4 class="text-primary text-center mt-5 mb-5">CALENDARIO DE EVENTOS</h4>
  
</div>
<div class="container-fluid m-2">
  <div class="row justify-content-center">
    <div class="col-md-10">
    <div class="box box-info">
        <div class="box-body"> 
            <div id="calendario"></div>
            
      </div>
    </div>
</div>
  </div>
  
</div>

  {{-- SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
    @if (!Auth::guest())
        <div style="padding-top: 30px;">
            <div class="row">
                <div class="col-4 " style="padding-left: 30px;">
                    <div style="text-align: center; font-size: 34px; color: white; font-weight: bold; border: solid #919191 1px; background-color: #222326; margin-bottom: 10px; height: 330px; padding: 120px 15px;">
                        <i class="fa fa-user"></i><br>
                        739 Referidos
                    </div>
                    <div style="text-align: center; font-size: 25px; color: white; font-weight: bold; background-color: #6AB742; height: 60px; padding: 10px 10px;">
                        Panel de referidos
                    </div>
                </div>
                <div class="col-8" style=" background:url('http://localhost:8000/images/banner_referidos.png');">
                    <!--<img src="{{ asset('images/banner_referidos.png') }}" alt="" style="height: 400px; width:100%; opacity: 1; background: transparent linear-gradient(90deg, #2A91FF 0%, #2276D0A1 54%, #15498000 100%) 0% 0% no-repeat padding-box;">-->
                    <div style="font-size: 50px; width: 50%; padding: 80px 40px 80px 80px; color: white; line-height: 55px;">EL QUE QUIERE SUPERARSE, NO VE OBSTÁCULOS, VE SUEÑOS.</div>
                </div>
            </div>
        </div><br><br>
    @endif
    {{-- FIN DE SECCIÓN REFERIDOS (USUARIOS LOGGUEADOS) --}}
@endsection
