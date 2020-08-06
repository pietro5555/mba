@extends('layouts.dashboardnew')

@section('content')

@push('style')
<style>
	.p {
		width: 50% !important;
		text-align: center;
	}

	@media screen and (max-width: 700px) {
		#yo {
			font-size: 12px;
		}

		#mytable {
			width: 100% !important;
		}
	}
	
	.img{
	    width: 150px;
        height: 150px;
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
	<div class="box">
		<div class="box-header with-border">
			<div class="box-title">Buscar usuario para ver su perfil</div>
		</div>
		<div class="box-body">
			<form method="POST" action="{{ route('admin.vista') }}">
				{{ csrf_field() }}

				<div class="col-sm-4">

					<label class="control-label " style="text-align: center; margin-top:4px;">Buscar Usuario</label>
					<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
						name="user_email" placeholder="ID o Correo" required style="background-color:f7f7f7;" />

				</div>

				<div class="col-sm-2" style="padding-left: 10px;">
					<button class="btn green padding_both_small" type="submit" id="btn"
						style="margin-bottom: 15px; margin-top: 28px;">buscar</button>
				</div>

			</form>
		</div>
	</div>
</div>

<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-header with-border">
			<div class="box-title">
				Vision General del usuario
			</div>
		</div>
		<div class="box-body">
			<div class="row"
				style="padding: 15px 15px; background-color:white; margin-top:10px; margin-right: 15px; margin-left: 15px; margin-bottom:25px;">
				<table id="mytable" class="table table-bordered table-responsive"
					style="width: 70%; margin: 100px auto;">
					<thead>

					</thead>
					<tbody>
						@php
						$cont = "";
						$faltante = DB::table('user_campo')
						->where('ID', '=', $usuario->ID)
						->get();
						@endphp
						<tr>
							<td HEIGHT="50" WIDTH="30" COLSPAN=2>
								<img src="{{asset('/avatar/'.$usuario->avatar)}}" class="center-block img" alt="">
							</td>
						</tr>
						@foreach($faltante as $falta)
						<tr>
							<td class="p">Nombre</td>

							<td class="p" id="yo">{{$falta->firstname}}</td>

						</tr>
						<tr>
							<td class="p">Apellido</td>

							<td class="p" id="yo">{{$falta->lastname}}</td>

						</tr>
						<tr>
							<td class="p">Nombre de Usuario</td>

							<td class="p" id="yo">{{$falta->nameuser}}</td>

						</tr>
						<tr>
							<td class="p">Fecha de Nacimiento</td>
							<td class="p" id="yo">{{ $falta->edad }}</td>

						</tr>
						<tr>
							<td class="p">Género</td>
							@if($falta->genero == 'M')
							<td class="p" id="yo">Masculino</td>
							@else
							<td class="p" id="yo">Femenino</td>
							@endif

						</tr>
						<tr>
							<td class="p">Teléfono</td>
							<td class="p" id="yo">{{ $falta->phone }}</td>

						</tr>
						@endforeach
						<tr>
							<td class="p">Correo</td>
							<td class="p" id="yo">{{ $usuario->user_email }}</td>

						</tr>
					</tbody>
				</table>

			
					<div class="col-md-2 {{($settingCliente->cliente == 1) ? 'ajustar' : 'aumentar'}}">
						<a href="{{ route('gestion.verusuario', Crypt::encrypt($usuario->ID)) }}">
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
						<a href="{{ route('gestion.ingresos', Crypt::encrypt($usuario->ID)) }}">
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
						<a href="{{ route('gestion.referidos', Crypt::encrypt($usuario->ID)) }}">
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
						<a href="{{ route('gestion.wallet', Crypt::encrypt($usuario->ID)) }}">
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
						<a href="{{ route('gestion.pago', Crypt::encrypt($usuario->ID)) }}">
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
						<a href="{{ route('genealogia', ['id' => $usuario->ID, 'tipo' => 'Normal']) }}">
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
						<a href="{{ route('genealogia', ['id' => $usuario->ID, 'tipo' => 'Cliente']) }}">
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
		</div>
	</div>
</div>

@endsection