@extends('layouts.dashboardnew')

@push('script')
	<script>
		$(document).ready( function () {
			$('#mytable').DataTable( {
				responsive: true,
			});
		});
	</script>
@endpush

@section('content')
	<div class="col-xs-12">
		@if (Session::has('msj-exitoso'))
			<div class="alert alert-success">
				<strong>{{ Session::get('msj-exitoso') }}</strong>
			</div>
		@endif

		@if (Session::has('msj-erroneo'))
			<div class="alert alert-danger">
				<strong>{{ Session::get('msj-erroneo') }}</strong>
			</div>
		@endif

		<div class="box">
			<div class="box-body">				
				<br class="col-xs-12">

				<table id="mytable" class="table">
					<thead>
						<tr>
                            <th class="text-center"># Orden</th>
                            <th class="text-center">Fecha</th>
							<th class="text-center">Cliente</th>
                            <th class="text-center">Membresía</th>
                            <th class="text-center">Monto</th>
                            <th class="text-center">Forma de Pago</th>
                            <th class="text-center">Id de Transacción</th>
						</tr>
					</thead>
					<tbody>
						@foreach($compras as $compra)
							<tr>
								<td class="text-center">{{ $compra->id }}</td>
								<td class="text-center">{{ date('d-m-Y', strtotime($compra->date)) }}</td>
                                <td class="text-center">{{ $compra->user->display_name }}</td>
                                <td class="text-center">{{ $compra->membership->name }}</td>
                                <td class="text-center">{{ $compra->amount }} USD</td>
                                <td class="text-center">{{ $compra->payment_method }}</td>
                                <td class="text-center">{{ $compra->payment_id }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection

