@extends('layouts.dashboardnew')

@section('content')
<div class="col-xs-12">
    <div class="box box-info">
        <a class="btn btn-info" data-toggle="modal" data-target="#crearcat">Agregar Categoria</a>
        <div class="box-body">
            <table id="mytable" class="table table-bordered table-responsive">
                <thead class="info">
                    <tr>
                        <th>
                            <center>#</center>
                        </th>
                        <th>
                            <center>Nombre de la categoria</center>
                        </th>
                         <th>
                            <center>Cantidad de productos</center>
                        </th>
                        <th>
                            <center>Acciones</center>
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                   
                    @foreach($datos as $dato)
                   
                    <tr>
                        <td>
                            <center>{{ $dato['ID'] }}</center>
                        </td>
                        <td>
                            <center>{{ $dato['nombre'] }}</center>
                        </td>
                         <td>
                            <center>{{ $dato['cantidad'] }}</center>
                        </td>
                         
                        <td>
                            <center>
                              
                                <a class="btn btn-primary aceptar" data-toggle="modal" data-target="#editar" onclick="seleccionar('{{$dato['ID']}}','{{$dato['nombre']}}')">Editar</a>
                                    
                                <a href="{{route('tienda-eliminarcat', $dato['ID'])}}" class="btn btn-danger cancelar" data-id="{{$dato['ID']}}">Eliminar</a>
                               
                            </center>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('tienda/componentes/crearcat')
@include('tienda/componentes/editarcat')

@endsection
@include('usuario.componentes.scritpTable')

@push('script')
<script type="text/javascript">

 seleccionar = function(usuarios,nombre){
        $('#id').val(usuarios);
        $('#cat').val(nombre);
       };  

$('.cancelar').on('click',function(e){
 e.preventDefault();

        var ID = $(this).attr('data-id');
        
   Swal.fire({
  title: 'Esta seguro que quiere eliminar esta categoria',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'eliminarcat/'+ID;
    }
  });
});

</script>
@endpush