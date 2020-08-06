@extends('layouts.dashboardnew')

@section('content')
@push('style')
<style>
  .texto-central {
    text-align: center;
  }

  .var {
    margin: 0 10px;
    color: brown;
    border-bottom: 2px solid;
  }
</style>
@endpush

<div class="col-xs-12">
  <div class="box">
    <div class="box-body">
      {{-- informario --}}
      <div class="col-xs-12 mostrar">
        <div class="box box-info">
          <div class="box-header">
            <div class="box-title">
              <h3>Información de las Plantilla de correos </h3>
                 
                 <a class="btn btn-info btn-block mostrar hh" data-toggle="modal" data-target="#habilitarcorreo">Habilitar Correos</a>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
                
                <div class="col-xs-12 col-md-12">
                            <h4><strong>Correos Habilitados</strong></h4>
                            <div class="col-xs-6">
                                <h5>Correo de Pago: {{($Correos->pago == 1) ? 'Activo' : 'Inactivo'}}</h5>
                            </div>
                            <div class="col-xs-6">
                                <h5>Correo de Compra: {{($Correos->compra == 1) ? 'Activo' : 'Inactivo'}}</h5>
                            </div>
                            
                            <div class="col-xs-6">
                                <h5>Correo de pago Compra: {{($Correos->pc == 1) ? 'Activo' : 'Inactivo'}}</h5>
                            </div>
                            
                            <div class="col-xs-6">
                                <h5>Correo de Liquidacion: {{($Correos->liquidacion == 1) ? 'Activo' : 'Inactivo'}}</h5>
                            </div>
                        </div>
                        
                        </div>
          </div>
        </div>
      </div>
      
       </div>
  </div>
</div>

{{-- modal para habilitar correo --}}
@include('archivo.correo.modalhabilitar')

@endsection

@push('script')
<script>
  $(document).ready(function () {
    $('.summernote').summernote({
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ol', 'ul', 'paragraph', 'height']],
        ['table', ['table']],
        ['insert', ['link']],
      ]
    });
  })

</script>
@endpush