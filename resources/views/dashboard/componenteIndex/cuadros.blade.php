@push('style')
   <style>
   .black{
     color:#58666e;  
   }
   </style>
@endpush

<!-- Info boxes -->
<div class="row">
    
    <!-- Anuncios -->
    @foreach($anuncios as $anuncio)
 <div class="col-md-12">
   <div class="alert alert-{!! $anuncio->color !!}" role="alert">
    <h4>{!! $anuncio->titulo !!}</h4>
    <h5>{!! $anuncio->contenido !!}</h5>
    </div>
  </div>  
  @endforeach
    <!-- Fin Anuncios -->
    
    {{-- cuadro de venta --}}
    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="{{route('networkorders')}}">
        <div class="info-box border-radius">
            <span class="info-box-icon bg-aqua border-radius"><i class="ion ion-bag"></i></span>
            <div class="info-box-content">
                <span class="info-box-text black">Ventas</span>
                <span class="info-box-number animated bounce black">{{$cantventas}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
       </a>
    </div>
    <!-- /.col -->
    {{-- cuadro de estado --}}
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box border-radius">
            <span class="info-box-icon border-radius {{(Auth::user()->status == 0) ? 'bg-red' : 'bg-green'}}">
                <i class="fa fa-fw fa-toggle-on"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text black">Estado:
                    @if (Auth::user()->status == '0')
                    <strong>Inactivo</strong>
                    @else
                    <strong>Activo</strong>
                    @endif</span>
                @if(Auth::user()->rol_id != 0)
                <span class="info-box-text black">Desde: {{$desde}}</span>
                <span class="info-box-text black">Hasta: {{Auth::user()->fecha_activacion}} </span>
                
                 <span class="info-box-text black">Rango: {{$nombreRol}}</span>
                @endif
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="{{route('wallet-index')}}">
        <div class="info-box border-radius">
            <span class="info-box-icon bg-green border-radius">
                <i class="fas fa-landmark"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text black">Comisiones</span>
                <span class="info-box-number animated bounce black">
                    @php
                    $wallet = number_format(Auth::user()->wallet_amount, 2 , "." , ",") . "\n";
                    @endphp
                    @if ($moneda->mostrar_a_d)
                    {{$moneda->simbolo}} {{$wallet}}
                    @else
                    {{$wallet}} {{$moneda->simbolo}}
                    @endif
                    </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        </a>
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="{{route('networkrecords')}}">
        <div class="info-box border-radius">
            <span class="info-box-icon bg-yellow border-radius">
                <i class="ion ion-ios-people-outline"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text black">Miembros en red</span>
                <span class="info-box-number animated bounce black">{{$cantAllUsers}}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        </a>
    </div>
    
    <div class="col-sm-6 col-xs-12">
    <div class="info-box border-radius">
        <div class="box-body" style="padding: 15px 20px; ">
            
            @foreach($redes as $red)
              @if($red->tipo == '1')
                <div class="col-sm-3 col-xs-3 centroc">
                    <a href="{{$red->link}}" target="_blank"
                    <i class="{{$red->imagen}} ampliar" style="color:#{{$red->color}};"></i>
                    </a>
                </div>
                @else
                <div class="col-sm-3 col-xs-3 centroc">
                    <a href="{{$red->link}}" target="_blank">
                    <img src="{{asset('redes/'.$red->imagen)}}" height="50" class="border-redes">
                     </a>
                </div>
                @endif
            @endforeach   
              
            </div>
        </div>
    </div>    
    
    @if($adicional == 1)
    <div class="col-sm-6 col-xs-12">
        <div class="info-box border-radius" style="min-height: 120px;">
            <div class="col-sm-12 col-xs-12">
                <h4>Valor de sus Comisiones en otras monedas</h4>
                
                 <span class="info-box-number animated bounce">
                    {{$moneda1}}
                    </span>
                
                <span class="info-box-number animated bounce">
                    {{$moneda2}}
                    </span>
                    
                <span class="info-box-number animated bounce">
                    {{$moneda3}}
                    </span>
                
                    
            </div>
        </div>
        </div>
    @endif
    
    
    @if (!empty($settingPuntos))
    <div class="col-sm-6 col-xs-12">
        <a href="{{route('puntos.mis_puntos')}}">
        <div class="info-box border-radius">
            <span class="info-box-icon bg-aqua border-radius">
                <i class="fas fa-check-circle"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text black">Puntos Personales</span>
                <small id="normal" class="info-box-number black">
                    {{Auth::user()->puntosPro}}
                </small>
            </div>
        </div>
        </a>
    </div>
    
    <div class="col-sm-6 col-xs-12">
        <a href="{{route('puntos.puntos')}}">
        <div class="info-box border-radius">
            <span class="info-box-icon bg-red border-radius">
                <i class="fas fa-check-double"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text black">Puntos Red</span>
                <small id="normal" class="info-box-number black">
                    {{Auth::user()->puntosRed}}
                </small>
            </div>
        </div>
        </a>
    </div>
    @endif
    
    
     @if(!empty($binario->pata))
    @if(Auth::user()->rol_id != 0)
     <div class="col-sm-6 col-xs-12">
         <a href="{{route('wallet-almacenados')}}">
        <div class="info-box border-radius">
            <span class="info-box-icon bg-red border-radius">
                <i class="fas fa-check-double"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text black">Puntos Izquierda</span>
                <small id="normal" class="info-box-number black">
                    {{Auth::user()->debiIzq}}
                </small>
            </div>
        </div>
        </a>
    </div>
    
    
     <div class="col-sm-6 col-xs-12">
         <a href="{{route('wallet-debitables')}}">
        <div class="info-box border-radius">
            <span class="info-box-icon bg-aqua border-radius">
                <i class="fas fa-check-circle"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text black">Puntos Derecha</span>
                <small id="normal" class="info-box-number black">
                    {{Auth::user()->debiDer}}
                </small>
            </div>
        </div>
        </a>
    </div>
    @endif
    @endif
    
    {{-- link Especial--}}
     @if(Auth::user()->rol_id == 0)
    <div class="col-sm-{{($settingCliente->cliente == 1) ? '6' : '12'}} col-xs-12">
        <div class="info-box border-radius" onclick="copyToClipboard('especial')">
            <span class="info-box-icon border-radius" style="background-color: #00c0ef !important;">
                <i class="far fa-clipboard" style="color:white;"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Link Especial</span>
                <small id="especial" class="info-box-number">
                    {{route('autenticacion.new-register')}}
                </small>
            </div>
        
        </div>
       
    </div>
    @elseif($adicional == 0)
    <div class="col-sm-12 col-xs-12">
        </div>
    @endif
    {{-- fin del link --}}
    
    
    @if(!empty($settingEstructura->tipoestructura))
    @if($settingEstructura->tipoestructura != 'binaria')
    {{-- link de referidos --}}
    {{-- referido normal --}}

    <div class="col-sm-{{($settingCliente->cliente == 1) ? '6' : '12'}} col-xs-12">
        <div class="info-box border-radius" onclick="copyToClipboard('usuario')">
            <span class="info-box-icon bg-black border-radius">
                <i class="fas fa-copy"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Link de Referido</span>
                <small id="usuario" class="info-box-number">
                    {{route('autenticacion.new-register').'?ref='.Auth::user()->ID}}
                </small>
            </div>
        </div>
    </div>

    {{-- referido cliente --}}
    @if ($settingCliente->cliente == 1)
       
        <div class="col-sm-6 col-xs-12">
            <div class="info-box border-radius" onclick="copyToClipboard('cliente')">
                <span class="info-box-icon bg-light border-radius">
                    <i class="far fa-copy"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Link de Referido Cliente</span>
                    <small id="cliente" class="info-box-number">
                        {{route('autenticacion.new-register').'?ref='.Auth::user()->ID.'&amp;tipouser=Cliente'}}
                    </small>
                </div>
            </div>
        </div>
        
    @endif
    
    @else
    
    <div class="col-sm-6 col-xs-12">
        <div class="info-box border-radius" onclick="copyToClipboard('izquierda')">
            <span class="info-box-icon bg-red border-radius">
                <i class="fas fa-copy"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Link de Referido Izquierda</span>
                <small id="izquierda" class="info-box-number">
                    {{route('autenticacion.new-register').'?ref='.Auth::user()->ID.'&amp;lado=I'}}
                </small>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 col-xs-12">
        <div class="info-box border-radius" onclick="copyToClipboard('derecha')">
            <span class="info-box-icon bg-blue border-radius">
                <i class="fas fa-copy"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Link de Referido Derecha</span>
                <small id="derecha" class="info-box-number">
                    {{route('autenticacion.new-register').'?ref='.Auth::user()->ID.'&amp;lado=D'}}
                </small>
            </div>
        </div>
    </div>
    @endif
    @endif
    
    
    {{-- linl de referidos fin --}}
</div>
<!-- /.row -->