@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
      
      
      <a href="{{route('setting-btc')}}" class="btn btn-info btn-block">@if($settings->btc == '1') Desactivar Criptomonedas @else Activar Criptomonedas @endif</a>
   
      
            <button type="button" class="btn btn-info btn-block hh" data-toggle="modal" data-target="#myModal">Editar Configuración BTC
            </button>
            
            <table id="mytable" class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">
                            Crypto
                        </th>
                        <th class="text-center">
                            Billetera
                        </th>
                        <th class="text-center">
                            Clave Api Publica
                        </th>
                        <th class="text-center">
                          Clave Api Privada
                        </th>

                       
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td class="text-center">
                            {{ env('CRYPTO') }}
                        </td>
                        <td class="text-center">
                            {{ env('BILLETERA_BTC') }}
                        </td>
                        <td class="text-center">
                            {{ env('COIN_PAYMENT_PUBLIC_KEY') }}
                        </td>
                       
                        <td class="text-center">
                            {{ env('COIN_PAYMENT_PRIVATE_KEY') }}
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Configuración de BTC</h4>
      </div>
      <div class="modal-body">
        <form class="" action="{{route ('setting-save-btc')}}" method="post"> 
          {{ csrf_field() }}
          
          <div class="form-group">
            <label for="">Crypto</label>
            <input type="text" name="crypto" class="form-control" value="{{env('CRYPTO')}}" required>
          </div>
          
          <div class="form-group">
            <label for="">Billetera</label>
            <input type="text" name="billetera" class="form-control" value="{{env('BILLETERA_BTC')}}" required>
          </div>
          
          <div class="form-group">
            <label for="">Clave Api Publica</label>
            <input type="text" name="publickey" class="form-control" value="{{env('COIN_PAYMENT_PUBLIC_KEY')}}" required>
          </div>
          
          <div class="form-group">
            <label for="">Clave Api Privada</label>
            <input type="text" name="privatekey" class="form-control" value="{{env('COIN_PAYMENT_PRIVATE_KEY')}}" required>
          </div>
          
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Guardar</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

@endsection
@include('usuario.componentes.scritpTable')

@push('script')
<script type="text/javascript">

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