{{-- informacion genera--}}
<div class="col-xs-12 mostrar">
    {{-- bono activacion --}}
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">
                <h3>Bono Por Activacion y Comision de Primera Compra</h3>
                <button type="button" class="btn btn-info btn-block hh" id="modal">
                    Editar
                </button>
            </div>
        </div>
        <div class="box-body">
            <div class="alert alert-warning alert-dismissible" role="alert">
                <strong>Nota:</strong> Para desactivar este bono deben poner el valor del monto en 0 agregando un solo producto
            </div>
            <div class="col-xs-12 col-sm-6">
                <h5>Bono por Activacion</h5>
                @empty(!$settingComision)
                @empty(!$settingComision->bonoactivacion)
                <div class="row">
                @foreach ($settingComision->bonoactivacion as $item)
                @if($settingComision->tipobono != 'niveles')
                    <div class="col-xs-6">
                        <label for="">Producto ID</label>
                        <input type="text" readonly class="form-control" value="{{$item->producto}}">
                    </div>
                    <div class="col-xs-6">
                        <label for="">Bono</label>
                        <input type="text" readonly class="form-control" value="{{$item->bono}}">
                    </div>
                    @else
                    <div class="col-xs-6">
                        <label for="">Nivel</label>
                        <input type="text" readonly class="form-control" value="{{$item->nivel}}">
                    </div>
                    
                    <div class="col-xs-6">
                        <label for="">Bono</label>
                        @if($item->tipobono == 'porcentaje')
                        <input type="text" readonly class="form-control" value="{{$item->bono * 100}} %">
                        @else
                        <input type="text" readonly class="form-control" value="{{$item->bono}}">
                        @endif
                    </div>
                    
                    @endif
                @endforeach
                </div>
                @else
                        <input type="text" readonly class="form-control" value="">
                    
                @endempty
                @endempty
            </div>
            <div class="col-xs-12 col-sm-6">
                    <h5>Tipo de bono</h5>
                    @empty(!$settingComision)
                    <input type="text" readonly class="form-control"
                        value="{{$settingComision->tipobono}}">
                    @endempty
                </div>
            <div class="col-xs-12 col-sm-6">
                <h5>Recibir Bono de los Usuario</h5>
                @empty(!$settingComision)
                <input type="text" readonly class="form-control"
                    value="{{($settingComision->directos == 1) ? 'Directos' : 'Todos en red'}}">
                @endempty
            </div>
            <div class="col-xs-12 col-sm-6">
                <h5>Aceptar Primera Compra</h5>
                @empty(!$settingComision)
                <input type="text" readonly class="form-control"
                    value="{{($settingComision->primera_compra == 1) ? 'SI' : 'NO'}}">
                @endempty
            </div>
        </div>
    </div>
    {{-- bono activacion fin --}}
    {{-- productos que no generan comisiones --}}
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">
                <h3>ID de productos que no generan comisiones</h3>
                <button type="button" class="btn btn-info btn-block hh" id="modal3">
                    Editar
                </button>
            </div>
        </div>
        <div class="box-body">
            <h5>ID de productos</h5>
            <input type="text" readonly class="form-control" value="{{$settings->id_no_comision}}">
        </div>
    </div>
    {{-- productos que no generan comisiones fin --}}
    {{-- comisiones  --}}
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">
                <h3>Información de las comisiones del Sistema </h3>
                <button class="btn btn-info btn-block mostrar hh toggle">Editar</button>
            </div>
        </div>
        <div class="box-body">
            @empty(!$settingComision)
            <div class="col-sm-3 col-xs-12">
                <h5>Niveles de Cobro</h5>
                <input type="text" class="form-control" readonly value="{{$settingComision->niveles}}">
            </div>
            <div class="col-sm-3 col-xs-12">
                <h5>Tipo</h5>
                <input type="text" class="form-control" readonly value="{{$settingComision->tipocomision}}">
            </div>
            <div class="col-sm-3 col-xs-12">
                <h5>Se calcula por</h5>
                <input type="text" class="form-control" readonly value="{{$settingComision->tipopago}}">
            </div>
            <div class="col-sm-3 col-xs-12">
                @if($settingComision->tipocomision == 'general')
                <h5>Valor General</h5>
                <h5>
                    @if ($settingComision->tipopago == 'porcentaje')
                    <input type="text" class="form-control" readonly value="{{$settingComision->valorgeneral*100}} %">
                    @else
                    <input type="text" class="form-control" readonly value="{{$settingComision->valorgeneral}} $">
                    @endif
                </h5>
                @elseif($settingComision->tipocomision == 'detallado')
                <h5>Valor Detallado</h5>
                <h5>
                    @foreach($settingComision->valordetallado as $primerarreglo)
                    @foreach($primerarreglo as $nivel => $valor)
                    @if ($settingComision->tipopago == 'porcentaje')
                    <input type="text" class="form-control" readonly value="{{$nivel}} - Valor: {{($valor * 100)}} %">
                    @else
                    <input type="text" class="form-control" readonly value="{{$nivel}} - Valor: {{$valor}} $">
                    @endif
                    @endforeach
                    @endforeach
                </h5>
                @endif
            </div>
            <div class="col-xs-12">
                <div class="row" style="background:#fff">
                    @if ($settingComision->tipocomision == 'categoria')
                    @foreach ($settingComision->valordetallado as $primerarreglo)
                    <h5 class="col-xs-12">Información de la Categoria - {{$primerarreglo->nombre}}</h5>
                    @foreach ($primerarreglo->comisiones as $item)
                    <div class="col-xs-12 col-sm-4">
                        <label for="">Comision Rango: {{$item->nombre}}</label>
                        @if ($settingComision->tipopago == 'porcentaje')
                        <input type="text" class="form-control" readonly value="{{($item->comision * 100)}} %">
                        @else
                        <input type="text" class="form-control" readonly value="{{$item->comision}} $">
                        @endif
                    </div>
                    @endforeach
                    @endforeach
                    @elseif($settingComision->tipocomision == 'producto')
                    @foreach ($settingComision->valordetallado as $primerarreglo)
                    <h5 class="col-xs-12">Información del Producto - {{$primerarreglo->idproductos}}</h5>
                    @foreach ($primerarreglo->comisiones as $item)
                    <div class="col-xs-12 col-sm-4">
                        <label for="">Comision Nivel: {{$item->nivel}}</label>
                        @if ($settingComision->tipopago == 'porcentaje')
                        <input type="text" class="form-control" readonly value="{{($item->comision * 100)}} %">
                        @else
                        <input type="text" class="form-control" readonly value="{{$item->comision}} $">
                        @endif
                    </div>
                    @endforeach
                    @endforeach
                    @endif
                </div>
            </div>
            @endempty
        </div>
    </div>
    {{-- comisiones fin --}}
</div>
{{-- informacion fin --}}