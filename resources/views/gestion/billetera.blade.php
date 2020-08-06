@extends('layouts.dashboardnew')

@section('content')


@push('style')
<style>
		.color {
			background-color: #e5e5e5;
		}
	
		.center {
			text-align: center;
		}
		
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
						<th class="center">Fecha</th>
						<th class="center">Descripcion</th>
						<th class="center">Descuento</th>
						<th class="center">Debito</th>
						<th class="center">Credito</th>
						<th class="center">Balance</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($billetera as $bille)

					<tr>
						<td class="center">{{ $bille->id }}</td>
						<td class="center">{{date('d-m-Y', strtotime($bille->created_at)) }}</td>
						<td class="center">{{ $bille->descripcion }}</td>
						<td class="center">{{ $bille->descuento }}</td>
						<td class="center">{{ $bille->debito }}</td>
						<td class="center">{{ $bille->credito }}</td>
						<td class="center">{{ $bille->balance }}</td>
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