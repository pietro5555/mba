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
		
		
<div class="col-xs-12">
  <div class="box box-info" style="background-color: #007bff; border-radius: 10px;">
    <div class="box-body">

      <h4 class="box-title white">
              <span class="info-box-icon-fecha-white">
               <i class="fas fa-calendar-week"></i>
               </span>
              <p style="padding: 10px 50px;"> Filtrar Por fechas</p>
          </h4>

         
           <form method="POST" action="{{ route('admin.purchases-filtre') }}">
                {{ csrf_field() }}
                
               <div class="col-md-12"> 
                <div class="form-group col-xs-12 col-md-3">
                    <label class="control-label" style="color:white">Desde</label>
                    <input class="form-control" type="date" name="fecha1" required>
                </div>
                <div class="form-group date col-xs-12 col-md-3">
                    <label class="control-label" style="color:white">Hasta</label>
                    <input class="form-control" type="date" name="fecha2" required>
                </div>
                <div class="form-group col-xs-12 col-md-4" style="margin-top: 20px;">
                    <button class="btn btn-success" type="submit">
                        buscar
                    </button>
                </div>
               </div> 
            </form>
           
        </div>
    </div>
</div>    



<div class="col-xs-12">
    <div class="box box-info" style="background-color: #5743a7; border-radius: 10px;">
        <div class="box-body">
        	 <h4 class="box-title white">
              <span class="info-box-icon-fecha-blue">
               <i class="fab fa-stripe white"></i>
               </span>
        	    <p style="padding: 10px 50px;"> Buscar Compras</p>
        	</h4>

            <form method="POST" action="{{ route('admin.purchases-forma') }}">
                {{ csrf_field() }}
               
                <div class="form-group has-feedback date col-xs-12 col-md-4">
                    <label class="control-label" style="color: white;">Buscar</label>
                    <select name="lista" class="form-control">
                        <option value="Stripe">Stripe</option>
                        <option value="Coinpayment">Coinpayment</option>
                      </select>
                </div>
                
                <div class="form-group has-feedback date col-xs-12 col-md-2" style="margin-top: 25px;">
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
                            <th class="text-center"># Orden</th>
                            <th class="text-center">Fecha</th>
							<th class="text-center">Cliente</th>
                            <th class="text-center">Membres铆a</th>
                            <th class="text-center">Monto</th>
                            <th class="text-center">Forma de Pago</th>
                            <th class="text-center">Id de Transacci贸n</th>
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