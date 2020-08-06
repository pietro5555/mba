@extends('layouts.dashboard')

@section('content')

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

<div class="wrapper-md" style="padding: 15px;">
<div class="col-md-12 buq" >
    <form method="POST" action="{{ route('admin.filter_comisiones') }}">
            {{ csrf_field() }}
            
             <div class="col-sm-4">
               <label class="control-label " style="text-align: center; margin-top:4px;">Fecha desde</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off" name="primero" required style="background-color:f7f7f7;"/>
           
            </div>
            
            <div class="col-sm-4">
                 <label class="control-label " style="text-align: center; margin-top:4px;">Fecha hasta</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off" name="segundo" required style="background-color:f7f7f7;"/>
                </div>
            
            
              <div class="col-sm-2" style="padding-left: 10px;">
            <button class="btn green padding_both_small" type="submit" id="btn" style="margin-bottom: 15px; margin-top: 28px;">buscar</button>
               </div>
            
            </form>
    </div>
     </div>
     
<div class="col-xs-12" > 
    <div class="col-xs-12 panel panel-default taq">
        <div class="col-xs-12 panel-body bubu" style="padding: 10px;">
           <table id="mytable" class="display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th><center>#</center></th>
				<th><center>Usuario</center></th>
				<th><center>Nivel de la Comisión</center></th>
				<th><center>Tipo de Comisión</center></th>
				<th><center>Monto</center></th>
			</tr>
		</thead>
		
		<tbody>
			
			@foreach($comision as $comisi)
				@php
					
					$usuario = DB::table($settings->prefijo_wp.'users')
								->select('display_name')
								->where('user_email', '=', $comisi->referred_email)
								->first();
				@endphp

				<tr>
					<td><center>{{ $comisi->id }}</center></td>
					<td><center>{{ $usuario->display_name }}</center></td>
					<td><center>{{ $comisi->referred_level }}</center></td>
					<td><center>{{ $comisi->tipo_comision }}</center></td>
					<td><center>$ {{ $comisi->total }},00</center></td>
				</tr>

			@endforeach
		</tbody>
 </table>
	</div>
    </div>
    </div>
@endsection


