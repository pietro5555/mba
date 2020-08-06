@push('style')
   <style>
    
    .redirigir{
        float: right;
    }
    
     .blanco{
        color:white;
    }
    
    </style>
@endpush

<div class="row">
    
    <div class="col-sm-4 col-xs-12">
        <div class="info-box bg-red">
           <span class="info-box-icon bg-red"><i class="fas fa-wallet blanco"></i></span>
            <div class="info-box-content">
                <span class="info-box-number float redirigir">
                    
                    @if ($moneda->mostrar_a_d)
                     {{$moneda->simbolo}} {{number_format(Auth::user()->billetera, 2 , "." , ",") . "\n"}}
                    @else
                    {{number_format(Auth::user()->billetera, 2 , "." , ",") . "\n"}}  {{$moneda->simbolo}}
                    @endif
                    </span>
                <br>
                <br>
                
                <span class="info-box-text float redirigir">Total Billetera</span>
            </div>
        </div>
    </div>
    
    
    <div class="col-sm-4 col-xs-12">
        <div class="info-box bg-blue">
           <span class="info-box-icon bg-blue"><i class="fas fa-money-bill blanco"></i></span>
            <div class="info-box-content">
                <span class="info-box-number float redirigir">
                    
                    @if ($moneda->mostrar_a_d)
                     {{$moneda->simbolo}} {{number_format($totalTransferido, 2 , "." , ",") . "\n"}}
                    @else
                    {{number_format($totalTransferido, 2 , "." , ",") . "\n"}}  {{$moneda->simbolo}}
                    @endif
                    </span>
                <br>
                <br>
                
                <span class="info-box-text float redirigir">Total Transferido</span>
            </div>
        </div>
    </div>
    
    
    <div class="col-sm-4 col-xs-12">
        <div class="info-box bg-green">
           <span class="info-box-icon bg-green"><i class="fas fa-hand-holding-usd blanco"></i></span>
            <div class="info-box-content">
                <span class="info-box-number float redirigir">
                    
                    
                    {{$cambio->valor_conversion}}
                   
                    </span>
                <br>
                <br>
                
                <span class="info-box-text float redirigir">Valor actual de la moneda</span>
            </div>
        </div>
    </div>
    
</div>    