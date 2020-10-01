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

            <form method="POST" action="{{ route('admin-red-filtre') }}" class="form-inline">
                {{ csrf_field() }}
               
                <div class="form-group has-feedback date col-xs-12 col-md-4">
                    <label class="control-label" style="color: white;">Buscar</label>
                    <select name="lista" class="chosen">
                        @foreach($red as $re)
                        <option value="{{$re->ID}}">{{$re->display_name}}</option>
                        @endforeach
                      </select>
                </div>
                
                <div class="form-group has-feedback date col-xs-12 col-md-2" style="margin-top: 15px;">
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
        	 <h4 class="box-title white">
              <span class="info-box-icon-users">
               <i class="fas fa-user white"></i>
               </span>
        	    <p style="padding: 10px 50px;"> Buscar Tipo de Usuarios</p>
        	</h4>

            <form method="POST" action="{{ route('admin-filtrerango') }}">
                {{ csrf_field() }}
               
                <div class="form-group has-feedback date col-xs-12 col-md-4">
                    <label class="control-label" style="color: white;">Buscar tipo usuarios</label>
                    <select name="rango" class="form-control">
                        <option value="0">Adminsitrador</option>
                        <option value="1">Moderador</option>
                        <option value="2">Mentor</option>
                        <option value="3">Cliente</option>
                      </select>
                </div>
                
                <div class="form-group has-feedback date col-xs-12 col-md-2" style="margin-top: 23px;">
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
			<table id="mytable" class="table" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Usuario</th>
						<th class="text-center">Patrocinador</th>
						<th class="text-center">Tipo</th>
						<th class="text-center">Estatus</th>
						<th class="text-center">Total Directos</th>
						<th class="text-center">Fecha</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($listado as $lis)
					<tr>
						<td class="text-center">{{ $lis->ID }}</td>
						<td class="text-center">{{ $lis->display_name }}</td>
						<td class="text-center">{{ $lis->patrocinador }}</td>
						<td class="text-center">{{ $lis->rol_id }}</td>
						<td class="text-center">{{ $lis->status }}</td>
						<td class="text-center">{{ $lis->directos }}</td>
						<td class="text-center">{{ date('d-m-Y', strtotime($lis->created_at)) }}</td>
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
    $(document).ready(function(){
 $(".chosen").chosen({width: "100%"});
 });
</script>
@endpush