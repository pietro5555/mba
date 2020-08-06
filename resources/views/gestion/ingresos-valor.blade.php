@extends('layouts.dashboardnew')

@section('content')

@push('style')
<style>
		
	@media only screen and (min-width: 992px) {
	    .ajustar{
	        width: 14%;
	    }
	    .aumentar{
	        width: 16.66666667%;
	    }
	}
	</style>
@endpush
<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
			<table id="mytable" class="table table-bordered table-hover table-responsive">
				<thead>
					<tr class="color">
						<th class="center">#</th>
						<th class="center">N° de compra</th>
						<th class="center">Fecha</th>
						<th class="center">Concepto</th>
						<th class="center">Total</th>
						<th class="center">Correo del referido</th>
						<th class="center">Nivel</th>
						<th class="center">Estado</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($comision as $comi)

					@php
					$faltante = DB::table($settings->prefijo_wp.'users')
					->where('ID', '=', $comi->user_id)
					->get();
					@endphp

					<tr>
						<td class="center">{{ $comi->id }}</td>
						<td class="center">{{ $comi->compra_id }}</td>
						<td class="center">{{ $comi->date }}</td>
						<td class="center">{{ $comi->concepto }}</td>
						<td class="center">{{ $comi->total }}</td>
						<td class="center">{{ $comi->referred_email }}</td>
						<td class="center">{{ $comi->referred_level }}</td>
						<td class="center">
							@if ($comi->status == 1)
							Aprobado
							@elseif ($comi->status == 0)
							En Espera
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="col-xs-12">
<div class="col-md-2 {{($settingCliente->cliente == 1) ? 'ajustar' : 'aumentar'}}">
						<a href="{{ route('gestion.verusuario', Crypt::encrypt($yo)) }}">
							<div class="panel-group">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<center><i class="far fa-address-book" style="font-size: 23px;"></i></center>
									</div>
									<div class="panel-footer">
										<center>Perfil</center>
									</div>
								</div>
							</div>
					</div>

					<div class="col-sm-2 {{($settingCliente->cliente == 1) ? 'ajustar' : 'aumentar'}}">
						<a href="{{ route('gestion.ingresos', Crypt::encrypt($yo)) }}">
							<div class="panel-group">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<center><i class="fas fa-money-bill-alt" style="font-size: 23px;"></i></center>
									</div>
									<div class="panel-footer">
										<center>Ingresos</center>
									</div>
								</div>
							</div>
					</div>
					<div class="col-sm-2 {{($settingCliente->cliente == 1) ? 'ajustar' : 'aumentar'}}">
						<a href="{{ route('gestion.referidos', Crypt::encrypt($yo)) }}">
							<div class="panel-group">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<center><i class="far fa-user-circle" style="font-size: 23px;"></i></center>
									</div>
									<div class="panel-footer">
										<center>Referidos</center>
									</div>
								</div>
							</div>
					</div>

					<div class="col-sm-2 {{($settingCliente->cliente == 1) ? 'ajustar' : 'aumentar'}}">
						<a href="{{ route('gestion.wallet', Crypt::encrypt($yo)) }}">
							<div class="panel-group">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<center><i class="fas fa-wallet" style="font-size: 23px;"></i></center>
									</div>
									<div class="panel-footer">
										<center>Monedero</center>
									</div>
								</div>
							</div>
					</div>

					<div class="col-sm-2 {{($settingCliente->cliente == 1) ? 'ajustar' : 'aumentar'}}">
						<a href="{{ route('gestion.pago', Crypt::encrypt($yo)) }}">
							<div class="panel-group">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<center><i class="fas fa-money-check" style="font-size: 23px;"></i></center>
									</div>
									<div class="panel-footer">
										<center>Liberados</center>
									</div>
								</div>
							</div>
				        </div>
				        
				        
				        <div class="col-sm-2 {{($settingCliente->cliente == 1) ? 'ajustar' : 'aumentar'}}">
						<a href="{{ route('genealogia', ['id' => $yo, 'tipo' => 'Normal']) }}">
							<div class="panel-group">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<center><i class="fas fa-sitemap" style="font-size: 23px;"></i></center>
									</div>
									<div class="panel-footer">
										<center>Genealogia Usuarios</center>
									</div>
								</div>
							</div>
				        </div>
				        
				        @if($settingCliente->cliente == 1)
				        <div class="col-sm-2 {{($settingCliente->cliente == 1) ? 'ajustar' : 'aumentar'}}">
						<a href="{{ route('genealogia', ['id' => $yo, 'tipo' => 'Cliente']) }}">
							<div class="panel-group">
								<div class="panel panel-primary">
									<div class="panel-heading">
										<center><i class="fas fa-sitemap" style="font-size: 23px;"></i></center>
									</div>
									<div class="panel-footer">
										<center>Genealogia Clientes</center>
									</div>
								</div>
							</div>
				        </div>
				        @endif
	</div>			        
@endsection
@include('usuario.componentes.scritpTable')