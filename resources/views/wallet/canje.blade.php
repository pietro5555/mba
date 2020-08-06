@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
		    <a class="btn btn-info btn-block" data-toggle="modal" data-target="#canje">Realizar Canje</a>
			<table id="mytable" class="table table-bordered table-striped" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Cantidad Puntos</th>
						<th class="text-center">Total a Recibir</th>
						<th class="text-center">Estatus</th>
						<th class="text-center">Fecha</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($canjes as $canje)
					<tr>
						<td class="text-center">{{ $canje->id }}</td>
						<td class="text-center">{{ $canje->cantidad }}</td>
						<td class="text-center">{{ $canje->total}}</td>
						<td class="text-center">
							@if ($canje->status == '0')
							En espera
							@elseif($canje->status == '1')
							Aprobado
							@else
							Cancelado
							@endif
						</td>
						
						<td class="text-center">{{ date('d-m-Y', strtotime($canje->created_at)) }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

@include('wallet/modal/modalcanje')

@endsection
@include('usuario.componentes.scritpTable')

@push('script')
<script>
    
    function totalRetiro(valor) {
        
        var resul = valor * {{$settings->total_canje}}
        
        $('#total').val(resul);
    }
    
    </script>
@endpush