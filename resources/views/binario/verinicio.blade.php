@extends('layouts.dashboardnew')

@section('content')

<div class="col-xs-12">
  <div class="box box-info">
    <div class="box-body">
      {{-- form 1 --}}
      <div class="col-xs-12">
        <form method="POST" action="{{ route('setting-inicio-usuario') }}">
          {{ csrf_field() }}

          <div class="col-sm-4">
            <label class="control-label " style="text-align: center; margin-top:4px;">Nombre del Usuario</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off"
              name="nombre" required style="background-color:f7f7f7;" />

          </div>

          <div class="col-sm-2" style="padding-left: 10px;">
            <button class="btn green padding_both_small" type="submit" id="btn"
              style="margin-bottom: 15px; margin-top: 28px;">buscar</button>
          </div>

        </form>
      </div>
    
      <div class="col-xs-12">
        <form method="POST" action="{{ route('setting-inicio-fechas') }}">
          {{ csrf_field() }}

          <div class="col-sm-4">
            <label class="control-label " style="text-align: center; margin-top:4px;">Fecha desde</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
              name="fecha1" required style="background-color:f7f7f7;" />

          </div>

          <div class="col-sm-4">
            <label class="control-label " style="text-align: center; margin-top:4px;">Fecha hasta</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
              name="fecha2" required style="background-color:f7f7f7;" />
          </div>


          <div class="col-sm-2" style="padding-left: 10px;">
            <button class="btn green padding_both_small" type="submit" id="btn"
              style="margin-bottom: 15px; margin-top: 28px;">buscar</button>
          </div>

        </form>
      </div>
      {{-- form 2 fin --}}
    </div>
  </div>
</div>


<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
           <a href="{{route('setting-inicio-todo')}}" class="btn btn-info todo">Aceptar Todo</a>
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
                            Descripción
                        </th>
                        <th class="text-center">
                            Total
                        </th>
                        
                        <th class="text-center">
                            Fecha
                        </th>
                        <th class="text-center">
                            Estado
                        </th>
                        <th class="text-center">
                            Opciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($inicio as $dato)
                   
                    <tr>
                        <td class="text-center">
                            {{$dato->id}}
                        </td>
                        @if (Auth::user()->rol_id == 0)
                        <td class="text-center">
                             {{$dato->usuario}}
                        </td>
                        @endif
                        <td class="text-center">
                           Bono de Inicio del usuario {{$dato->usuario}}
                        </td>
                        <td class="text-center">
                            {{$dato->total}}
                        </td>
                        <td class="text-center">
                            {{date('d-m-Y', strtotime($dato->created_at))}}
                        </td>
                        <td class="text-center">
                            @if($dato->status == 0)
                            En espera
                            @elseif($dato->status == 1)
                             Aprobado
                             @elseif($dato->status == 2)
                             Cancelado
                            @endif
                        </td>
                        
                        <td class="text-center">
                            @if($dato->status == 0)
                            <a href="{{route('setting-inicio-aceptar', $dato->id)}}" class="btn btn-primary aceptar" data-nuevo="{{$dato->id}}">Aprobar</a>
                                    
                                <a href="{{route('setting-inicio-cancelar', $dato->id)}}"
                                    class="btn btn-danger cancelar" data-id="{{$dato->id}}">Cancelar</a>
                            @else
                            
                             <a href="{{route('setting-inicio-aceptar', $dato->id)}}" class="btn btn-primary" disabled>Aprobar</a>
                             
                                <a href="{{route('setting-inicio-cancelar', $dato->id)}}"
                                    class="btn btn-danger" disabled>Cancelar</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>


<!-- Modal aprobar todo -->   
<div class="modal fade" id="aprobar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Aceptar Compra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-inicio-todo')}}" method="post">
          {{ csrf_field() }} 

            <div class="col-md-12">
                <div class="form-group">
                    <label>Dinero Interno</label>
            <input type="number" class="form-control" name="interna">
            </div>
              </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Dinero Digital</label>
            <input type="number" class="form-control" name="digital">
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
       
       
       
       $('.aceptar').on('click',function(e){
 e.preventDefault();

        var ID = $(this).attr('data-nuevo');
        
   Swal.fire({
  title: 'Esta seguro que quiere aceptar este bono,
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'aceptarinicio/'+ID;
    }
  });
});



 $('.todo').on('click',function(e){
 e.preventDefault();
        
   Swal.fire({
  title: 'Esta seguro que quiere aceptar todos los bonos,
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'aceptartodoinicio';
    }
  });
});
       
       
       $('.cancelar').on('click',function(e){
 e.preventDefault();

        var ID = $(this).attr('data-id');
        
   Swal.fire({
  title: 'Esta seguro que quiere cancelar este bono,
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   window.location.href = 'cancelarinicio/'+ID;
    }
  });
});
    </script>
@endpush