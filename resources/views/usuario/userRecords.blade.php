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

            <form method="POST" action="{{ route('tipofil') }}">
                {{ csrf_field() }}
               
                <div class="form-group has-feedback date col-xs-12 col-md-4">
                    <label class="control-label" style="color: white;">Tipo Usuarios</label>
                    <select name="tipo" class="form-control">
                        <option value="0">Adminsitrador</option>
                        <option value="1">Moderador</option>
                        <option value="2">Mentor</option>
                        <option value="3">Cliente</option>
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
	<div class="box">
		<div class="box-body">
			<a href="{{route('downloadred')}}" class="btn btn-info btn-block descargar">Descargar Red</a>
			
			<button data-toggle="modal" data-target="#editar" class="btn btn-info btn-block">Editar la contraseña de todos</button>
			
			<br class="col-xs-12">
			<table id="mytable" class="table">
				<thead>
					<tr>
						<th class="text-center">
							ID
						</th>
						<th class="text-center">
							Usuario
						</th>
						<th class="text-center">
							Correo Electrónico
						</th>
						<th class="text-center">
							País
						</th>
						<th class="text-center">
							Referifo Por
						</th>
						<th class="text-center">
							Tipo
						</th>
						<th class="text-center">
							Estatus
						</th>
						@if($estructura == 'binaria')
						<th class="text-center">Lado</th>
						@endif
						<th class="text-center">
							Acción
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach($usuarios as $usuario)
					<tr>
						<td class="text-center">
							{{ $usuario->ID }}
						</td>
						<td class="text-center">
							{{ $usuario->display_name }}
						</td>
						<td class="text-center">
							{{ $usuario->user_email }}
						</td>
						<td class="text-center">
							{{ $usuario->pais }}
						</td>
						<td class="text-center">
							{{ $usuario->nombre_referido }}
						</td>
						<td class="text-center">
							{{$usuario->rol}}
						</td>
						<td class="text-center">
							@if ($usuario->status == 1)
							Activo
							@else
							Inactivo
							@endif
						</td>
						
						@if($estructura == 'binaria')
						<td class="text-center">{{ $usuario->ladomatriz}}</td>
						@endif
						
						<td class="text-center">
							<a class="btn btn-info" href="{{ route('users.edit', $usuario->ID) }}">
								<i class="fa fa-edit"></i></a>

							@if($usuario['ID'] != 1)
							<a class="btn btn-danger eliminar" href="{{ route('users.delete', $usuario->ID) }}" data-id="{{$usuario->ID}}" data-nombre="{{$usuario->display_name}}">
								<i class="fa fa-trash"></i></a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>


<!-- Modal editar la contraseña -->   
<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar contraseña de todos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('users.password')}}" method="post">
          {{ csrf_field() }}
             

        <div class="col-md-12">
                <div class="form-group">
                    <label>Ingresar la Contraseña</label>
            <input type="password" class="form-control" name="password" >
                </div>
        </div>
            
               
               <button type="submit" class="btn btn-primary btn-block">Modificar</button>
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

$('.eliminar').on('click',function(e){
 e.preventDefault();

        var ID = $(this).attr('data-id');
        var nombre = $(this).attr('data-nombre');
        
   Swal.fire({
  title: 'Esta seguro que quiere eliminar al usuario: '+nombre,
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'delete/'+ID;
    }
  });
});



$('.descargar').on('click',function(e){
 e.preventDefault();
        
   Swal.fire({
  title: 'Esta seguro que quiere descargar este archivo: ',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'downloadred';
    }
  });
});

</script>
@endpush