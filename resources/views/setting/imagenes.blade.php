@extends('layouts.dashboardnew')

@section('content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-body">
            
            <div class="col-xs-12">
    {{-- bono activacion --}}
    <div class="box box-info">
        <div class="box-header with-border">
            <div class="box-title">
                <h3>Avatares del árbol</h3>
                <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#cargarimagenes">
                    Agregar Nuevos Avatares
                </button>
                
                <button type="button" class="btn btn-info btn-block" id="imagenesmodal">
                    Cambiar Avatares
                </button>
            </div>
        </div>
        
        <div class="box-body">
            
           <div class="col-sm-3 col-xs-12">
        <div class="fav">
          <h3 class="text-center">Avatar Mujer Activa</h3>
          <h5 class="text-center">
            <img src="{{ asset('/arbol/'.$avatares->activo_mujer)}}" class="circular-avatar" alt="">
          </h5>
        </div>
      </div>
      <div class="col-sm-3 col-xs-12">
        <div class="fav">
          <h3 class="text-center">Avatar Hombre Activo</h3>
          <h5 class="text-center">
            <img src="{{ asset('/arbol/'.$avatares->activo_hombre)}}" alt="" class="circular-avatar">
          </h5>
        </div>
      </div>
      <div class="col-sm-3 col-xs-12">
        <div class="fav">
          <h3 class="text-center">Avatar Mujer Inactiva</h3>
          <h5 class="text-center">
            <img src="{{ asset('/arbol/'.$avatares->inactivo_mujer)}}" alt="" class="circular-avatar">
          </h5>
        </div>
      </div>
      <div class="col-sm-3 col-xs-12">
        <div class="fav">
          <h3 class="text-center">Avatar Hombre Inactivo</h3>
          <h5 class="text-center">
            <img src="{{ asset('/arbol/'.$avatares->inactivo_hombre)}}" alt="" class="circular-avatar">
          </h5>
        </div>
      </div>
      
      
           </div>
            
            </div>
            </div>
        </div>
    </div>
</div>


<!-- Agregar Nuevo Avatar -->   
<div class="modal fade" id="cargarimagenes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevos Avatar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-agregar-avatar')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }} 

           <div class="col-md-12">
                <div class="form-group">
                    <label>Agregar Avatar</label>
            <input type="file" name="avatar[]" multiple accept="image/x-png">
            </div>
              </div>
               
               <button type="submit" class="btn btn-primary btn-block">Agregar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 




<!-- Cambiar Avatar -->   
<div class="modal fade" id="cambiarimagenes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar Avatares</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-cambiar-avatar')}}" method="post">
          {{ csrf_field() }} 


               <div class="form-group">
                    <label>Avatar Mujer Activa</label>
                    <div class="col-sm-12">
                      <select name="activo_mujer" class="form-control chosen">
                        @foreach($avatares->avatar as $avata)
                        <option value="{{$avata->avatar}}" data-img-src="{{ asset('/arbol/'.$avata->avatar)}}" @if($avatares->activo_mujer == $avata->avatar) selected="selected"  @else @endif</option> Seleccione el avatar</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label>Avatar Hobre Activo</label>
                    <div class="col-sm-12">
                      <select name="activo_hombre" class="form-control chosen">
                        @foreach($avatares->avatar as $avata)
                        <option value="{{$avata->avatar}}" data-img-src="{{ asset('/arbol/'.$avata->avatar)}}" @if($avatares->activo_hombre == $avata->avatar) selected="selected"  @else @endif> Seleccione el avatar</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label>Avatar Mujer Inactiva</label>
                    <div class="col-sm-12">
                      <select name="inactivo_mujer" class="form-control chosen">
                        @foreach($avatares->avatar as $avata)
                        <option value="{{$avata->avatar}}" data-img-src="{{ asset('/arbol/'.$avata->avatar)}}" @if($avatares->inactivo_mujer == $avata->avatar) selected="selected"  @else @endif> Seleccione el avatar</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label>Avatar Hobre Inactivo</label>
                    <div class="col-sm-12">
                      <select name="inactivo_hombre" class="form-control chosen">
                        @foreach($avatares->avatar as $avata)
                        <option value="{{$avata->avatar}}" data-img-src="{{ asset('/arbol/'.$avata->avatar)}}" @if($avatares->inactivo_hombre == $avata->avatar) selected="selected"  @else @endif> Seleccione el avatar</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
 
               
               <button type="submit" class="btn btn-primary btn-block" style="margin-top: 50px;">Modificar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 
@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function(){
 $(".chosen").chosen({width: "100%"});
 });
</script>

<script type="text/javascript">
$('#imagenesmodal').on('click',function(e){
 e.preventDefault();
        
   Swal.fire({
  title: 'Esta seguro de realizar esta acción, tenga en cuenta que se realizarán los cambios',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si',
  cancelButtonText: 'No',
}).then((result) => {
  if (result.value) {
   $('#cambiarimagenes').modal();
    }
  });
});
</script>
@endpush