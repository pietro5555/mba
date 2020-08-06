@extends('layouts.dashboardnew')

@section('content')

@push('style')
<style>

    .text-naranja {
        color: #F79622;
    }
    .text-amarrillo{
        color: #F7F122;
    }
    
    .text-verde{
        color: #00a65a;
    }
    .text-azul{
       color: #00c0ef;
    }
    .text-rojo{
        color: #dd4b39;
    }
</style>
@endpush

<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
            
            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#agregar">Agregar</a>
            <table id="mytable" class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">
                            #
                        </th>
                
                        <th class="text-center">
                            Nombre
                        </th>
                        <th class="text-center">
                            Fuente de Prospecto
                        </th>
                        
                        <th class="text-center">
                            Estado
                        </th>
                        
                        <th class="text-center">
                            Correo
                        </th>
                        
                        @if($estructura == 'binaria')
                        <th class="text-center">
                            Lado Matriz
                        </th>
                        @endif
                        
                        <th class="text-center">
                            Dirección
                        </th>
                        
                        <th class="text-center">
                            Localización
                        </th>
                        
                        <th class="text-center">
                            Perfil
                        </th>
                        
                        <th class="text-center">
                            Comentarios y Observaciones
                        </th>
                        
                        <th class="text-center">
                            Accion
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prospecto as $prosp)
                    @php
                    $referido = DB::table($settings->prefijo_wp.'users')
					->select('display_name')
					->where('ID', '=', $prosp->referred_id)
					->get();
                    @endphp
                    <tr>
                        <td class="text-center">
                            
                            @if($prosp->estado == 'Nuevo Prospecto')
                            <i class="fa fa-circle text-amarrillo"></i>
                            @elseif($prosp->estado == 'Presentación de Negocio')
                            <i class="fa fa-circle text-azul"></i>
                            @elseif($prosp->estado == 'Seguimiento')
                             <i class="fa fa-circle text-naranja"></i>
                            @elseif($prosp->estado == 'Calificado para vinculación')
                            <i class="fa fa-circle text-verde"></i>
                            @elseif($prosp->estado == 'No calificado/No interesado')
                            <i class="fa fa-circle text-rojo"></i>
                            @endif
                            {{$prosp->id}}
                        </td>
                        
                        
                        <td class="text-center">
                            {{$prosp->firstname}} {{$prosp->lastname}} 
                        </td>
                        
                        <td class="text-center">
                            {{$prosp->persona_natural}}
                        </td>
                        
                        <td class="text-center">
                            {{$prosp->estado}}
                        </td>
                        
                        <td class="text-center">
                            {{$prosp->user_email}}
                        </td>
                        
                         @if($estructura == 'binaria')
                        <td class="text-center">
                           {{$prosp->ladomatriz}}
                        </td>
                        @endif
                        
                        <td class="text-center">
                           {{$prosp->direccion}}
                        </td>
                        
                        <td class="text-center">
                           Ciudad: {{$prosp->ciudad}}, Estado: {{$prosp->local}}, País: {{$prosp->pais}}
                        </td>
                        
                        <td class="text-center">
                           {{$prosp->perfil}}
                        </td>
                        
                        <td class="text-center">
                           {{$prosp->comentario}}
                        </td>
                        
                        <td>
                               
                               
                    <div class="btn-group dropup">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                          Acciones
                        </button>
                        <ul class="dropdown-menu">
                            @if($prosp->status == '0')
                            
                             <li><a href="#" data-toggle="modal" data-target="#insertar" onclick="insercion('{{$prosp->id}}')">Registrar</a></li>
                             
                             
                          <li><a href="#" data-toggle="modal" data-target="#editar" onclick="seleccionar('{{$prosp->id}}','{{$prosp->persona_natural}}',
                                '{{$prosp->firstname}}','{{$prosp->lastname}}','{{$prosp->ciudad}}','{{$prosp->estado}}','{{$prosp->local}}','{{$prosp->user_email}}',
                                '{{$prosp->pais}}','{{$prosp->telefono}}','{{$prosp->perfil}}','{{$prosp->referred_id}}','{{$prosp->position_id}}',
                                '{{$prosp->ladomatriz}}','{{$prosp->tipo}}','{{$prosp->direccion}}','{{$prosp->comentario}}',)">Editar</a></li>
                          @endif
                          <li><a href="{{ route('prospeccion-eliminar', $prosp->id) }}" data-id="{{$prosp->id}}">Eliminar</a></li>
                        </ul>
                      </div>
                               
                                <div class="btn-group dropup">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                          Mas 
                        </button>
                        <ul class="dropdown-menu">
                          <li><a href="{{route('calendario-calendarioprospecto', $prosp->id)}}">Agendar cita</a></li>
                          
                          <li><a href="{{route('prospeccion-correo', $prosp->id)}}">Correo Plantilla</a></li>
                          
                           <li><a href="{{route('correo-prospeccion', $prosp->id)}}">Correo Personalizado</a></li>
                        </ul>
                      </div>
                      
                      <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#cambiarestado" onclick="estado('{{$prosp->id}}','{{$prosp->estado}}')"> Editar Estado</a>
                    
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>    

{{-- modal para agregar --}}
@include('prospeccion/modal/agregar')
{{-- modal para editar --}}
@include('prospeccion/modal/editar')
{{-- modal para insertar prospecto --}}
@include('prospeccion/modal/insertar')
{{-- modal para cambiar estado --}}
@include('prospeccion/modal/cambiarestado')

@endsection
@include('usuario.componentes.scripBotones')

@push('script')
<script type="text/javascript">

$('.eliminar').on('click',function(e){
 e.preventDefault();

        var ID = $(this).attr('data-id');
        
   Swal.fire({
  title: 'Esta seguro que lo quiere eliminar ',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'prospeccion/eliminar/'+ID;
    }
  });
});


seleccionar = function(id,natural,nombre,apellido,ciudad,estado,local,email,pais,telefono,perfil,referred,posicion,ladomatriz,tipo,dire,comen){
        $('#id').val(id);
        $('#natural').val(natural);
        $('#nombre').val(nombre);
        $('#apellido').val(apellido);
        $('#ciudad').val(ciudad);
        $('#estado').val(estado);
        $('#local').val(local);
        $('#email').val(email);
        $('#pais').val(pais);
        $('#telefono').val(telefono);
        $('#perfil').val(perfil);
        $('#referred').val(referred);
        $('#posicion').val(posicion);
         $('#ladomatriz').val(ladomatriz);
         $('#tipo').val(tipo);
         $('#dire').val(dire);
         $('#comen').val(comen);
       };  
       
insercion = function(iduser){
        $('#iduser').val(iduser);
       }; 
       
       
estado = function(iduser,cambioestado){
        $('#iduse').val(iduser);
        $('#cambioestado').val(cambioestado);
       }; 

</script>
@endpush