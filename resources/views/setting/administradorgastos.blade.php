@extends('layouts.dashboardnew')

@section('content')

@push('style')
<style>
    .rojo {
        color:red;
    }

    .blue {
        color: #00a65a;
    }
    
    .derecha{
        float:left;
    }
    .izquierda{
        float:right;
    }
    
    .centro{
        text-align:center;
    }
</style>
@endpush

<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-header with-border">
            
                <h3>Control de Gastos</h3>
                
                <div class="col-md-3">
                <button type="button" class="btn btn-info btn-block" onclick="apreciar(2)">
                    Ingresos
                </button>
                </div>
                
                <div class="col-md-3">
                <button type="button" class="btn btn-info btn-block" onclick="apreciar(1)">
                    Saldo
                </button>
                </div>
                
                <div class="col-md-3">
                <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#agregar">
                    Agregar Categoria
                </button>
                </div>
                
                <div class="col-md-3">
                <button type="button" class="btn btn-info btn-block" onclick="apreciar(3)">
                    Gastos
                </button>
                </div>
                
            
        </div> 
        {{-- Saldo --}}
        <div class="box-body">
            <div class="col-md-12 1">
                
                <h4 class="centro">Saldo</h4>
                
                <div class="col-sm-4">
          <label class="control-label">Fecha desde</label>
          <input class="form-control" type="date" name="generalinicio" id="generalinicio" required />

        </div>

        <div class="col-sm-4">
          <label class="control-label">Fecha hasta</label>
          <input class="form-control" type="date" name="generalfin" id="generalfin" required />
        </div>
        
        <div class="col-sm-2" style="padding-left: 10px;">
          <button class="btn green padding_both_small" type="submit" id="btn"
            style="margin-bottom: 15px; margin-top: 28px;" onclick="consultageneral('')">buscar</button>
        </div>
        
        
          <div class="col-md-12">
           <div class="col-md-6" id="generalingreso">
               
           </div>
           
           <div class="col-md-6" id="generalgasto">
               
           </div>
          </div>
            
             <div class="col-md-12">
               <div id="generalDer">
                   
               </div>
               
               <div id="generalIzq">
                   
               </div>
             </div>
             
            </div>
            {{-- Fin Saldo --}}
            
            {{-- Ingresos --}}
            <div class="col-md-12 2" style="display:none;">
                
                <h4 class="centro blue">Ingresos</h4>
                
               <div class="col-sm-4">
          <label class="control-label">Fecha desde</label>
          <input class="form-control" type="date" name="primero" id="primero" required />

        </div>

        <div class="col-sm-4">
          <label class="control-label">Fecha hasta</label>
          <input class="form-control" type="date" name="segundo" id="segundo" required />
        </div>
        
        <div class="col-sm-2" style="padding-left: 10px;">
          <button class="btn green padding_both_small" type="submit" id="btn"
            style="margin-bottom: 15px; margin-top: 28px;" onclick="buscaringresos('1')">buscar</button>
        </div>
        
        
          <div class="col-md-12" id="consultaingreso">
        
          </div>
        
         <div class="col-md-12">
        <center id="consultatotal"></center>
        </div>
        
        </div>
        {{-- Fin Ingresos --}}
        
        {{-- gastos --}}      
            <div class="col-md-12 3" style="display:none;">
                
                <h4 class="centro rojo">Gastos</h4>
                
                  <div class="col-sm-4">
          <label class="control-label">Fecha desde</label>
          <input class="form-control" type="date" name="gastoprimero" id="gastoprimero" required />

        </div>

        <div class="col-sm-4">
          <label class="control-label">Fecha hasta</label>
          <input class="form-control" type="date" name="gastosegundo" id="gastosegundo" required />
        </div>
        
        <div class="col-sm-2" style="padding-left: 10px;">
          <button class="btn green padding_both_small" type="submit" id="btn"
            style="margin-bottom: 15px; margin-top: 28px;" onclick="buscargastos('2')">buscar</button>
        </div>
        
        
          <div class="col-md-12" id="consultagasto">
        
          </div>
            
             <div class="col-md-12">
        <center id="consultagastototal"></center>
             </div>
        
            </div>
        {{-- Fin gastos --}}
        
      </div>
    </div>
</div>



<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
            
            <div id="calendario"></div>
            
      </div>
    </div>
</div>

@include('setting.admingastos.agregarlista')
@include('setting.admingastos.creargastos')
@include('setting.admingastos.editar')

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
        @foreach($gasto as $gas)
        {
          id        : '{{$gas->id}}',
          title     : '{{$gas->nombre}}',
          tipo     : '{{$gas->tipo}}',
          contenido     : '{{$gas->descripcion}}',
          cantidad     : '{{$gas->cantidad}}',
          nombre    : '{{$gas->nombre}}',
          start     : '{{$gas->date}}',
          backgroundColor: '{{($gas->tipo == 1) ? '#00c0ef' : '#e04141'}}',
          borderColor    : '{{($gas->tipo == 1) ? '#00c0ef' : '#e04141'}}', 
        },
        @endforeach
        
      ],
      
       eventClick:function(calEvent,jsEvent,view){
           $('#titulo').val(calEvent.title);
           $('#contenido').val(calEvent.contenido);
           $('#id').val(calEvent.id);
           $('#precio').val(calEvent.cantidad);
           $('#inicio').val(calEvent.start.format("YYYY-MM-DD"));
           $('#ingresonombre').val(calEvent.nombre);
           $('#gastonombre').val(calEvent.nombre);
           $('#eliminar').val(calEvent.id);
           
           if(calEvent.tipo == 1){
               $("#ingresosoculto").show("slow");
           }else{
               $("#gastosoculto").show("slow");
           }
           $('#editar').modal();
       },
      
      dayClick:function(date, jsEvent, view){
        $('#fecha').val(date.format("YYYY-MM-DD"));
        $('#listagastos').modal();
      }
      
      }); 
	});  
	
	
	function apreciar(valor) {
      for($i=1;$i<=3;$i++){
         if($i == valor){ 
            
      $('.'+valor).show();
         }else{
      $('.'+$i).hide();
         }
      }
  }
	
	
	function seleccionado(){
    var opt = $('#opcion').val();
    
    if(opt=="1"){
        $('#ingresos').show();
        $('#gastos').hide();
        }else{
            $('#ingresos').hide();
            $('#gastos').show();
        }
    }
    
    function buscaringresos(tipo){
        
        var inicio = $('#primero').val();
        var fin = $('#segundo').val(); 
        var total = 0;
        var simbolo = '{{$moneda->simbolo}}';
        
        $.get('consulta/'+inicio+'/'+fin+'/'+tipo, function (response) {
      rangos = JSON.parse(response)
      
      $('#consultaingreso').empty()
      $('#consultatotal').empty()
      
      rangos.forEach(item => {
          total =(total + item.cantidad);
          $('#consultaingreso').append(
            '<div class="col-xs-12 col-sm-3">' +
              '<label for="">Categoria: ' + item.nombre + '</label>' +
              '<input type="text" class="form-control" name="categoria" value="'+item.nombre+'" readonly>' +
              '</div>'+
              
              '<div class="col-xs-12 col-sm-3">' +
              '<label for="">Saldo: ' + item.cantidad + '</label>' +
              '<input type="text" class="form-control" name="cantidad" value="'+item.cantidad+'" readonly>' +
              '</div>'
              )
          })
          
          
          if({{$moneda->mostrar_a_d}}){
              $('#consultatotal').append(
              '<h4><strong class="blue">Total Ingreso: '+ simbolo + total +'</strong></h4>'
              )
            }else{
                $('#consultatotal').append(
              '<h4><strong class="blue">Total Ingreso: '+ total + simbolo +'</strong></h4>'
              )
           }
        })
      }
    
    
    
    function buscargastos(tipo){
        
        var inicio = $('#gastoprimero').val();
        var fin = $('#gastosegundo').val(); 
        var total = 0;
        var simbolo = '{{$moneda->simbolo}}';
       
        $.get('consulta/'+inicio+'/'+fin+'/'+tipo, function (response) {
      rangos = JSON.parse(response)
      
      $('#consultagasto').empty()
      $('#consultagastototal').empty()
      
      rangos.forEach(item => {
          total =(total + item.cantidad);
          $('#consultagasto').append(
            '<div class="col-xs-12 col-sm-3">' +
              '<label for="">Categoria: ' + item.nombre + '</label>' +
              '<input type="text" class="form-control" name="categoria" value="'+item.nombre+'" readonly>' +
              '</div>'+
              
              '<div class="col-xs-12 col-sm-3">' +
              '<label for="">Saldo: ' + item.cantidad + '</label>' +
              '<input type="text" class="form-control" name="cantidad" value="'+item.cantidad+'" readonly>' +
              '</div>'
              )
          })
          
          if({{$moneda->mostrar_a_d}}){
              $('#consultagastototal').append(
              '<h4><strong class="rojo">Total Gastos: '+ simbolo + total +'</strong></h4>'
              )
            }else{
                $('#consultagastototal').append(
              '<h4><strong class="rojo">Total Gastos: '+ total + simbolo +'</strong></h4>'
              )
           }
        })
    }
    
    
    function consultageneral(){
        var inicio = $('#generalinicio').val();
        var fin = $('#generalfin').val(); 
        var ingresos = 0;
        var gastos= 0;
        var simbolo = '{{$moneda->simbolo}}';
        
        $.get('consulta/'+inicio+'/'+fin, function (response) {
         general = JSON.parse(response)
         
         $('#generalingreso').empty()
         $('#generalgasto').empty()
         $('#consultageneratotal').empty()
         
         general.forEach(item => {
             
             if(item.tipo == 1){
          ingresos =(ingresos + item.cantidad);
          
          $('#generalingreso').append(
            '<div">' +
              '<label for="">Categoria: ' + item.nombre + '</label>' +
              '<input type="text" class="form-control" name="categoria" value="'+item.nombre+'" readonly>' +
              '</div>'+
              
              '<div>' +
              '<label for="">Saldo: ' + item.cantidad + '</label>' +
              '<input type="text" class="form-control" name="cantidad" value="'+item.cantidad+'" readonly>' +
              '</div>'
              )
              
             }else{
          gastos =(gastos + item.cantidad); 
          
          $('#generalgasto').append(
            '<div>' +
              '<label for="">Categoria: ' + item.nombre + '</label>' +
              '<input type="text" class="form-control" name="categoria" value="'+item.nombre+'" readonly>' +
              '</div>'+
              
              '<div>' +
              '<label for="">Saldo: ' + item.cantidad + '</label>' +
              '<input type="text" class="form-control" name="cantidad" value="'+item.cantidad+'" readonly>' +
              '</div>'
              )
             }
          })
          
          
          if({{$moneda->mostrar_a_d}}){
              $('#generalDer').append(
            '<h4><strong class="blue derecha">Total ingreso: '+ simbolo + ingresos +'</strong></h4>'
              )
              $('#generalIzq').append(
              '<h4><strong class="rojo izquierda">Total gastos: '+ simbolo + gastos+ '</strong></h4>'
              )
            }else{
                $('#generalDer').append(
            '<h4><strong class="blue derecha">Total ingreso: '+ simbolo + ingresos +'</strong></h4>'
              )
              $('#generalIzq').append(
              '<h4><strong class="rojo izquierda">Total gastos: '+ simbolo + gastos+ '</strong></h4>'
              )
           }
        })
    }
</script>
@endpush	
	