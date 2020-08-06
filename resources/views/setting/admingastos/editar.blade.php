<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-admi-editar')}}" method="post">
          {{ csrf_field() }} 
          
          <input type="hidden" name="id" id="id">
          
          
          <div class="col-md-12">
        <div id="ingresosoculto" style="display:none;">
            <label>Nombre de la Categoria</label>
              <select class="form-control" name="ingresos" id="ingresonombre">
        <option value="" selected disabled>Seleccione una Opci贸n</option>
                  @foreach($lista as $lis)
                   @if($lis->tipo == 1)
        <option value="{{$lis->nombre}}">{{$lis->nombre}}</option>
                   @endif
                  @endforeach
        </select>
           </div>
        </div>
        
        
        <div class="col-md-12">
        <div id="gastosoculto" style="display:none;">
            <label>Nombre de la Categoria</label>
              <select class="form-control" name="gastos" id="gastonombre">
        <option value="" selected disabled>Seleccione una Opci贸n</option>
                  @foreach($lista as $lis)
                     @if($lis->tipo == 2)
        <option value="{{$lis->nombre}}">{{$lis->nombre}}</option>
                   @endif
                  @endforeach
        </select>
           </div>
        </div>
        
        
        <div class="col-md-12">
                    <label>Saldo</label>
            <input type="number" class="form-control" name="cantidad" id="precio" step="any" required>
               </div>
               
               <div class="col-md-12">
                    <label>Descripcion</label>
           <textarea name="contenido" class="form-control" id="contenido" cols="10" rows="5"></textarea>
               </div>
               
               <div class="col-md-12">
                    <label>Fecha</label>
            <input type="date" class="form-control" name="fecha" id="inicio" required>
               </div>
               
               
        
       
               
            <div class="col-md-12" style="margin-top:20px; margin-bottom:20px;">   
               <button type="submit" class="btn btn-info btn-block">Actualizar</button>
               </div>
        </form>
      </div>
      <div class="modal-footer">
        <form action="{{route('setting-eliminar-gasto')}}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="ID" id="eliminar">
        <button type="submit" class="btn btn-danger oculto">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div> 