@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
            
            <div id="calendario"></div>
            
      </div>
    </div>
</div>

@include('calendario.modal.agregar')
@include('calendario.modal.editar')
@include('calendario.modal.prospecto')

@endsection

@push('script')

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
          lugar     : '{{$calendario['lugar']}}',
          color     : '{{$calendario['color']}}',
          tipo     : '{{$calendario['tipo']}}',
          especifico     : '{{$calendario['especifico']}}',
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
        $('#tipo').val(calEvent.tipo);
        $('#especifico').val(calEvent.especifico);
        $('#eliminar').val(calEvent.ID);
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
	
	//para mostrar el input de afiliado especifico desde el modal agregar
	function seleccionar(){
    var op = $('#opcion').val();
    
    if(op=="5"){
        $('#subcategoria').show();
        }else{
            $('#subcategoria').hide();
        }
    }
    
    //para mostrar el input de afiliado especifico desde el modal editar
    function seleccionado(){
    var opt = $('#tipo').val();
    
    if(opt=="5"){
        $('#subcate').show();
        }else{
            $('#subcate').hide();
        }
    }
    
    if({{$modal}} !== 0){
        
        $('#prospecto').modal();
    }
    
    //evitar saltos de linia en el textarea
    function pulsar(e) {
     if (e.which === 13 && !e.shiftKey) {
    e.preventDefault();
    return false;
    }
  }

</script>
@endpush