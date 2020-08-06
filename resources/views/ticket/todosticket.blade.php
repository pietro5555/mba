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
						<th class="center">Tipo de ticket</th>
						<th class="center">Titulo</th>
						<th class="center">Soporte</th>
						<th class="center">Estado</th>
						<th class="center">Opciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($ticket as $tic)

					<tr>
						<td class="center">{{ $tic->id }}</td>
						<td class="center">{{ date('d-m-Y', strtotime($tic->created_at)) }}</td>
						<td class="center">{{ $tic->tipo }}</td>
						<td class="center">{{ $tic->titulo }}</td>
						<td class="center">Enviado a Soporte</td>
						@if($tic->status == 0)
						<td class="center">Abierto</td>
						@else
						<td class="center">Cerrado</td>
						@endif
						<td>

							@if(Auth::user()->rol_id != 0)
							<a href="{{ route('ver', $tic->id) }}" class="btn btn-info">Ver</a>
							@endif

							@if($tic->status == 0 && Auth::user()->rol_id == 0)
							<a href="{{ route('comentar', $tic->id) }}" class="btn btn-info">Comentar</a>

							<a href="{{ route('cerrar', $tic->id) }}" class="btn btn-danger cerrar" data-id="{{$tic->id}}">Cerrar</a>
							@endif

							@if($tic->status == 1 && Auth::user()->rol_id == 0)
							<a href="{{ route('ver', $tic->id) }}" class="btn btn-info">Ver</a>
							@endif
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

@push('script')
<script type="text/javascript">

$('.cerrar').on('click',function(e){
 e.preventDefault();

        var ID = $(this).attr('data-id');
        
   Swal.fire({
  title: 'Esta seguro que quiere cerrar este ticket',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = +ID+'/cerrar';
    }
  });
});

</script>
@endpush