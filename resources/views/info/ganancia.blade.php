@extends('layouts.dashboardnew')

@section('content')

@if(!empty($ganancias->nota))
<div class="col-md-12">
   <div class="alert alert-warning" role="alert">
    <h4>{!! $ganancias->nota !!}</h4>

    </div>
  </div>  
@endif

<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
			<table id="mytable" class="table table-bordered table-hover table-responsive">
				<thead>
					<tr class="color">
					   @if(!empty($ganancias))
					    @if($tipo == 'producto')
						<th class="center">Producto</th>
						<th class="center">Comisiones</th>
						@else
						<th class="center">Categoria</th>
						<th class="center">Comisiones</th>
						@endif
						@else
						<th class="center">Producto</th>
						<th class="center">Comisiones</th>
						@endif
					</tr>
				</thead>
				<tbody>
				    @if(!empty($ganancias))
				    @foreach ($ganancias->configuracion as $gana)
				    @if($tipo == 'producto')
					<tr>
						<td class="center">{{ $gana->idproducto }}</td>
						<td class="center">{{ $gana->ganancia }}</td>
					</tr>
					
					
					@elseif($tipo == 'categoria')
					
					<tr>
						<td class="center">{{ $gana->categoria }}</td>
						<td class="center">{{ $gana->ganancia }}</td>
					</tr>
					@endif
					@endforeach
					@endif

				</tbody>
			</table>
		</div>
	</div>
</div>

@endsection
@include('usuario.componentes.scripBotones')