@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
            <table id="mytable" class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th class="text-center">
                            #
                        </th>
                        @if(Auth::user()->rol_id == 0)
                        <th class="text-center">
                            Usuario
                        </th>
                        @endif
                        <th class="text-center">
                            Titulo
                        </th>
                        <th class="text-center">
                           Fecha
                        </th>
                        <th class="text-center">
                           Opciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listados as $listado)
                    
                    @php					
		        						$faltante = DB::table($settings->prefijo_wp.'users')
		        						->where('ID', '=', $listado->iduser)
		        						->get();
		        	@endphp
                    <tr>
                        <td class="text-center">
                            {{$listado->id}}
                        </td>
                        
                        @if(Auth::user()->rol_id == 0)
                        @foreach($faltante as $falta)
                        <td class="text-center">
                             {{$falta->display_name}}
                        </td>
                        @endforeach
                        @endif
                        
                        <td class="text-center">
                            {{$listado->titulo}}
                        </td>
                        
                        <td class="text-center">
                            {{date('d-m-Y', strtotime($listado->created_at))}}
                            </td>
                            
                        <td class="text-center">
                <a href="/mioficina/link-pagos/{{$listado->archivo}}" download="{{$listado->archivo}}" class="btn btn-info"><span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span></a>
                
                @if(Auth::user()->rol_id == 0)
                <a href="{{ route('link-cerrar', $listado->id) }}" class="btn btn-danger eliminar" data-id="{{$listado->id}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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

$('.eliminar').on('click',function(e){
 e.preventDefault();

        var ID = $(this).attr('data-id');
        
   Swal.fire({
  title: 'Esta seguro que quiere eliminar este pago',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'cerrar/'+ID;
    }
  });
});

</script>
@endpush