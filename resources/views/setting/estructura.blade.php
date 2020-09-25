@extends('layouts.dashboardnew')

@section('content')


<div class="col-xs-12">
  <!-- informacion -->
  <div class="box box-info mostrar">
    <div class="box-header with-border">
      <div class="box-title white">
        <h3>Información de las Estructura del Sistema </h3>
        <button class="btn btn-info btn-block mostrar hh toggle">Editar</button>
      </div>
    </div>
    {{-- cuerpo --}}
    <div class="box-body">
      <div class="col-sm-6 col-xs-12 ch white">
        <h3>Sistema de Clientes</h3>
        <h5>
          @if ($settingCliente->cliente == 1)
          SI
          @else
          NO
          @endif
        </h5>
      </div>
      <div class="col-sm-6 col-xs-12 ch kl white">
        <h3>Los Clientes Tiene Acceso Al Backoffice</h3>
        <h5>
          @if ($settingCliente->permiso == 1)
          SI
          @else
          NO
          @endif
        </h5>
      </div>
      <div class="col-sm-6 col-xs-12 ch white">
        <h3>Tipo de Estructura</h3>
        <h5>{{$settingEstructura->tipoestructura}}</h5>
      </div>
      <div class="col-sm-6 col-xs-12 ch kl white">
        <h3>Cantidad de Niveles (Fila en Matriz)</h3>
        <h5>{{$settingEstructura->cantnivel}}</h5>
      </div>
      @if($settingEstructura->tipoestructura == 'matriz' || $settingEstructura->tipoestructura == 'binaria')
      <div class="col-sm-6 col-xs-12 ch white">
        <h3>Cantidad de Columnas (Matriz)</h3>
        <h5>{{$settingEstructura->cantfilas}}</h5>
      </div>
      <div class="col-sm-6 col-xs-12 ch kl white">
        <h3>Matriz de:</h3>
        <h5>{{$settingEstructura->cantfilas}} * {{$settingEstructura->cantnivel}}</h5>
      </div>
      @elseif($settingEstructura->tipoestructura == 'ambas')
      <div class="col-sm-6 col-xs-12 ch white">
        <h3>Cantidad de Columnas (Matriz)</h3>
        <h5>{{$settingEstructura->cantfilas}}</h5>
      </div>
      <div class="col-sm-6 col-xs-12 ch kl white">
        <h3>Matriz de:</h3>
        <h5>{{$settingEstructura->cantfilas}} * {{$settingEstructura->cantnivel}}</h5>
      </div>
      <div class="col-sm-6 col-xs-12 ch white">
        <h3>Estructura Principal (Ambas)</h3>
        <h5>
          @if($settingEstructura->estructuraprincipal == 1)
          Arbol
          @elseif($settingEstructura->estructuraprincipal == 2)
          Matriz
          @endif
        </h5>
      </div>
      <div class="col-sm-6 col-xs-12 ch kl white">
        <h3>Usuario de la estructura Principal (Ambas)</h3>
        <h5>
          @if($settingEstructura->usuarioprincipal == 1)
          Admin
          @elseif($settingEstructura->usuarioprincipal == 2)
          Usuarios
          @endif
        </h5>
      </div>
      @endif
    </div>
  </div>
  {{-- formulario --}}
  <div class="box box-info mostrar" style="display:none;">
    <div class="box-header with-border">
      <div class="box-title white">
        <h3>Configuración de Estructura del Sistema </h3>
      </div>
    </div>
    {{-- cuerpo --}}
    <div class="box-body">
      <div class="alert alert-info alert-dismissible" role="alert">
        <strong>¡Aviso!</strong> La Modificación de esta parte va a reiniciar todo el sistema, usarlo solamente para
        nuevas
        instalaciones
      </div>
      <form class="" action="{{route('setting-save-estructura')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$settingEstructura->id}}">
        <div class="form-group col-sm-6 col-xs-12 ptr">
          <label for="" class="white">¿Sistema de Clientes?</label>
          <select name="cliente" class="form-control">
            <option value="" selected disabled>Selecione una Opcion</option>
            <option value="0">NO</option>
            <option value="1">SI</option>
          </select>
        </div>
        <div class="form-group col-sm-6 col-xs-12 ptr">
          <label for="" class="white">¿Lo Clientes Podran Acceder al BackOffice?</label>
          <select name="permiso" class="form-control">
            <option value="" selected disabled>Selecione una Opcion</option>
            <option value="0">NO</option>
            <option value="1">SI</option>
          </select>
        </div>
        <div class="form-group col-sm-6 col-xs-12 ptr">
          <label for="" class="white">Tipo de Estructura</label>
          <select class="form-control" name="tipoestrutura" id="tipoestrutura" required onchange="estructuradetalle()">
            <option value="" selected disabled>Seleccione una Opción</option>
            <option value="arbol">Unilevel o Arbol</option>
            <option value="binaria">Matriz Binaria</option>
            <option value="matriz">Matriz Forzada</option>
            <option value="ambas">Ambas</option>
          </select>
        </div>
        <div class="form-group col-sm-6 col-xs-12 matriz ptr" style="display:none;">
          <label for="" class="white">Cantidad de Colmunas (solo matriz)</label>
          <input class="form-control" type="number" name="cantfila">
        </div>
        <div class="form-group col-sm-6 col-xs-12 ptr white">
          <label for="" class="white">Cantidad de Niveles (Filaz en matriz)</label>
          <input class="form-control" type="number" name="cantnivel" required>
        </div>
        <div class="form-group col-sm-6 col-xs-12 ambas ptr white" style="display:none;">
          <label for="" class="white">Estructura Principal</label>
          <select class="form-control" name="estruprincipal">
            <option value="" selected disabled>Seleccione una Opción</option>
            <option value="1">Unilevel</option>
            <option value="2">Matriz Forzada</option>
          </select>
        </div>
        <div class="form-group col-sm-6 col-xs-12 ambas ptr white" style="display:none;">
          <label for="" class="white">¿La estructura principal que usuario la tendra?</label>
          <select class="form-control" name="userprincipal">
            <option value="" selected disabled>Seleccione una Opción</option>
            <option value="1">Admin</option>
            <option value="2">Usuarios</option>
          </select>
        </div>
        <div class="form-group col-sm-12 ji">
          <div class="form-group col-sm-6">
            <button class="btn btn-danger btn-block mostrar" style="display:none;" onclick="toggle()">Cancelar</button>
          </div>
          <div class="form-group col-sm-6"> <button type="submit" class="btn btn-success btn-block"> Guardar <span
                class="glyphicon glyphicon-floppy-disk"></span></div>

          </button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@push('script')
<script type="text/javascript">
  function toggle() {
    $('.mostrar').toggle('slow')
  }

  function estructuradetalle() {
    $(".matriz").hide(100)
    $(".ambas").hide(100)
    $(".matriz input").removeAttr('required')
    $(".ambas select").removeAttr('required')
    let estrutura = $("#tipoestrutura").val()
    console.log(estrutura);
    
    if (estrutura == 'matriz') {
      $(".matriz").toggle(100)
      $(".matriz input").attr('required', 'true')
    }else if (estrutura == 'binaria') {
      $(".matriz").toggle(100)
      $(".matriz input").attr('required', 'true')
      $(".matriz input").val(2);
      $(".matriz input").attr('readonly', 'true');
    } else if (estrutura == 'ambas') {
      $(".matriz").toggle(100)
      $(".matriz input").attr('required', 'true')
      $(".ambas").toggle(100)
      $(".ambas select").attr('required', 'true')
    }
  }
</script>
@endpush