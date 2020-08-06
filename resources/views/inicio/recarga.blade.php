@extends('layouts.login.inicio')

@section('content')

<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
		     <button class="btn btn-info" data-toggle="modal" data-target="#recarga-todos">Recargar Todos</button>
			<table id="mytable" class="table table-bordered table-striped" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Usuario</th>
						<th class="text-center">Balance</th>
						<th class="text-center">Fecha</th>
						<th class="text-center">Opciones</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($recarga as $bille)
					<tr>
						<td class="text-center">{{ $bille->ID }}</td>
						<td class="text-center">{{ $bille->display_name }}</td>
						<td class="text-center">{{ $bille->billetera }}</td>
						<td class="text-center">{{ date('d-m-Y', strtotime($bille->created_at)) }}</td>
						<td class="text-center">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#recargar" onclick="seleccionar('{{$bille->ID}}')">Recargar</a>
                        </td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Modal editar -->   
<div class="modal fade" id="recargar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recarga</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('ajustes-save-recarga')}}" method="post">
          {{ csrf_field() }} 

 <input type="hidden" class="form-control" name="id" id="id">

            <div class="col-md-12">
                <div class="form-group">
                    <label>Cantidad a Recargar</label>
            <input type="number" class="form-control" name="recarga" >
            </div>
              </div>
               
               <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 



<!-- Modal aprobar todo -->   
<div class="modal fade" id="recarga-todos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recargar Todos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('ajustes-save-todos-recarga')}}" method="post">
          {{ csrf_field() }}

 <div class="col-md-12">
                <div class="form-group">
                    <label>Cantidad a Recargar</label>
            <input type="number" class="form-control" name="recarga" >
            </div>
              </div>
              
               <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 


@endsection

@include('usuario.componentes.scritpTable')
@push('script')

<script type="text/javascript">
      seleccionar = function(usuarios){
        $('#id').val(usuarios);
       };  
    </script>
@endpush