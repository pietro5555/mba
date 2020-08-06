{{-- informacion genera--}}
<div class="col-xs-12 mostrar">
    {{-- comisiones  --}}
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">
                <h3>Asignar Iva</h3>
                <button class="btn btn-info btn-block mostrar hh" onclick="toggle()">Agregar Iva a todos</button>
                <button class="btn btn-info btn-block mostrar hh" id="modal">Editar o Agregar Individual</button>
                <button class="btn btn-danger btn-block mostrar hh" id="modal3">Eliminar</button>
            </div>
        </div>
        <div class="box-body">
            @empty(!$ivas)
            
            <div class="col-sm-12 col-xs-12">
                <h5>Se calcula por</h5>
                <input type="text" class="form-control" readonly value="{{$ivas->tipocalculo}}">
            </div>
            
             <div class="col-sm-12 col-xs-12">
                <h5>Tipo de Iva</h5>
                @if($tipo == 'categoria')
                <input type="text" class="form-control" readonly value="Categoria">
                @elseif($tipo == 'producto')
                <input type="text" class="form-control" readonly value="Productos">
                @endif
            </div>
           
            <div class="col-sm-12 col-xs-12">
                <div class="row" style="background:#fff">
                    
                    @foreach ($ivas->configuracion as $primerarreglo)
                    
                    <div class="col-xs-12 col-sm-12">
                     @if($tipo == 'categoria')
                        <label for="">Iva de la Categoria: {{$primerarreglo->productos}}</label>
                    @else
                    <label for="">Iva del producto: {{$primerarreglo->productos}}</label>
                    @endif
                    
                        @if ($ivas->porcentaje == 'porcentaje')
                        <input type="text" class="form-control" readonly value="{{($primerarreglo->iva * 100)}} %">
                        @else
                        <input type="text" class="form-control" readonly value="{{$primerarreglo->iva}} ">
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