@extends('layouts.dashboardnew')

@section('content')


<div class="col-xs-12">
  <div class="box">
    <div class="box-body">
      <br class="col-xs-12">
      <table id="mytable" class="table">
        <thead>
          <tr>
            <th class="text-center">
              ID
            </th>
            <th class="text-center">
              Usuario
            </th>
            <th class="text-center">
              Correo Electrónico
            </th>
            <th class="text-center">
              Referifo Por
            </th>
            @if ($tipo != 2)
            <th class="text-center">
              Estatus
            </th>
            @endif
                       
            @if($tipo == 1)
            <th class="text-center">
              Acción
            </th>
            @endif
          </tr>
        </thead>
        <tbody>
          @foreach($usuarios as $usuario)
          <tr>
            <td class="text-center">
              {{ $usuario->ID }}
            </td>
            <td class="text-center">
              {{ $usuario->display_name }}
            </td>
            <td class="text-center">
              {{ $usuario->user_email }}
            </td>
            <td class="text-center">
              {{ $usuario->patrocinador }}
            </td>
            @if ($tipo != 2)
            <td class="text-center">
              @if ($usuario->status == 1)
              Activo
              @else
              Inactivo
              @endif
            </td>
            @endif
            
            
            @if($tipo == 1)
            <td class="text-center">
              <a class="btn btn-info" data-toggle="modal" data-target="#moderador" onclick="seleccionar('{{$usuario->ID}}','{{$usuario->display_name}}')">Permisos Menu</a>
            </td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>



<div class="modal fade" id="moderador" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Permisos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('admin-save-permiso')}}" method="post">
          {{ csrf_field() }}

          <input type="hidden" name="id" id="id">  
          <input type="hidden" name="iduser" id="iduser">
          <input type="hidden" name="nameuser" id="nom">

       
        <div class="col-md-4 col-xs-6">
          <h4>Cursos</h4>
        <input type="checkbox" name="cursos" id="cursos" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4 col-xs-6">
        <h4>Entradas</h4>
        <input type="checkbox" name="entradas" id="entradas" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4 col-xs-6">
          <h4>Lista Usuarios</h4>
        <input type="checkbox" name="usuario" id="usuario" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        <div class="col-md-4 col-xs-6">
          <h4>Usuarios</h4>
        <input type="checkbox" name="usuarios" id="usuarios" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4 col-xs-6">
          <h4>Historial Comisiones</h4>
        <input type="checkbox" name="historialcomision" id="historialcomision" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        <div class="col-md-4 col-xs-6">
          <h4>Red</h4>
        <input type="checkbox" name="red" id="red" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        <div class="col-md-4 col-xs-6">
          <h4>Eventos</h4>
        <input type="checkbox" name="eventos" id="eventos" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        <div class="col-md-4 col-xs-6">
          <h4>Ajuste</h4>
        <input type="checkbox" name="ajuste" id="ajuste" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        {{--<div class="col-md-4 col-xs-6">
          <h4>Registro</h4>
        <input type="checkbox" name="nuevo_registro" id="nuevo_registro" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        <div class="col-md-4 col-xs-6">
          <h4>Red Usuario</h4>
        <input type="checkbox" name="red_usuario" id="red_usuario" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        <div class="col-md-4 col-xs-6">
          <h4>Vision Usuario</h4>
        <input type="checkbox" name="vision_usuario" id="vision_usuario" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        <div class="col-md-4 col-xs-6">
          <h4>Billetera</h4>
        <input type="checkbox" name="billetera" id="billetera" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        <div class="col-md-4 col-xs-6">
          <h4>Pagos</h4>
        <input type="checkbox" name="pago" id="pago" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        <div class="col-md-4 col-xs-6">
          <h4>Informes</h4>
        <input type="checkbox" name="informes" id="informes" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        <div class="col-md-4 col-xs-6">
          <h4>Tickets</h4>
        <input type="checkbox" name="tickets" id="tickets" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        <div class="col-md-4 col-xs-6">
          <h4>Correos</h4>
        <input type="checkbox" name="correos" id="correos" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        <div class="col-md-4 col-xs-6">
          <h4>Ranking</h4>
        <input type="checkbox" name="ranking" id="ranking" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        <div class="col-md-4 col-xs-6">
          <h4>Historial</h4>
        <input type="checkbox" name="historial_actividades" id="historial_actividades" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        <div class="col-md-4 col-xs-6">
          <h4>Soporte</h4>
        <input type="checkbox" name="soporte" id="soporte" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>


        <div class="col-md-4 col-xs-6">
          <h4>Herramientas</h4>
        <input type="checkbox" name="herramienta" id="herramienta" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        <div class="col-md-4 col-xs-6">
          <h4>Calendario</h4>
        <input type="checkbox" name="calendario" id="calendario" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>

        <div class="col-md-4 col-xs-6">
          <h4>Prospeccion</h4>
        <input type="checkbox" name="prospeccion" id="prospeccion" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>


        <div class="col-md-4 col-xs-6">
          <h4>Tienda</h4>
        <input type="checkbox" name="tienda" id="tienda" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>


        <div class="col-md-4 col-xs-6">
          <h4>Transacciones</h4>
        <input type="checkbox" name="transacciones" id="transacciones" data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>--}}

          
          <div class="col-md-12" style="margin-top: 20px;">     
              <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <div class="col-md-12" style="margin-top: 20px;"> 
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
      </div>
    </div>
  </div>
</div>

@endsection
@include('usuario.componentes.scritpTable')


@push('script')
<script type="text/javascript">
seleccionar = function(id,nombre){

        $('#iduser').val(id);
        $('#nom').val(nombre);

      $.get('permiso/'+id, function (response) {
          permisos = JSON.parse(response)
           permisos.forEach(item => {
            $('#id').val(item.id);
            $('#cursos').bootstrapToggle((item.cursos == 1) ? 'on' : 'off');
            $('#entradas').bootstrapToggle((item.entradas == 1) ? 'on' : 'off');
            $('#nuevo_registro').bootstrapToggle((item.nuevo_registro == 1) ? 'on' : 'off');
            $('#red_usuario').bootstrapToggle((item.red_usuario == 1) ? 'on' : 'off');
            $('#vision_usuario').bootstrapToggle((item.vision_usuario == 1) ? 'on' : 'off');
            $('#billetera').bootstrapToggle((item.billetera == 1) ? 'on' : 'off');
            $('#pago').bootstrapToggle((item.pago == 1) ? 'on' : 'off');
            $('#informes').bootstrapToggle((item.informes == 1) ? 'on' : 'off');
            $('#tickets').bootstrapToggle((item.tickets == 1) ? 'on' : 'off');
            $('#correos').bootstrapToggle((item.correos == 1) ? 'on' : 'off');
            $('#ranking').bootstrapToggle((item.ranking == 1) ? 'on' : 'off');
            $('#historial_actividades').bootstrapToggle((item.historial_actividades == 1) ? 'on' : 'off');
            $('#soporte').bootstrapToggle((item.soporte == 1) ? 'on' : 'off');
            $('#herramienta').bootstrapToggle((item.herramienta == 1) ? 'on' : 'off');
            $('#calendario').bootstrapToggle((item.calendario == 1) ? 'on' : 'off');
            $('#prospeccion').bootstrapToggle((item.prospeccion == 1) ? 'on' : 'off');
            $('#usuario').bootstrapToggle((item.usuario == 1) ? 'on' : 'off');
            $('#tienda').bootstrapToggle((item.tienda == 1) ? 'on' : 'off');
            $('#transacciones').bootstrapToggle((item.transacciones == 1) ? 'on' : 'off');
            $('#usuarios').bootstrapToggle((item.usuarios == 1) ? 'on' : 'off');
            $('#red').bootstrapToggle((item.red == 1) ? 'on' : 'off');
            $('#eventos').bootstrapToggle((item.eventos == 1) ? 'on' : 'off');
            $('#ajuste').bootstrapToggle((item.ajuste == 1) ? 'on' : 'off');
            $('#historialcomision').bootstrapToggle((item.historialcomision == 1) ? 'on' : 'off');
           });
         })
       };  

  </script>
@endpush     