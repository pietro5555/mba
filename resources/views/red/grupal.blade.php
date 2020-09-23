@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box box-info" style="border-radius: 10px;">
    <div class="box-body">

      <h4 class="box-title white">
              <span class="info-box-icon-fecha-blue">
               <i class="fas fa-calendar-week white"></i>
               </span>
              <p style="padding: 10px 50px;"> Filtrar Por fechas</p>
          </h4>

          <form method="POST" action="{{route('todofecha')}}">
                {{ csrf_field() }}
               
                <div class="form-group col-xs-6 col-md-3">
                    <label class="control-label" style="color:white">Desde</label>
                    <input class="form-control" type="date" name="fecha1" required>
                </div>
                <div class="form-group col-xs-6 col-md-3">
                    <label class="control-label" style="color:white">Hasta</label>
                    <input class="form-control" type="date" name="fecha2" required>
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
    <div class="box box-info" style="background-color: #007bff; border-radius: 10px;">

      <div class="box-body">
          <h4 class="box-title white">
              <span class="info-box-icon-users" style="background-color: #007bff;">
               <i class="fas fa-sliders-h white"></i>
               </span>
              <p style="padding: 10px 50px;"> Filtrar por usuario</p>
          </h4>

            <form method="POST" action="{{route('filtrouser')}}" class="form-inline">
                {{ csrf_field() }}
                
                <div class="col-xs-12 col-md-4">
                    <label class="control-label" style="color: white;">Usuario</label>
                    <select class="form-control chosen" name="usuario" required>
                      <option value="" selected disabled>Seleccion una opcion</option>
                        @foreach($TodosUsuarios as $rango)
                        <option value="{{$rango['nombre']}}">{{$rango['nombre']}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group has-feedback date col-xs-12 col-md-2">
                    <button class="btn btn-success" type="submit" style="margin-top: 20px;">
                        buscar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- Registros de red --}}
<div class="col-xs-12">
    <h3 class="box-title white" style="margin-top: -5px; margin-bottom: 20px; padding: 15px 20px;border-radius: 20px; background-color: #6f42c1; color: white;">Lista de Totales</h3>
</div>

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-body">
      <table id="mytable" class="table">
        <thead>
          <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Correo</th>
            <th class="text-center">Nivel</th>
            <th class="text-center">Directos</th>
            <th class="text-center">Red</th>
            <th class="text-center">Total</th>
            <th class="text-center">Total Mes Actual</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($compras as $compra)
          <tr>
          <td class="text-center">
            {{$compra['ID']}}
          </td>
          <td class="text-center">
            {{$compra['nombre']}}
          </td>
          <td class="text-center">
            {{$compra['email']}}
          </td>
          <td class="text-center">
            {{$compra['nivel']}}
          </td>
          
          <td class="text-center">
            {{$compra['directos']}}
          </td>
          
          <td class="text-center">
            {{$compra['red']}}
          </td>
          
          <td class="text-center">
             @if ($moneda->mostrar_a_d)
                {{$moneda->simbolo}} {{$compra['total']}}
             @else
                {{$compra['total']}} {{$moneda->simbolo}}
             @endif
          </td>
          
          <td class="text-center">
             @if ($moneda->mostrar_a_d)
                {{$moneda->simbolo}} {{$compra['totalmes']}}
             @else
                {{$compra['totalmes']}} {{$moneda->simbolo}}
             @endif
          </td>
          
          </tr>
          @endforeach
        </tbody>
      </table>
      

      <div class="col-md-2" style="background-color: #28a745; color: white;padding: 5px 10px;border-radius: 20px; text-align: center">
        Total Grupal: {{$grupo}}
      </div>

      <div class="col-md-2" style="background-color: #007bff; color: white;padding: 5px 10px;border-radius: 20px; text-align: center">
        Total Mes Actual: {{$grupoMes}}
      </div>
      
    </div>
  </div>
</div>


<div class="col-xs-12">
    <h3 class="box-title white" style="margin-top: -5px; margin-bottom: 20px; padding: 15px 20px;border-radius: 20px; background-color: #28a745; color: white;">Lista de Ordenes</h3>
</div>

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-body">
      <table id="mytable2" class="table">
        <thead>
          <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Nivel</th>
            <th class="text-center">Directos</th>
            <th class="text-center">Red</th>
            <th class="text-center">Compras</th>
            <th class="text-center">Total</th>
            <th class="text-center">Total Mes Actual</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($compras as $compra)
          <tr>
          <td class="text-center">
            {{$compra['ID']}}
          </td>
          <td class="text-center">
            {{$compra['nombre']}}
          </td>
          
          <td class="text-center">
            {{$compra['nivel']}}
          </td>
          
          
          <td class="text-center">
            {{$compra['directos']}}
          </td>
          
          <td class="text-center">
            {{$compra['red']}}
          </td>
          
          
          <td class="text-center">
            {{$compra['concatenar']}}
          </td>
          
          <td class="text-center">
             @if ($moneda->mostrar_a_d)
                {{$moneda->simbolo}} {{$compra['total']}}
             @else
                {{$compra['total']}} {{$moneda->simbolo}}
             @endif
          </td>
          
          <td class="text-center">
             @if ($moneda->mostrar_a_d)
                {{$moneda->simbolo}} {{$compra['totalmes']}}
             @else
                {{$compra['totalmes']}} {{$moneda->simbolo}}
             @endif
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
     <div class="col-md-2" style="background-color: #28a745; color: white;padding: 5px 10px;border-radius: 20px; text-align: center">
        Total Grupal: {{$grupo}}
      </div>

      <div class="col-md-2" style="background-color: #007bff; color: white;padding: 5px 10px;border-radius: 20px; text-align: center">
        Total Mes Actual: {{$grupoMes}}
      </div>
      
    </div>
  </div>
</div>


<div class="col-xs-12">
    <h3 class="box-title white" style="margin-top: -5px; margin-bottom: 20px; padding: 15px 20px;border-radius: 20px; background-color: #dc3545; color: white;">Equipo</h3>
</div>


<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-body">
      <table id="mytable3" class="table">
        <thead>
          <tr>
            <th class="text-center">ID</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Tipo</th>
            <th class="text-center">Nivel</th>
            <th class="text-center">Directos</th>
            <th class="text-center">Red</th>
            <th class="text-center">Fecha Registro</th>
            <th class="text-center">Patrocinador</th>
            <th class="text-center">Total</th>
            <th class="text-center">Total Mes Actual</th>
          </tr>
        </thead>
        <tbody>
            @php
            $grup=0;
            $grupMes=0;
            @endphp
          @foreach ($equipo as $compra)
          @php
          $grup+= $compra['total'];
          $grupMes+= $compra['totalmes'];
          @endphp
          <tr>
          <td class="text-center">
            {{$compra['ID']}}
          </td>
          <td class="text-center">
            {{$compra['nombre']}}
          </td>
          
          <td class="text-center">
           @if($compra['nivel'] == 1)
           Directo
           @else
           Indirecto
           @endif
          </td>
          
          <td class="text-center">
            {{$compra['nivel']}}
          </td>
          
          <td class="text-center">
            {{$compra['directos']}}
          </td>
          
          <td class="text-center">
            {{$compra['red']}}
          </td>
          
          <td class="text-center">
            {{$compra['fecha']}}
          </td>
          
          <td class="text-center">
            {{$compra['patrocinador']}}
          </td>
          
          
          <td class="text-center">
             @if ($moneda->mostrar_a_d)
                {{$moneda->simbolo}} {{$compra['total']}}
             @else
                {{$compra['total']}} {{$moneda->simbolo}}
             @endif
          </td>
          
          <td class="text-center">
             @if ($moneda->mostrar_a_d)
                {{$moneda->simbolo}} {{$compra['totalmes']}}
             @else
                {{$compra['totalmes']}} {{$moneda->simbolo}}
             @endif
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      
      <div class="col-md-2" style="background-color: #28a745; color: white;padding: 5px 10px;border-radius: 20px; text-align: center">
        Total Grupal: {{$grupo}}
      </div>

      <div class="col-md-2" style="background-color: #007bff; color: white;padding: 5px 10px;border-radius: 20px; text-align: center">
        Total Mes Actual: {{$grupoMes}}
      </div>
      
    </div>
  </div>
</div>


@endsection

{{-- script que activa el datatable --}}
@include('usuario.componentes.scritpTable')

@push('script')
<script type="text/javascript">
    $(document).ready(function(){
 $(".chosen").chosen({width: "100%"});
 });
</script>
@endpush