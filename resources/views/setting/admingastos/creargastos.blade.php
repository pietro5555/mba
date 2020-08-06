<!-- Agregar a la lista de gastos -->   
<div class="modal fade" id="listagastos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Informacion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-save-gasto')}}" method="post">
          {{ csrf_field() }} 
          
          
          <input type="hidden" name="date" id="fecha"> 
          
          <div class="col-md-12">
                    <label>Valor a ingresar</label>
            <input type="number" class="form-control" step="any" name="saldo" required>
               </div>
               
               <div class="col-md-12">
                    <label>Descripcion</label>
           <textarea name="contenido" class="form-control" cols="10" rows="5"></textarea>
               </div>
               
               <div class="col-md-12">
             <label class="control-label ">Tipo de categoria</label>
        <select class="form-control" name="tipo" id="opcion" onchange="seleccionado()">
        <option value="" selected disabled>Seleccione una Opción</option>    
        <option value="1">Ingresos</option>
        <option value="2">Gastos</option>
        </select>
        </div>
        
        
        <div class="col-md-12" style="margin-top:20px;">
        <div id="ingresos" style="display:none;">
              <select class="form-control" name="ingresos">
        <option value="" selected disabled>Seleccione una Opción</option>
                  @foreach($lista as $lis)
                   @if($lis->tipo == 1)
        <option value="{{$lis->nombre}}">{{$lis->nombre}}</option>
                   @endif
                  @endforeach
        </select>
           </div>
        </div>
        
        
        <div class="col-md-12">
        <div id="gastos" style="display:none;">
              <select class="form-control" name="gastos">
        <option value="" selected disabled>Seleccione una Opción</option>
                  @foreach($lista as $lis)
                     @if($lis->tipo == 2)
        <option value="{{$lis->nombre}}">{{$lis->nombre}}</option>
                   @endif
                  @endforeach
        </select>
           </div>
        </div>
        
       
               
            <div class="col-md-12" style="margin-top:20px; margin-bottom:20px;">   
               <button type="submit" class="btn btn-info btn-block">Agregar</button>
               </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 