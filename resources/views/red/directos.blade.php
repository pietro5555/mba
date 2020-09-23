@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
        	<h4 class="box-title white">
              <span class="info-box-icon-users">
               <i class="fas fa-user white"></i>
               </span>
        	    <p style="padding: 10px 50px;"> Buscar Usuarios</p>
        	</h4>

            <form method="POST" action="{{ route('red.filtre') }}" class="form-inline">
                {{ csrf_field() }}
               
                <div class="form-group has-feedback date col-xs-12 col-md-4">
                    <label class="control-label" style="color: white;">ID Buscar</label>
                    <input type="number" name="user" class="form-control">
                </div>
                
                <div class="form-group has-feedback date col-xs-12 col-md-2">
                    <button class="btn btn-success" type="submit">
                        buscar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Registros de red --}}
<div class="col-xs-12">
    <div class="box-body white">
       <h3>Registros de Red</h3>
    </div>
</div>

<div class="col-xs-12">
	<div class="box box-info" style="background-color: #007bff; border-radius: 10px;">
		<div class="box-body">

			<h4 class="box-title white">
              <span class="info-box-icon-fecha">
               <i class="fas fa-calendar-week white"></i>
               </span>
        	    <p style="padding: 10px 50px;"> Filtrar Por fechas</p>
        	</h4>

        	<form method="POST" action="{{route('red.filtre')}}">
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
	<div class="box box-info">
		<div class="box-body">
			<table id="mytable" class="table">
				<thead>
					<tr>
						<th class="text-center">
							ID
						</th>
						<th class="text-center">
							Nombre
						</th>
						<th class="text-center">
							Correo
						</th>
						<th class="text-center">
							Estado
						</th>
						<th class="text-center">
							Tipo de Usuario
						</th>
						<th class="text-center">
							Tipo de Referido
						</th>
						<th class="text-center">
							Nivel del Referido
						</th>
						<th class="text-center">
							Ingreso
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach($allReferido as $usuario)
					<tr>
						<td class="text-center">
							{{ $usuario['ID'] }}
						</td>
						<td class="text-center">
							{{ $usuario['nombre'] }}
						</td>
						<td class="text-center">
							{{ $usuario['email'] }}
						</td>
						<td class="text-center">
							@if($usuario['status'] == 1)
							<i class="fa fa-circle text-verde"></i> Activo
							@else
							<i class="fa fa-circle text-rojo"></i> Inactivo
							@endif
						</td>
						<td class="text-center">
							{{$usuario['tipouser']}}
						</td>
						<td class="text-center">
							@if($usuario['nivel'] == 1)
								Directo
							@else
								Indirecto
							@endif
						</td>
						<td class="text-center">
						  {{$usuario['nivel']}}
						</td>
						
						<td class="text-center">
						{{ date('d-m-Y', strtotime($usuario['fecha'])) }}
						</td>
						
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

{{-- Registros directos --}}
<div class="col-xs-12">
    <div class="box-body white">
       <h3>Registros Directos</h3>
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

        	<form method="POST" action="{{route('red.filtre')}}">
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
						<th class="text-center">
							ID
						</th>
						<th class="text-center">
							Nombre
						</th>
						<th class="text-center">
							Correo
						</th>
						<th class="text-center">
							Estado
						</th>
						<th class="text-center">
							Ingreso
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach($referidosDirectos as $directos)
					<tr>
						<td class="text-center">
							{{ $directos->ID }}
						</td>
						<td class="text-center">
							{{ $directos->display_name }}
						</td>
						<td class="text-center">
							{{ $directos->user_email }}
						</td>
						<td class="text-center">
							@if($directos->status == 1)
							<i class="fa fa-circle text-verde"></i> Activo
							@else
							<i class="fa fa-circle text-rojo"></i> Inactivo
							@endif
						</td>
						
						<td class="text-center">
						{{ date('d-m-Y', strtotime($directos->created_at)) }}
						</td>
						
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>


@endsection
@include('usuario.componentes.scritpTable')

