@extends('layouts.login.inicio')

@section('content')

<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
            <table id="mytable" class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">
                            #
                        </th>
                
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
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transferencias as $wallet)
                    <tr>
                        <td class="text-center">
                            {{$wallet->id}}
                        </td>
                      
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
                
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>



<div class="col-xs-12 col-sm-6 col-md-offset-3">
    <button class="btn btn-info btn-block" data-toggle="modal" data-target="#myModalTrasferencia">Transferencias</button>
</div>

@include('inicio.transferencias.formtransferencia')

@endsection

@push('script')
<script>

function totalRetiro(valor) {
    
   
    var feet = $('#comisionT').val()
    var tipo = $('#tipo1').val()
    
     if (tipo == 1) {
         var total = (valor * feet)
         var totalfinal = (valor - total)
    $('#total2').val(totalfinal)
     } else {
         
         var totalfinal = (valor - feet)
    $('#total2').val(totalfinal)
     }
    console.log(opt);
    
}
</script>
@endpush