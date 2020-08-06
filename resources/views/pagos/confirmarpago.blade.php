@extends('layouts.dashboardnew')

@section('content')
{{-- filtro de fecha --}}
@include('usuario.componentes.filtroPorFecha', ['ruta' => 'price-filtro', 'form' => 'confirmarpago'])
@if (!empty($fechas['desde']) && !empty($fechas['hasta']))
{{-- fecha --}}
<div class="col-xs-12">
	<div class="box">
		<div class="box-body">
			<div class="form-group col-xs-12 col-sm-6">
				<label>Fecha Desde</label>
				<h5>{{ date('d-m-Y', strtotime($fechas['desde'])) }}</h5>
			</div>
			<div class="form-group col-xs-12 col-sm-6">
				<label>Fecha Hasta</label>
				<h5>{{date('d-m-Y', strtotime($fechas['hasta']))}}</h5>
			</div>
		</div>
	</div>
</div>
@endif

{{-- botones de pago --}}
<div class="col-xs-12">
	<div class="box">
		<div class="box-body">
			<div class="row">
				@if ($Botones->btn_todo == 1)
				<div class="col-xs-12 col-md-6">
					<a href="{{route('price-aprobar-all')}}" class="btn btn-info btn-block aceptar">
						Pagar todo
					</a>
				</div>
				@endif
				@if ($Botones->btn_masivo == 1)
				<div class="col-xs-12 col-md-6">
					<a href="javascritp:;" class="btn btn-info btn-block"  data-toggle="modal" data-target="#myModal">
						Pago Masivo o Pago por monto en especifico
					</a>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>

@if ($Botones->btn_liquida == 1 || $Botones->btn_monto == 1)
<div class="col-xs-12">
	<div class="box">
		<div class="box-body">
			<div class="row">
				@if ($Botones->btn_liquida == 1)
				<div class="col-xs-12 col-md-6">
					<a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#liquidacion">
						Liquidacion
					</a>
				</div>
				@endif
				@if ($Botones->btn_monto == 1)
				<div class="col-xs-12 col-md-6">
					<a href="javascritp:;" class="btn btn-info btn-block"  data-toggle="modal" data-target="#monto">
						Pago por monto minimo y maximo
					</a>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endif


<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
			<table id="mytable" class="table table-bordered table-hover table-responsive">
				<thead>
					<tr>
						<th class="text-center">
							#
						</th>
						<th class="text-center">
							Usuario
						</th>
						<th class="text-center">
							Correo
						</th>
						<th class="text-center">
							Monto
						</th>
						<th class="text-center">
							Fecha
						</th>
						<th class="text-center">
							Metodo
						</th>
						<th class="text-center">
							Tipo de Metodo
						</th>
						
						 @if($adicional == '1')
                        <th class="text-center">
                            Valor en otras monedas
                        </th>
                        @endif
                        
						<th class="text-center">
							Estado
						</th>
						<th class="text-center">
							Accion
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach($pagos as $pago)
					<tr>
						<td class="text-center">
							{{$pago->id}}
						</td>
						<td class="text-center">
							{{$pago->username}}
						</td>
						<td class="text-center">
							{{$pago->email}}
						</td>
						<td class="text-center">
							@if ($moneda->mostrar_a_d)
							{{$moneda->simbolo}} {{$pago->monto}}
							@else
							{{$pago->monto}} {{$moneda->simbolo}}
							@endif
						</td>
						<td class="text-center">
							{{$pago->fechasoli}}
						</td>
						<td class="text-center">
							{{$pago->metodo}}
						</td>
						<td class="text-center">
							{{$pago->tipopago}}
						</td>
						
						@if($adicional == '1')
                        <th class="text-center">
                            {{$pago->monedaAdicional}}
                        </th>
                        @endif
                        
						<td class="text-center">
							@if ($pago->estado == 0)
							Pendiente
							@endif
						</td>
						<td class="text-center">
							<a class="btn btn-info confirmar" href="{{route('price-aprobar', [$pago->id])}}" data-id="{{$pago->id}}"><i
								class="fas fa-check"></i></a>
								<a class="btn btn-danger cancelar" href="{{route('price-rechazar', [$pago->id])}}" data-id="{{$pago->id}}"><i
									class="fas fa-ban"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		{{-- modal para el pago masivo --}}
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Pago Masivo</h4>
						</div>
						<div class="modal-body">
							<form action="{{route('price-massive')}}" method="post">
								{{ csrf_field() }}
								<div class="form-group has-feedback">
									<label for="">Monto minimo a pagar</label>
									<input type="text" class="form-control" name="monto_min" placeholder="00000000" required>
									<span class="fa fa-dolar form-control-feedback">$</span>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Pagar Masivamente</button>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>
			
			
			{{-- modal para el pago por monto  minimo y maximo --}}
		<div class="modal fade" id="monto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Pago por monto minimo y maximo</h4>
						</div>
						<div class="modal-body">
							<form action="{{route('price-montos')}}" method="post">
								{{ csrf_field() }}
			
		  				
			<div class="alert alert-info" role="alert">
            <h4> <b>Nota:</b> Se pagara solo a los usuarios que tenga un monto igual o mayor al minimo e igual o inferior al monto maximo</h4>
           </div>
         
								
								<div class="form-group has-feedback">
									<label for="">Monto minimo</label>
									<input type="text" class="form-control" name="minimo" placeholder="00000000" pattern="[0-9]*" required>
									<span class="fa fa-dolar form-control-feedback">$</span>
								</div>
								
								<div class="form-group has-feedback">
									<label for="">Monto maximo</label>
									<input type="text" class="form-control" name="maximo" placeholder="00000000" pattern="[0-9]*" required>
									<span class="fa fa-dolar form-control-feedback">$</span>
								</div>
								
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Pagar montos</button>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>
			
			@include('pagos.componentes.liquidacion')
			@endsection
			
			@include('usuario.componentes.scripBotones')
			
			@push('script')
<script type="text/javascript">

$('.aceptar').on('click',function(e){
 e.preventDefault();
        
   Swal.fire({
  title: 'Esta seguro que quiere pagar todo',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'aceptartodo';
    }
  });
});

</script>
@endpush

@push('script')
<script type="text/javascript">

$('.cancelar').on('click',function(e){
 e.preventDefault();
 
 var ID = $(this).attr('data-id');
        
   Swal.fire({
  title: 'Esta seguro que quiere cancelar el pago',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'rechazarpago/'+ID;
    }
  });
});



$('.confirmar').on('click',function(e){
 e.preventDefault();
 
 var ID = $(this).attr('data-id');
        
   Swal.fire({
  title: 'Esta seguro que quiere aceptar el pago',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'aceptarpago/'+ID;
    }
  });
});


$('.liquidar').on('click',function(e){
 e.preventDefault();
        
   Swal.fire({
  title: 'Esta seguro que quiere Liquidar todo',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'liquidacion';
    }
  });
});


</script>
@endpush