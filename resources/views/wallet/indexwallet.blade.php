@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
      <div class="box box-info">
        <div class="box-body">
            
            @if(Auth::user()->rol_id == 0)
            <form method="POST" action="{{ route('wallet-filtro') }}" class="form-inline" style="margin-bottom:10px;">
                {{ csrf_field() }}
                
                <div class="form-group has-feedback date col-xs-12 col-md-4">
                    <label class="control-label">Fecha desde</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
                        name="fecha1" required />
                </div>
                <div class="form-group has-feedback date col-xs-12 col-md-4">
                    <label class="control-label">Fecha hasta</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
                        name="fecha2" required />
                </div>
                <div class="form-group has-feedback date col-xs-12 col-md-4" style="margin-bottom: 20px;">
                    <button class="btn green padding_both_small" type="submit" id="btn">
                        buscar
                    </button>
                </div>
            </form>
            
            
            
            <form method="POST" action="{{ route('wallet-filtro-user') }}" class="form-inline">
                {{ csrf_field() }}
                
                
                <div class="form-group has-feedback date col-xs-12 col-md-3">
                    <label class="control-label">ID del Usuario</label>
                    <input class="form-control" type="text" autocomplete="off"
                        name="user" required />
                </div>
                
                <div class="form-group has-feedback date col-xs-12 col-md-3">
                    <label class="control-label">Fecha desde</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
                        name="fecha1" required />
                </div>
                <div class="form-group has-feedback date col-xs-12 col-md-3">
                    <label class="control-label">Fecha hasta</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
                        name="fecha2" required />
                </div>
                <div class="form-group has-feedback date col-xs-12 col-md-3">
                    <button class="btn green padding_both_small" type="submit" id="btn" style="margin-top:20px;">
                        buscar
                    </button>
                </div>
            </form>
            @else
            
            <form method="POST" action="{{ route('wallet-filtro-normal') }}" class="form-inline">
                {{ csrf_field() }}
                
                
                <div class="form-group has-feedback date col-xs-12 col-md-3">
                    <label class="control-label">Nombre del Usuario</label>
                    <input class="form-control" type="text" autocomplete="off"
                        name="display" required />
                </div>
                
                <div class="form-group has-feedback date col-xs-12 col-md-3">
                    <button class="btn green padding_both_small" type="submit" id="btn" style="margin-top:20px;">
                        buscar
                    </button>
                </div>
            </form>
            @endif
            
        </div>
      </div>
</div>

<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
            <table id="mytable" class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">
                            #
                        </th>
                        @if (Auth::user()->rol_id == 0)
                        <th class="text-center">
                            Usuario
                        </th>
                        @endif
                        <th class="text-center">
                            Fecha
                        </th>
                        <th class="text-center">
                            Descripción
                        </th>
                        <th class="text-center">
                            Descuento
                        </th>
                        <th class="text-center">
                            Ingreso
                        </th>
                        <th class="text-center">
                            Retiro
                        </th>
                        <th class="text-center">
                            Balance
                        </th>
                        @if($adicional == '1')
                        <th class="text-center">
                            Valor en otras monedas
                        </th>
                        @endif
                        
                        @if (Auth::user()->rol_id == 0)
                        <th class="text-center">
                            Accion
                        </th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wallets as $wallet)
                    <tr>
                        <td class="text-center">
                            {{$wallet->id}}
                        </td>
                        @if (Auth::user()->rol_id == 0)
                        <td class="text-center">
                            {{$wallet->usuario}}
                        </td>
                        @endif
                        <td class="text-center">
                            {{date('d-m-Y', strtotime($wallet->created_at))}}
                        </td>
                        <td class="text-center">
                            {{$wallet->descripcion}}
                        </td>
                        <td class="text-center">
                            @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{$wallet->descuento}}
                            @else
                            {{$wallet->descuento}} {{$moneda->simbolo}}
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{$wallet->debito}}
                            @else
                            {{$wallet->debito}} {{$moneda->simbolo}}
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{$wallet->credito}}
                            @else
                            {{$wallet->credito}} {{$moneda->simbolo}}
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{$wallet->balance}}
                            @else
                            {{$wallet->balance}} {{$moneda->simbolo}}
                            @endif
                        </td>
                        @if($adicional == '1')
                        <td class="text-center">
                             {{$wallet->monedaAdicional}}
                        </td>
                        @endif
                        @if (Auth::user()->rol_id == 0)
                        <td>
                            <a class="btn btn-danger cancelar" href="{{ route('wallet-cancel', $wallet->id) }}" data-id="{{$wallet->id}}">
                                <i class="fa fa-trash"></i></a>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h4 style="text-align:center;"><strong>Total:
            
            @if ($moneda->mostrar_a_d)
                {{$moneda->simbolo}} {{$total}}
             @else
                {{$total}} {{$moneda->simbolo}}
            @endif
            </strong></h4>
        </div>
    </div>

</div>
@if (Auth::user()->rol_id != 0)
@if ($Botones->btn_retiro == 1)
<div class="col-xs-12 col-sm-6">
    <button class="btn btn-info btn-block" data-toggle="modal" data-target="#myModalRetiro">Comisiones pagadas</button>
</div>
@endif
@if ($Botones->btn_transferencia == 1)
<div class="col-xs-12 col-sm-6">
    <button class="btn btn-info btn-block" data-toggle="modal" data-target="#myModalTrasferencia">Transferencia</button>
</div>
@endif
@endif
</div>
</div>

@include('wallet/componentes/formRetiro')
@include('wallet/componentes/formTransferencia')

@endsection

@include('usuario.componentes.scripBotones')
@push('script')
<script>
    function metodospago() {
        $('#correo').hide()
        $('#wallet').hide()
        $('#bancario').hide()
        let url = 'wallet/obtenermetodo/' + $('#metodopago').val()
        $.get(url, function (response) {
            let data = JSON.parse(response)
            $('#total').val(0)
            if (data.tipofeed == 1) {
                $('#comision').val(data.feed * 100)
                $('#lblcomision').text('Comision de Retiro en Porcentaje')
                $('#comisionH').val(data.feed)
                $('#tipo').val(data.tipofeed)
                $('#monto_min').val(data.monto_min)
            } else {
                $('#comision').val(data.feed)
                $('#lblcomision').text('Comision de Retiro Fija')
                $('#comisionH').val(data.feed)
                $('#tipo').val(data.tipofeed)
                $('#monto_min').val(data.monto_min)
            }
            if (data.correo == 1) {
                $('#correo').show()
            }
            if (data.wallet == 1) {
                $('#wallet').show()
            }
            if (data.bancario == 1) {
                $('.bancario').show()
            }
            $('#retirar').removeAttr('disabled')
        })
    }

    function totalRetiro(valor, tagTipo, tagResul, tagValor) {
        console.log(valor, tagTipo, tagResul, tagValor);

        let resul = 0
        if ($('#' + tagTipo).val() == 1) {
            let tmp = valor * $('#' + tagValor).val()
            resul = valor - tmp
        } else {
            resul = valor - $('#' + tagValor).val()
        }
        $('#' + tagResul).val(resul)
    }
</script>

<script type="text/javascript">

$('.cancelar').on('click',function(e){
 e.preventDefault();
 
 var ID = $(this).attr('data-id');
        
   Swal.fire({
  title: 'Esta seguro que quiere eliminar esta comision',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'wallet/'+ID+'/cancelar';
    }
  });
});

</script>
@endpush