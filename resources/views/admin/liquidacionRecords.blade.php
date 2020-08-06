@extends('layouts.dashboard')
@section('content')
    @if(isset($total))
        @if(Auth::user()->rol_id==5)
            <a href="{{url('admin/generarliquidaciones')}}" class="btn btn-primary">Generar Liquidaciones</a>

            @if($total>0)
                <a href="{{url('admin/liquidar_todo')}}" class="btn btn-success">Aprobar todas las liquidaciones</a>
    		@endif
        @endif

        </script>
        @if(Session::has('flash_message'))
            <div class="alert alert-success" style="margin-top: 10px;">
                <button class="close" data-close="alert"></button>
                <span>
                   {{Session::get('flash_message')}}
                </span>
            </div>
        @endif

    @endif

	<script>
		$(document).ready( function () {
			$('#mytable').DataTable( {
        dom: 'flBrtip',
        responsive: true,
			    buttons: [
			       'csv', 'pdf', 'print'
			    ]
			} );
		});
	</script>

	@if (Session::has('msj'))
        <div class="alert alert-success">
            <strong>{{Session::get('msj')}}</strong>
        </div>
    @endif

    <div style="margin-top: 20px;">
        	<table id="mytable" class="table table-bordered table-hover table-responsive" >
		<thead>
			<tr>
				<th><center>#</center></th>
				<th><center>Usuario</center></th>
				<th><center>Fecha</center></th>
				<th><center>Total Comision</center></th>
				<th><center>Estado</center></th>
				@if(!isset($total))
				    <th><center>Fecha Liquidación</center></th>

				@endif
			</tr>
		</thead>

		<tbody>
			@foreach($liquidaciones as $liquidacion)
				<tr>
					<td><center>{{ $liquidacion->id }}</center></td>
					<td><center>{{ $liquidacion->usuario }}</center></td>
                    <td><center>{{ date('d-m-Y', strtotime($liquidacion->created_at)) }}</center></td>
					<td><center>$ {{ $liquidacion->totalcomision }}</center></td>
					<td>@if ($liquidacion->estado == '0')
							<center>En Espera</center>
						@elseif ($liquidacion->estado == '2')
							<center>Cancelado</center>
						@else
						    <center>Aprobado</center>
						@endif
					</td>
					<td>
					    @if(!isset($total))
				            <center>@if ($liquidacion->estado != '0'){{ date('d-m-Y', strtotime($liquidacion->updated_at)) }}@else-@endif</center>

					    @endif
					</td>
				</tr>

			@endforeach

		</tbody>

	</table>

    </div>



@endsection
