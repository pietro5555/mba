@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box">
    <div class="box-body">
      {{-- Informarcion --}}
      @include('setting.componentes.comision.informacion')
      {{-- formulario --}}
      @include('setting.componentes.comision.formulario')
    </div>
  </div>
</div>
@include('setting.componentes.comision.modalComisione')

@endsection

@push('script')
<script type="text/javascript">
  var rangos = null
  var productos = null 
  $(document).ready(function () {
    $.get('getrangosall', function (response) {
      rangos = JSON.parse(response)
    })
    $.get('getproductosall', function (response) {
      productos = JSON.parse(response)
    })
  })
 
  function toggle() {
    $('.mostrar').toggle('slow')
  }
  // detalles de la comisiones
  function comisiondetalle() {
    $('#valor').empty()
    $('#valor2').empty()
    let tipoComision = $('#tipocomision').val()
    let niveles = $('#niveles').val()
    if (tipoComision == 'general') {
      $('#valor').append(
        '<label for="">Valor de Comision</label>' +
        '<input type="number" step="any" class="form-control" name="valorgeneral">'
      )
    } else if (tipoComision == 'detallado') {
      for (var i = 0; i < niveles; i++) {
        $('#valor').append(
          '<label for="">Valor de Comision Nivel ' + (i + 1) + '</label>' +
          '<input type="number" step="any" class="form-control" name="nivel' + (i + 1) + '">'
        )
      }
    } else if (tipoComision == 'categoria') {
      if (rangos.length < 2) {
        $('#valor2').append(
          '<div class="alert alert-warning" role="alert">' +
          '<h4> <b>Aviso:</b> Para usar este modo, primero debes tener la configuración de rango lista</h4>' +
          '</div>'
        )
      } else {
        $('#valor2').append(
          '<div class="alert alert-info" role="alert">' +
          '<h4> <b>Nota:</b> Colocar el nombre exacto que de la categoria que enstan en la tienda, Esto permitira comparar los productos que tienen esas categorias y pagar las comisiones</h4>' +
          '</div>'
        )
        let comision = ''
        for (let i = 0; i < niveles; i++) {

          rangos.forEach(item => {
            comision = comision + '<div class="form-group col-xs-12 col-sm-6 col-lg-4">' +
              '<label for="">Comision para el rango: ' + item.name + '</label>' +
              '<input type="number" class="form-control" step="any" required min="0" name="idrango' + item.id +
              '_' + (i + 1) + '">' +
              '</div>'
          });

          $('#valor2').append(
            '<h4 class="col-xs-12"> Configuracion de la Categoria ' + (i + 1) + ' </h4>' +
            '<div class="form-group col-xs-12 col-sm-6 col-lg-4">' +
            '<label for="">Nombre de la Categoria que esta en la Tienda</label>' +
            '<input type="text" class="form-control" required name="categoria' + (i + 1) + '">' +
            '</div>' + comision
          )
          comision = ''
        }

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
          '<h4> <b>Nota:</b> Si el valor en un nivel es 0, ese nivel no se cobrara</h4>' +
          '</div>'
        )
        let comision = ''
        productos.forEach(item => {
          for (var i = 0; i < niveles; i++) {
            comision = comision + '<div class="form-group col-xs-12 col-sm-6 col-lg-4">' +
              '<label for="">Comision para el nivel: ' + (i + 1) + '</label>' +
              '<input type="number" class="form-control" step="any" required min="0" name="idproducto' + item.ID +
              '_' + (i + 1) + '">' +
              '</div>'
          }
          $('#valor2').append(
            '<h4 class="col-xs-12"> Configuracion del Producto - ID: ' + item.ID + ' </h4>' +
            comision
          )
          comision = ''
        })
      }
    }
  }
  // detalles del bono de activacion
  function agregarProducto() {
        let producto = $('#producto').val()
        let monto = $('#monto').val()
        let bono = $('#bono').val()
        if (bono == '') {
          $('#bono').val(producto+' - '+monto)
        } else {
          $('#bono').val(bono+', '+producto+' - '+monto)
        }
        $('#producto').val('')
        $('#monto').val('')
    }
    // permite borrar la configuracion anterior de la activacion
    function borrarTodo(){
      $('#bono').val('')
    }
    
    
    function seleccionado(){
    var opt = $('#opcion').val();
    
    if(opt=="niveles"){
        $('#categoria').hide();
        $('#ocultar').show();
        }else{
             $('#categoria').show();
             $('#ocultar').hide();
        }
    }
    
    function nivelacion(){
        $('#muestra').empty()
        let cantidad = $('#cantidad').val()
        
        for (var i = 0; i < cantidad; i++) {
        $('#muestra').append(
          '<label for="">Nivel de la comision' + (i + 1) + '</label>' +
          '<input type="number" step="any" class="form-control" name="nivel' + (i + 1) + '">'
        )
      }
    }
</script>
@endpush