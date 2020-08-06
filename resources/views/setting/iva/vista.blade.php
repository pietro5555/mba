@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box">
    <div class="box-body">
      {{-- Informarcion --}}
      @include('setting.iva.informacion')
      {{-- formulario --}}
      @include('setting.iva.formulario')
    </div>
  </div>
</div>


@include('setting.iva.modal')
@include('setting.iva.eliminar')

@endsection

@push('script')
<script type="text/javascript">

 function toggle() {
    $('.mostrar').toggle('slow')
  }
  
  var categorias = null
  var productos = null
  $(document).ready(function () {
   $.get('getcategorias', function (response) {
      categorias = JSON.parse(response)
    })
    $.get('getproductosall', function (response) {
      productos = JSON.parse(response)
    })
  })

 
 
  function comisiondetalle() {
    $('#valor').empty()
    $('#valor2').empty()
    let tipoComision = $('#tipocomision').val()
    let niveles = $('#niveles').val()
    
     if (tipoComision == 'categoria') {
      if (categorias.length < 2) {
        $('#valor2').append(
          '<div class="alert alert-warning" role="alert">' +
          '<h4> <b>Aviso:</b> Para usar este modo, primero debes tener la configuraci贸n de rango lista</h4>' +
          '</div>'
        )
      } else {
        $('#valor2').append(
          '<div class="alert alert-info" role="alert">' +
          '<h4> <b>Nota:</b> Colocar el nombre exacto que de la categoria que en wordpress, Esto permitira comparar los productos que tienen esas categorias y pagar las comisiones</h4>' +
          '</div>'
        )
        let comision = ''
        
          categorias.forEach(item => {
              
               $('#valor2').append(
          
            '<div class="form-group col-xs-12 col-sm-6 col-lg-4">' +
            '<label for="">Iva de la Categoria que esta en Wordpress '+ item.term_taxonomy_id + '</label>' +
            '<input type="number" class="form-control" required step="any" name="categoria' + item.term_taxonomy_id + '">' +
            '</div>' 
          )
            
          });
        

      }
    } else if (tipoComision == 'producto') {
      if (productos.length <= 0) {
        $('#valor2').append(
          '<div class="alert alert-warning" role="alert">' +
          '<h4> <b>Aviso:</b> Para usar este modo, primero debes tener productos registrado</h4>' +
          '</div>'
        )
      } else {
        $('#valor2').append(
          '<div class="alert alert-info" role="alert">' +
          '<h4> <b>Nota:</b> Si el valor es 0, ese producto no generara puntos</h4>' +
          '</div>'
        )
        
        
        productos.forEach(item => {
          $('#valor2').append(
              
           '<div class="form-group col-xs-12 col-sm-4">' +
              '<label for="">Iva del producto: ' + item.ID + '</label>' +
              '<input type="number" class="form-control" step="any" required min="0" name="categoria' + item.ID + '">' +
              '</div>'
              )
          });
      }
    }
  }
 </script>
@endpush