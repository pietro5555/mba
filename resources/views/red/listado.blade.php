@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Filtrar por Usuarios</h3>
        </div>
        <div class="box-body">
            <form method="POST" action="{{ route('admin-red-filtre') }}" class="form-inline">
                {{ csrf_field() }}
               
                <div class="form-group has-feedback date col-xs-12 col-md-4">
                    <label class="control-label">Lista de Red</label>
                    <select name="lista" class="chosen">
                        @foreach($red as $re)
                        <option value="{{$re->ID}}">{{$re->display_name}}</option>
                        @endforeach
                      </select>
                </div>
                
                <div class="form-group has-feedback date col-xs-12 col-md-2" style="margin-top: 15px;">
                    <button class="btn green padding_both_small" type="submit">
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
			<table id="mytable" class="table table-bordered table-striped" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Usuario</th>
						<th class="text-center">Patrocinador</th>
						<th class="text-center">Rango</th>
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