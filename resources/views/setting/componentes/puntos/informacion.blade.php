{{-- informacion genera--}}
<div class="col-xs-12 mostrar">
    {{-- comisiones  --}}
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">
                <h3>Productos y sus puntos </h3>
                <button class="btn btn-info btn-block mostrar hh" onclick="toggle()">Agregar Todos los puntos</button>
                <button class="btn btn-info btn-block mostrar hh" id="modal">Editar o Agregar Individual</button>
                <button class="btn btn-danger btn-block mostrar hh" id="modal3">Eliminar Producto</button>
            </div>
        </div>
        <div class="box-body">
            @empty(!$settingPuntos)
            
            <div class="col-sm-12 col-xs-12">
                <h5>Se calcula por</h5>
                <input type="text" class="form-control" readonly value="{{$settingPuntos->valor}}">
            </div>
            
             <div class="col-sm-12 col-xs-12">
                <h5>Forma de ganar puntos</h5>
                @if($tipopuntos == 'propias')
                <input type="text" class="form-control" readonly value="Puntos por Compras Propias">
                @elseif($tipopuntos == 'comision')
                <input type="text" class="form-control" readonly value="Puntos por Comisiones">
                @elseif($tipopuntos == 'ambas')
                <input type="text" class="form-control" readonly value="Puntos por Comisiones y por Compras Propias">
                @endif
            </div>
           
            <div class="col-sm-12 col-xs-12">
                <div class="row" style="background:#fff">
                    
                    @foreach ($settingPuntos->configuracion as $primerarreglo)
                    <h5 class="col-xs-12">Información del Producto - {{$primerarreglo->idproductos}}</h5>
                    
                    <div class="col-xs-12 col-sm-12">
                        <label for="">Puntos del Producto: {{$primerarreglo->idproductos}}</label>
                        @if ($settingPuntos->valor == 'porcentaje')
                        <input type="text" class="form-control" readonly value="{{($primerarreglo->puntos * 100)}} %">
                        @else
                        <input type="text" class="form-control" readonly value="{{$primerarreglo->puntos}} ">
                        @endif
                    </div>
                   
                    @endforeach
                    
                </div>
            </div>
            @endempty
        </div>
    </div>
    {{-- comisiones fin --}}
</div>
{{-- informacion fin --}}