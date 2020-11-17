@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box box-info" style="background-color: #007bff; border-radius: 10px;">
    <div class="box-body">

      <h4 class="box-title white">
              <span class="info-box-icon-fecha-white">
               <i class="fas fa-calendar-week"></i>
               </span>
              <p style="padding: 10px 50px;"> Filtrar Por fechas</p>
          </h4>

         @if(Auth::user()->rol_id == 0)
          <form method="POST" action="{{ route('wallet-filtro-user') }}">
                {{ csrf_field() }}
               
              <div class="col-md-12">
                <div class="form-group col-xs-12 col-md-3">
                    <label class="control-label" style="color:white">ID del Usuario</label>
                    <input class="form-control" type="text" autocomplete="off"
                        name="user" required />
                </div>
                
                
                <div class="form-group col-xs-12 col-md-2" style="margin-top:20px;">
                    <button class="btn btn-success" type="submit">
                        buscar
                    </button>
                </div>
               </div>
            </form>
            @endif

            <form method="POST" action="{{ route('wallet-filtro') }}">
                {{ csrf_field() }}
                
               <div class="col-md-12"> 
                <div class="form-group col-xs-12 col-md-3">
                    <label class="control-label" style="color:white">Desde</label>
                    <input class="form-control" type="date" name="fecha1" required>
                </div>
                <div class="form-group date col-xs-12 col-md-3">
                    <label class="control-label" style="color:white">Hasta</label>
                    <input class="form-control" type="date" name="fecha2" required>
                </div>
                <div class="form-group col-xs-12 col-md-4" style="margin-top: 20px;">
                    <button class="btn btn-success" type="submit">
                        buscar
                    </button>
                </div>
               </div> 
            </form>
            
        </div>
    </div>
</div>

<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
            
            @if(Auth::user()->rol_id == 0)
            <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#liquidacion"> Liquidacion</a>
            @endif

            <table id="mytable" class="table">
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
                            Descripci贸n
                        </th>
                        @if(Auth::user()->rol_id != 0)
                        <th class="text-center">
                            Descuento
                        </th>
                        @endif
                        <th class="text-center">
                            Ingreso
                        </th>
                        @if(Auth::user()->rol_id != 0)
                        <th class="text-center">
                            Retiro
                        </th>
                        @endif
                        <th class="text-center">
                            Balance
                        </th>
                        @if($adicional == '1')
                        <th class="text-center">
                            Valor en otras monedas
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
                        @if(Auth::user()->rol_id != 0)
                        <td class="text-center">
                            @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{$wallet->descuento}}
                            @else
                            {{$wallet->descuento}} {{$moneda->simbolo}}
                            @endif
                        </td>
                        @endif
                        <td class="text-center">
                            @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{$wallet->debito}}
                            @else
                            {{$wallet->debito}} {{$moneda->simbolo}}
                            @endif
                        </td>
                        @if(Auth::user()->rol_id != 0)
                        <td class="text-center">
                            @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{$wallet->credito}}
                            @else
                            {{$wallet->credito}} {{$moneda->simbolo}}
                            @endif
                        </td>
                        @endif
                        <td class="text-center" style="color:#28a745;">
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
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="col-md-2" style="background-color: #28a745; color: white; padding: 5px 10px;border-radius: 20px; text-align: center">
             Total: 
             @if ($moneda->mostrar_a_d)
                {{$moneda->simbolo}} {{$total}}
             @else
                {{$total}} {{$moneda->simbolo}}
            @endif
            </div>
        </div>
    </div>
</div>

{{-- Comisiones a pagar--}}
{{--@if(Auth::user()->rol_id == 0)
<div class="col-xs-12">
    <div class="box-body white">
       <h3>Comisiones a Pagar</h3>
    </div>
</div>


<div class="col-xs-12">
    <div class="box box-info" style="background-color: #5743a7; border-radius: 10px;">
        <div class="box-body">

            <h4 class="box-title white">
              <span class="info-box-icon-fecha-blue">
               <i class="fas fa-calendar-week white"></i>
               </span>
                <p style="padding: 10px 50px;"> Filtrar Por fechas</p>
            </h4>

            <form method="POST" action="{{ route('wallet-comisiones-pagar-filtro') }}">
                {{ csrf_field() }}
               
                <div class="form-group col-xs-6 col-md-3">
                    <label class="control-label" style="color:white">Desde</label>
                    <input class="form-control" type="date" name="fecha3" required>
                </div>
                <div class="form-group col-xs-6 col-md-3">
                    <label class="control-label" style="color:white">Hasta</label>
                    <input class="form-control" type="date" name="fecha4" required>
                </div>
                <div class="col-xs-12 col-md-2" style="margin-top: 23px;">
                    <button class="btn btn-success" type="submit">
                        buscar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
            <table id="mytable2" class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Usuario</th>
                        <th class="text-center">Nivel</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($datos as $wallet)
                    <tr>
                        <td class="text-center">{{ $wallet['ID'] }}</td>
                        <td class="text-center">{{ $wallet['usuario'] }}</td>
                        <td class="text-center">{{ $wallet['nivel'] }}</td>
                        <td class="text-center">
                            @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{ $wallet['total'] }}
                            @else
                            {{ $wallet['total'] }} {{$moneda->simbolo}}
                            @endif  
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="col-md-2" style="background-color: #28a745; color: white; padding: 5px 10px;border-radius: 20px; text-align: center">
             Total: 
             @if ($moneda->mostrar_a_d)
              {{$moneda->simbolo}} {{$totalcompleto}}
             @else
              {{$totalcompleto}} {{$moneda->simbolo}}
             @endif
            </div>

        </div>
    </div>
</div>
@endif--}}


{{-- Recarga Billetera--}}

{{--<div class="col-xs-12">
    <div class="box-body white">
       <h3>Recargar Billetera</h3>
    </div>
</div>


<div class="col-xs-12">
    <div class="box box-info" style="background-color: #28a745; border-radius: 10px;">
        <div class="box-body">

            <h4 class="box-title white">
              <span class="info-box-icon-fecha-blue">
               <i class="fas fa-calendar-week white"></i>
               </span>
                <p style="padding: 10px 50px;"> Filtrar Por fechas</p>
            </h4>

            <form method="POST" action="{{ route('wallet-filtro-user') }}">
                {{ csrf_field() }}
               
                <div class="form-group col-xs-6 col-md-3">
                    <label class="control-label" style="color:white">Desde</label>
                    <input class="form-control" type="date" name="fecha3" required>
                </div>
                <div class="form-group col-xs-6 col-md-3">
                    <label class="control-label" style="color:white">Hasta</label>
                    <input class="form-control" type="date" name="fecha4" required>
                </div>
                <div class="col-xs-12 col-md-2" style="margin-top: 23px;">
                    <button class="btn btn-success" type="submit">
                        buscar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
            <table id="mytable3" class="table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        @if(Auth::user()->rol_id == 0)
                        <th class="text-center">Usuario</th>
                        @endif
                        <th class="text-center">Billetera</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($recargas as $recarga)
                    <tr>
                        <td class="text-center">{{ $recarga->id }}</td>
                        @if(Auth::user()->rol_id == 0)
                        <td class="text-center">{{ $recarga->display_name }}</td>
                        @endif
                        <td class="text-center">{{ $recarga->wallet_amount }}</td>
                        <td class="text-center">{{ date('d-m-Y', strtotime($recarga->created_at)) }}</td>
                        <td class="text-center">
                            @if ($moneda->mostrar_a_d)
                              {{$moneda->simbolo}} {{$totalrecarga}}
                            @else
                             {{$totalrecarga}} {{$moneda->simbolo}}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="col-md-2" style="background-color: #28a745; color: white; padding: 5px 10px;border-radius: 20px; text-align: center">
             Total: 
             @if ($moneda->mostrar_a_d)
              {{$moneda->simbolo}} {{$totalrecarga}}
             @else
              {{$totalrecarga}} {{$moneda->simbolo}}
             @endif
            </div>

        </div>
    </div>
</div>--}}


@include('pagos.componentes.liquidacion')

@endsection

@include('usuario.componentes.scripBotones')