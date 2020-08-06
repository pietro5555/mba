{{-- informacion genera--}}
<div class="col-xs-12 mostrar">
    {{-- comisiones  --}}
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">
                <h3>Informe de Comisiones </h3>
                <button class="btn btn-info btn-block mostrar hh" onclick="toggle()">Agregar Todas las Comisiones</button>
                
                  <button class="btn btn-info btn-block mostrar hh" data-toggle="modal" data-target="#agregar">Agregar Nota</button>
            </div>
        </div>
        <div class="box-body">
            @empty(!$ganancias)
            
             <div class="col-md-12">
                  <div class="alert alert-warning" role="alert">
                    <h5>{!! $ganancias->nota !!}</h5>
                      </div>
                   </div>  
            
            <div class="col-sm-12 col-xs-12">
                <h5>Comisiones por:</h5>
                <input type="text" class="form-control" readonly value="{{$ganancias->tipo}}">
            </div>
            
           
            <div class="col-sm-12 col-xs-12">
                <div class="row" style="background:#fff">
                    
                    @if($ganancias->tipo == 'producto')
                    @foreach ($ganancias->configuracion as $primerarreglo)
                    <h5 class="col-xs-12">Información de ganancias - {{$primerarreglo->idproductos}}</h5>
                    
                    <div class="col-xs-12 col-sm-12">
                        <label for="">Comisiones del Producto: {{$primerarreglo->idproductos}}</label>
                        
                        <input type="text" class="form-control" readonly value="{{$primerarreglo->ganancia}} ">
                    </div>
                   
                    @endforeach
                    @endif
                    
                    @if($ganancias->tipo == 'categoria')
                    @foreach ($ganancias->configuracion as $primerarreglo)
                    <h5 class="col-xs-12">Información de ganancias - categoria {{$primerarreglo->categoria}} 
                    
                    <input type="text" class="form-control" readonly value="{{$primerarreglo->categoria}} ">
                    </h5>
                    
                    <div class="col-xs-12 col-sm-12">
                        <label for="">Comisiones de la categoria: {{$primerarreglo->categoria}}</label>
                        
                        <input type="text" class="form-control" readonly value="{{$primerarreglo->ganancia}} ">
                    </div>
                   
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