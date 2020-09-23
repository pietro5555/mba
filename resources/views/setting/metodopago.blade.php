@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
    <div class="box">
        <div class="box-body">
            {{-- comision metodo de pago --}}
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="box-title white">
                            <h3>
                                Comision de Metodos de Pagos y activar botones
                                <button type="button" class="btn btn-info btn-block hh" id="modal">
                                    Editar
                                </button>
                            </h3>
                        </div>
                    </div>
                    {{-- cuerpo --}}
                    <div class="box-body">
                        <div class="col-xs-12 col-md-6 ch white">
                            <h3>Comision Por Transferencia</h3>
                            @if (!empty($comisiones[0]))
                            <h5>
                                @if ($comisiones[0]->tipotransferencia == 1)
                                    {{$comisiones[0]->comisiontransf * 100}} %
                                @else
                                    {{$comisiones[0]->comisiontransf}} $
                                @endif
                            </h5>
                            @else
                            <div class="alert alert-info">
                                <strong>Cree o configure las comiciones en Ajuste - Comisiones</strong>
                            </div>
                            @endif
                        </div>
                        <div class="col-xs-12 col-md-6 white">
                            <h4>Botones Habilitados</h4>
                            <div class="col-xs-6">
                                <h5>Boton Transferencia: {{($Botones->btn_transferencia == 1) ? 'Activo' : 'Inactivo'}}</h5>
                            </div>
                            <div class="col-xs-6">
                                <h5>Boton Retiro: {{($Botones->btn_retiro == 1) ? 'Activo' : 'Inactivo'}}</h5>
                            </div>
                            <div class="col-xs-6">
                                <h5>Boton Pago Masivo: {{($Botones->btn_masivo == 1) ? 'Activo' : 'Inactivo'}}</h5>
                            </div>
                            <div class="col-xs-6">
                                <h5>Boton Pagar Todo: {{($Botones->btn_todo == 1) ? 'Activo' : 'Inactivo'}}</h5>
                            </div>
                            
                            <div class="col-xs-6">
                                <h5>Boton Liquidacion: {{($Botones->btn_liquida == 1) ? 'Activo' : 'Inactivo'}}</h5>
                            </div>
                            
                            <div class="col-xs-6">
                                <h5>Boton Pagar monto minimo y maximo: {{($Botones->btn_monto == 1) ? 'Activo' : 'Inactivo'}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- comision metodo de pago fin --}}
            {{-- metodo de pago --}}
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="box-title white">
                            <h3>Metodos de Pagos</h3>
                            <button type="button" class="btn btn-info btn-block hh" data-toggle="modal"
                                data-target="#myModal">
                                Agregar Metodo
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        {{-- listado --}}
                        @include('setting.componentes.tablaMetodoPago')
                    </div>
                </div>
            </div>
            {{-- fin metodo de pago --}}
        </div>
    </div>
<!-- Modal -->
@include('setting.componentes.modalMetodoPago')
@include('setting.componentes.modalEditMetodoPago')
@include('setting.componentes.modalComisionMetodoPago')
{{-- script para la tabla --}}
@include('usuario.componentes.scritpTable')
@endsection

@push('script')
<script>
    function getForm(id) {
        let url = 'getmetodo/' + id
        $.get(url, function (response) {
            response = JSON.parse(response)
            $('#id').val(response.id)
            $('#nombre').val(response.nombre)
            $('#feed').val(response.feed)
            if (response.tipofeed == 0) {
                $('#feed').val(response.feed)
            } else {
                $('#feed').val(response.feed * 100)
            }
            $('#monto_min').val(response.monto_min)
            $('#tipofeed').val(response.tipofeed)
            $('#correo').val(response.correo)
            $('#wallet').val(response.wallet)
            $('#bancario').val(response.datosbancarios)
            $('#myModaledit').modal('show');
        })
    }

    function alertDelete(id) {
        $('#myModaldelete').modal('show');
        $('#delete').val(id)
    }

    function deleteForm() {
        let id = $('#delete').val()
        let url = 'deletemetodo/' + id
        $.get(url, function (response) {
            window.location.reload(3000)
        })
    }
    
    
    $('.alerta').on('click',function(e){
 e.preventDefault();


   var ID = $(this).attr('data-id');
   var estado = $(this).attr('data-estado');
   
   Swal.fire({
  title: 'Esta seguro de realizar esta acción , tenga en cuenta que se realizarán los cambios ',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'updatepago/'+ID+'/'+estado;
    }
  });
});
</script>
@endpush