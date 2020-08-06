@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
			<table id="mytable" class="table table-bordered table-striped" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Usuario</th>
						<th class="text-center">Billetera</th>
						<th class="text-center">Fecha</th>
						<th class="text-center">Acciónes</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($usuarios as $user)
					<tr>
						<td class="text-center">{{ $user->ID }}</td>
						<td class="text-center">{{ $user->display_name }}</td>
						<td class="text-center">{{ $user->wallet_amount }}</td>
						<td class="text-center">{{ date('d-m-Y', strtotime($user->created_at)) }}</td>
						
						<td class="text-center">
						    <a class="btn btn-info" data-toggle="modal" data-target="#recarga" onclick="listado('{{$user->ID}}')">Recargar Billetera</a>
						    
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@include('wallet/componentes/recarga')

@endsection
@include('usuario.componentes.scritpTable')

@push('script')
<script type="text/javascript">
      listado = function(id){
        $('#id').val(id);
       };  
    </script>
@endpush    
    