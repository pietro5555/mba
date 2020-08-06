@extends('layouts.dashboardnew')

@section('content')

{{-- Terminos y Condiciones --}}
<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header with-border">
      <div class="box-title">
        <h3>Terminos y Condiciones</h3>
        <button class="btn btn-primary btn-block mostrar float-right toggle">Editar</button>
      </div>
    </div>
    <div class="box-body">
      {{-- detalles de terminos y condiciones --}}
      <div class="col-xs-12 mostrar">
        <a class="btn btn-primary btn-block" target="_blank"
          href="{{asset('assets/terminosycondiciones.pdf')}}">Descargar
          Terminos y Condiciones</a>
      </div>
      {{-- formulario de terminos y condiciones --}}
      <div class="col-xs-12 mostrar" style="display:none">
        <form class="" action="{{route('setting-terminos')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group col-xs-12 ptr">
            <label for="">Terminos y Condiciones</label>
            <input class="form-control" type="file" name="terminos" accept="application/pdf">
          </div>
          <div class="form-group col-sm-12 ji">
            <div class="form-group col-sm-6">
              <button class="btn btn-danger btn-block mostrar" style="display:none;"
                onclick="toggle()">Cancelar</button>
            </div>
            <div class="form-group col-sm-6">
              <button type="submit" class="btn btn-success btn-block"> Guardar <span
                  class="glyphicon glyphicon-floppy-disk"></span></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Button trigger modal -->
<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-header with-border">
      
        <h3>Formulario de Registro</h3>
        <div class="col-md-3 col-xs-12">
        <button type="button" class="btn btn-info btn-block hh" data-toggle="modal" data-target="#myModal">
          Agregar Campo
        </button>
        </div>
        
        <div class="col-md-3 col-xs-12">
        <a href="{{route('setting-posicionamiento')}}" class="btn btn-info btn-block">
          @if($settings->posicionamiento == '0') Desactivar Posicionamiento @else Activar Posicionamiento @endif
        </a>
        </div>
      
    </div>
    <div class="box-body">
      {{-- listado --}}
      @include('setting.componentes.tablaFormulario')
    </div>
  </div>
</div>
<!-- Modal -->
@include('setting.componentes.modalFormulario')
<!-- Modal Edit y Delete -->
@include('setting.componentes.modalEditFormulario')
{{-- script para la tabla --}}
@include('usuario.componentes.scritpTable')
@endsection

@push('script')
<script type="text/javascript">
$('#alerta').on('click',function(e){
 e.preventDefault();

   var ID = $(this).attr('data-id');
   var estado = $(this).attr('data-estado');
   
   Swal.fire({
  title: '¿Esta seguro(a) de realizar esta acción? Los cambios que realice pueden afectar la imagen y funcionamiento del sistema.',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'updatefield/'+ID+'/'+estado;
    }
  });
});
</script>

<script type="text/javascript">
  $(document).ready(function () {
    $("#multi").tagsinput('items')
    $('#mytable').DataTable({
      dom: 'flBrtip',
      responsive: true,
      buttons: [
        'csv', 'pdf', 'print'
      ]
    });
  })

  function mostrar() {
    if ($('#tipo').val() == 'select') {
      $('.ocultar').show(100)
      $('.mostrar').hide(100)
      $('.fecha').hide(100)
    } else if ($('#tipo').val() == 'datetime' || $('#tipo').val() == 'date') {
      $('.fecha').show(100)
      $('.ocultar').hide(100)
      $('.mostrar').hide(100)
    } else {
      $('.mostrar').show(100)
      $('.ocultar').hide(100)
      $('.fecha').hide(100)
    }
  }

  function getForm(id) {
    let url = 'getform/' + id
    $.get(url, function (response) {
      response = JSON.parse(response)
      $('#id').val(response.id)
      $('#tip').val(response.tip)
      $('#label').val(response.label)
      $('#requerido').val(response.requerido)
      $('#unico').val(response.unico)
      $('#min').val(response.min)
      $('#max').val(response.max)
      $('#myModaledit').modal('show');
    })
  }

  function alertDelete(id) {
    $('#myModaldelete').modal('show');
    $('#delete').val(id)
  }

  function deleteForm() {
    let id = $('#delete').val()
    let url = 'deleteform/' + id
    $.get(url, function (response) {
      window.location.reload(3000)
    })
  }
  
</script>
@endpush