@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
		    
			<table id="mytable" class="table table-bordered table-striped" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">#</th>
						@if(Auth::user()->rol_id == 0)
						<th class="text-center">Usuario</th>
						@endif
						<th class="text-center">Comprador</th>
						<th class="text-center">Correo</th>
						<th class="text-center">Producto</th>
						<th class="text-center">Precio de la compra</th>
						<th class="text-center">Fecha</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($wallets as $wallet)
					
					<tr>
						<td class="text-center">{{ $wallet->id }}</td>
						@if(Auth::user()->rol_id == 0)
						<td class="text-center">{{ $wallet->usuario }}</td>
						@endif
						<td class="text-center">{{ $wallet->comprador }}</td>
						<td class="text-center">{{ $wallet->correo}}</td>
						<td class="text-center">{{ $wallet->producto}}</td>
						<td class="text-center">{{ $wallet->precio}}</td>
						<td class="text-center">{{ date('d-m-Y', strtotime($wallet->created_at)) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>


@endsection
@include('usuario.componentes.scritpTable')