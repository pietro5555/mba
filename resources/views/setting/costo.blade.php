@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
		    
		    <a class="btn btn-info btn-block" data-toggle="modal" data-target="#agregardeparta">Agregar Departamentos </a>
		    
			<table id="mytable" class="table table-bordered table-striped" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Departamento</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($departamentos as $depart)
					<tr>
						<td class="text-center">{{ $depart->id }}</td>
						<td class="text-center">{{ $depart->nombre }}</td>
						<td class="text-center">
						    
						    <a class="btn btn-info" data-toggle="modal" data-target="#editardeparta" onclick="depart('{{$depart->id}}','{{$depart->nombre}}')">
								Editar</a>
								
						    <a class="btn btn-danger" href="{{ route('setting-eliminar-depart', $depart->id) }}">
								Eliminar</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>


<div class="col-xs-12">
	<div class="box box-info">
		<div class="box-body">
		    
		    <a class="btn btn-info btn-block" data-toggle="modal" data-target="#agregarcapital">Agregar Capitales </a>
		    
			<table id="mytable2" class="table table-bordered table-striped" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th class="text-center">Departamento</th>
						<th class="text-center">Capitales</th>
						<th class="text-center">Costo</th>
						<th class="text-center">Acciones</th>
					</tr>
				</thead>

				<tbody>
					@foreach ($capitales as $capi)
					@php
					$depa = DB::table('departamento')
					->where('id', '=', $capi->departa)
					->first();
					@endphp
					<tr>
						<td class="text-center">{{ $capi->id }}</td>
						<td class="text-center">{{ $depa->nombre }}</td>
						<td class="text-center">{{ $capi->nombre }}</td>
						<td class="text-center">
						     @if ($moneda->mostrar_a_d)
                            {{$moneda->simbolo}} {{$capi->costo}}
                            @else
                            {{$capi->costo}} {{$moneda->simbolo}}
                            @endif
						</td>
						<td class="text-center">
						    
						    <a class="btn btn-info" data-toggle="modal" data-target="#editarcapital" onclick="capital('{{$capi->id}}','{{$capi->nombre}}','{{$capi->costo}}','{{$depa->id}}')">
								Editar</a>
								
						    <a class="btn btn-danger" href="{{ route('setting-eliminar-capital', $capi->id) }}">
								Eliminar</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>


{{-- agregar departamento --}}
<div class="modal fade" id="agregardeparta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Departamento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-save-costo')}}" method="post">
          {{ csrf_field() }}
           
          <div class="col-md-12">
        
             <label>Departamento</label>
              <input class="form-control" type="text" name="nombre" />
           
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


{{-- agregar capital --}}
<div class="modal fade" id="agregarcapital" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Capital</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-save-capital')}}" method="post">
          {{ csrf_field() }}
           
          <div class="col-md-12">
        
             <label>Capital</label>
              <input class="form-control" type="text" name="nombre" />
           
          </div>
          
          <div class="col-md-12">
        
             <label>Costo</label>
              <input class="form-control" type="text" name="costo" />
           
          </div>
          
          <div class="col-md-12">
             <label>Departamentos</label>
             <select class="form-control" name="depart" required=""/>
          <option value="" selected disabled>Seleccion Un departamento</option>
          @foreach($departamentos as $de)
          <option value="{{$de->id}}">{{$de->nombre}}</option>
          @endforeach
          </select>
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

{{-- editar departamento --}}
<div class="modal fade" id="editardeparta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-edit-depart')}}" method="post">
          {{ csrf_field() }}

           <input name="id" id="iddepartamento" type="hidden">
           
          <div class="col-md-12">
        
             <label>Puntos Propios</label>
              <input class="form-control" type="text" name="nombre" id="departamento" />
           
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


{{-- editar capital --}}
<div class="modal fade" id="editarcapital" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-edit-capital')}}" method="post">
          {{ csrf_field() }}

           <input name="id" id="idcapital" type="hidden">
           
          <div class="col-md-12">
        
             <label>Puntos Propios</label>
              <input class="form-control" type="text" name="nombre" id="capital" />
           
          </div>
          
          
          <div class="col-md-12">
        
             <label>Costo</label>
              <input class="form-control" type="text" name="costo" id="costo"/>
           
          </div>
          
          <div class="col-md-12">
             <label>Departamentos</label>
             <select class="form-control" name="depart" id="departid"/>
          <option value="" selected disabled>Seleccion Un departamento</option>
          @foreach($departamentos as $de)
          <option value="{{$de->id}}">{{$de->nombre}}</option>
          @endforeach
          </select>
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
      depart = function(id, nombre){
        $('#iddepartamento').val(id);
        $('#departamento').val(nombre);
       };  
       
       capital= function(id, nombre, costo, departamento){
        $('#idcapital').val(id);
        $('#capital').val(nombre);
        $('#costo').val(costo);
        $('#departid').val(departamento);
       };  
    </script>
@endpush    