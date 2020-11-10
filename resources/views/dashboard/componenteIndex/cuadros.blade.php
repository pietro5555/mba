@push('style')
   <style>

    .info-box-contenido{
        padding: 5px 10px;
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


    <div class="col-sm-3 col-xs-12">
        <div class="info-box" style="background: #dc3545; border-radius: 20px;">
            <span class="info-box-icones">
               <i class="ion ion-bag white"></i>
               </span>
            <div class="info-box-contenido white">
                <span class="info-box-text">
                <div class="col-md-12">
                    <p style="font-weight: bold;">Ventas</p>
                </div>
                <div style="margin-top: 50px;">
                 <div class="col-md-6">
                   <p align="left" style="font-size: 16px;"> {{$cantventas}} </p>
                 </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-sm-3 col-xs-12">
        <div class="info-box" style="background: #007bff; border-radius: 20px;">
            <span class="info-box-icones">
               <i class="fa fa-fw fa-toggle-on white"></i>
               </span>
            <div class="info-box-contenido white">
                <span class="info-box-text">
                <div class="col-md-12">
                    <p style="font-weight: bold;">Estado</p>
                </div>
                <div style="margin-top: 50px;">
                 <div class="col-md-6">

                    @if (Auth::user()->status == '0')
                    <p align="left" style="font-size: 14px;"><strong>Inactivo</strong></p>
                    @else
                    <p align="left" style="font-size: 14px;"><strong>Activo</strong></p>
                    @endif

                 </div>
                </div>
            </div>
        </div>
    </div>


        <div class="col-sm-3 col-xs-12">
        <div class="info-box" style="background: #28a745; border-radius: 20px;">
            <span class="info-box-icones">
               <i class="fas fa-coins white"></i>
               </span>
            <div class="info-box-contenido white">
                <span class="info-box-text">
                <div class="col-md-12">
                    <p style="font-weight: bold;">Comisiones</p>
                </div>
                <div style="margin-top: 50px;">
                 <div class="col-md-6">
                   <p align="left" style="font-size: 16px;"> {{number_format(Auth::user()->wallet_amount, 2 , "." , ",") . "\n"}} </p>
                 </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-sm-3 col-xs-12">
        <div class="info-box" style="background: #6f42c1; border-radius: 20px;">
            <span class="info-box-icones">
               <i class="fas fa-users white"></i>
               </span>
            <div class="info-box-contenido white">
                <span class="info-box-text">
                <div class="col-md-12">
                    <p style="font-weight: bold;">Miembros en Red</p>
                </div>
                <div style="margin-top: 50px;">
                 <div class="col-md-6">
                   <p align="left" style="font-size: 16px;"> {{$cantAllUsers}} </p>
                 </div>
                </div>
            </div>
        </div>
    </div>


    @if($adicional == 1)
<div class="col-sm-6 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
    @foreach($redes as $red)
      @if($red->tipo == '1')
      <div class="col-sm-6 col-xs-12">
        <div style="display:none;">
          <small id="{{$red->nombre}}">{{$red->link}}</small>
        </div>

        <div class="info-box border-radius">
          <div class="box-body" style="padding: 15px 20px;">
             <div class="col-md-3 col-xs-3 col-md-offset-1 col-xs-offset-1">
              <i class="{{$red->imagen}} ampliar" style="color:#{{$red->color}};"></i>
              </div>
              <div class="col-md-7 col-xs-7">
                <div class="card-body">
                  <h4 class="card-title white">{{$red->nombre}}</h4>
                </div>
              </div>
              <h6 class="white" align="right" style="font-size: 9px;"><a class="btn white" href="{{$red->link}}" target="_blank"><i class="white fas fa-share-alt"> Compartir Link</i></a> </h6>
           </div>
         </div>
      </div>
    @else

    <div class="col-sm-6 col-xs-12">
        <div class="col-sm-6 col-xs-12">
         <div style="display:none;">
          <small id="{{$red->nombre}}">{{$red->link}}</small>
         </div>
        <div class="info-box border-radius">
          <div class="box-body" style="padding: 15px 20px;">
                <div class="col-md-3 col-xs-3 col-md-offset-1 col-xs-offset-1">
            <img src="{{asset('redes/'.$red->imagen)}}" height="50" class="border-redes">
                </div>
               <div class="col-md-7 col-xs-7">
                 <div class="card-body">
                <h4 class="card-title white">{{$red->nombre}}</h4>
            </div>
          </div>

          <h6 class="white" align="right" style="font-size: 9px;"><a class="btn white" href="{{$red->link}}" target="_blank"><i class="white fas fa-share-alt"> Compartir Link</i></a> </h6>
        </div>
       </div>
      </div>

      @endif
    @endforeach
    </div>

    <div class="col-sm-6 col-xs-12">
        <div class="info-box border-radius" style="min-height: 210px;">
            <div class="col-sm-12 col-xs-12">
                <h4 class="white">Valor de sus Comisiones en otras monedas</h4>
                 <br>

                 <span class="info-box-number animated bounce white">
                    {{$moneda1}}
                    </span>
                    <br>

                <span class="info-box-number animated bounce white">
                    {{$moneda2}}
                    </span>
                    <br>
                <span class="info-box-number animated bounce white">
                    {{$moneda3}}
                    </span>
            </div>
        </div>
    </div>
    @else


<div class="col-sm-12 col-xs-12" style="padding-right: 0px; padding-left: 0px;">
     @foreach($redes as $red)
      @if($red->tipo == '1')
        <div class="col-sm-3 col-xs-12">
        <div style="display:none;">
          <small id="{{$red->nombre}}">{{$red->link}}</small>
        </div>
        <div class="info-box border-radius">
          <div class="box-body" style="padding: 15px 20px;">
                <div class="col-md-3 col-xs-3 col-md-offset-2 col-xs-offset-2">
             <i class="{{$red->imagen}} ampliar" style="color:#{{$red->color}};"></i>
                </div>
               <div class="col-md-7 col-xs-7">
                 <div class="card-body">
                <h4 class="card-title white">{{$red->nombre}}</h4>
            </div>
          </div>
          <h6 class="white" align="right" style="font-size: 9px;"><a class="btn white" href="{{$red->link}}" target="_blank"><i class="white fas fa-share-alt"> Compartir Link</i></a> </h6>
        </div>
       </div>
      </div>
    @else


        <div class="col-sm-3 col-xs-12">
         <div style="display:none;">
          <small id="{{$red->nombre}}">{{$red->link}}</small>
         </div>
        <div class="info-box border-radius">
          <div class="box-body" style="padding: 15px 20px;">
                <div class="col-md-3 col-xs-3 col-md-offset-1 col-xs-offset-1">
            <img src="{{asset('redes/'.$red->imagen)}}" height="50" class="border-redes">
                </div>
               <div class="col-md-7 col-xs-7">
                 <div class="card-body">
                <h4 class="card-title white">{{$red->nombre}}</h4>
            </div>
          </div>
          <h6 class="white" align="right" style="font-size: 9px;"><a class="btn white" href="{{$red->link}}" target="_blank"><i class="white fas fa-share-alt"> Compartir Link</i></a> </h6>
        </div>
       </div>
      </div>

      @endif
    @endforeach
    </div>
    @endif


@if (!empty($settingPuntos))
    <div class="col-sm-6 col-xs-12">
        <div class="info-box border-radius">
            <div class="box-body" style="padding: 15px 20px;">
                <div class="col-md-10 col-xs-10 white" style="font-size: 22px; margin-top: 15px;">
                    <i class="far fa-user" style="color:#00a65a; margin-right: 20px;"></i>
                    Puntos Personales
                </div>

                <div class="col-md-2 col-xs-2" align="right" style="font-size: 22px; margin-top: 15px; color:#00a65a; font-weight: lighter;">
                   {{Auth::user()->debiIzq}}
                </div>
            </div>
        </div>
    </div>


    <div class="col-sm-6 col-xs-12">
        <div class="info-box border-radius">
            <div class="box-body" style="padding: 15px 20px;">
                <div class="col-md-10 col-xs-10 white" style="font-size: 22px; margin-top: 15px;">
                    <i class="fas fa-user-friends" style="color:#6f42c1; margin-right: 20px;"></i>
                    Puntos Red
                </div>

                <div class="col-md-2 col-xs-2" align="right" style="font-size: 22px; margin-top: 15px; color:#6f42c1; font-weight: lighter;">
                   {{Auth::user()->puntosRed}}
                </div>
            </div>
        </div>
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

     <div class="col-sm-12 col-xs-12">
        <div class="info-box border-radius" onclick="copyToClipboard('especial')">
            <div class="box-body" style="padding: 15px 20px;">
                <div class="col-md-3 col-xs-12 white" style="font-size: 22px; margin-top: 15px;">
                    <i class="fas fa-link" style="color:#007bff; margin-right: 20px;"></i>
                    Link Especial
                </div>

                <div class="col-md-9 col-xs-12 white" style="font-size: 22px; margin-top: 15px; color:#007bff;">
                    {{route('autenticacion.new-register')}}

                    <i class="far fa-copy" style="margin-right: 20px;"></i>

                    <small id="especial" style="display: none;">
                    {{route('autenticacion.new-register')}}
                    </small>
                </div>
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

    <div class="col-sm-12 col-xs-12">
        <div class="info-box border-radius" onclick="copyToClipboard('usuario')">
            <div class="box-body" style="padding: 15px 20px;">
                <div class="col-md-3 col-xs-12 white" style="font-size: 22px; margin-top: 15px;">
                    <i class="fas fa-link" style="color:#dc3545; margin-right: 20px;"></i>
                    Link de Referido
                </div>

                <div class="col-md-9 col-xs-12 white" style="font-size: 22px; margin-top: 15px; color:#dc3545;">
                    {{route('autenticacion.new-register').'?ref='.Auth::user()->ID}}

                    <i class="far fa-copy" style="margin-right: 20px;"></i>

                    <small id="usuario" style="display: none;">
                    {{route('autenticacion.new-register').'?ref='.Auth::user()->ID}}
                    </small>
                </div>
            </div>
        </div>
    </div>


    {{--<div class="col-sm-12 col-xs-12">
        <div class="info-box border-radius" onclick="copyToClipboard('shoping')">
            <div class="box-body" style="padding: 15px 20px;">
                <div class="col-md-3 col-xs-12 white" style="font-size: 22px; margin-top: 15px;">
                    <i class="fas fa-link" style="color:#28a745; margin-right: 20px;"></i>
                    Link de Compra
                </div>

                <div class="col-md-9 col-xs-12 white" style="font-size: 22px; margin-top: 15px; color:#28a745;">
                    {{route('shopping-cart.membership').'?ref='.Auth::user()->ID}}

                    <i class="far fa-copy" style="margin-right: 20px;"></i>

                    <small id="shoping" style="display: none;">
                    {{route('shopping-cart.membership').'?ref='.Auth::user()->ID}}
                    </small>
                </div>
            </div>
        </div>
    </div>--}}

    {{-- referido cliente --}}
    @if ($settingCliente->cliente == 1)

    <div class="col-sm-12 col-xs-12">
        <div class="info-box border-radius" onclick="copyToClipboard('cliente')">
            <div class="box-body" style="padding: 15px 20px;">
                <div class="col-md-3 col-xs-12 white" style="font-size: 22px; margin-top: 15px;">
                    <i class="fas fa-link" style="color:#28a745; margin-right: 20px;"></i>
                    Link de Referido Cliente
                </div>

                <div class="col-md-9 col-xs-12 white" style="font-size: 22px; margin-top: 15px; color:#28a745;">
                    {{route('autenticacion.new-register').'?ref='.Auth::user()->ID.'&amp;tipouser=Cliente'}}

                    <i class="far fa-copy" style="margin-right: 20px;"></i>

                    <small id="cliente" style="display: none;">
                    {{route('autenticacion.new-register').'?ref='.Auth::user()->ID.'&amp;tipouser=Cliente'}}
                    </small>
                </div>
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
