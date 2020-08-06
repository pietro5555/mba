<!-- Agregar al calendario -->   
<div class="modal fade" id="prospecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar calendario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('calendario-guardar')}}" method="post">
          {{ csrf_field() }} 
          
          
          <div class="col-md-12">
                    <label>Titulo</label>
            <input type="text" class="form-control" name="titulo" required>
               </div>


            <div class="col-md-12">
                
                    <label>Descripcion</label>
            <textarea type="text" class="form-control" name="contenido" required rows="3"></textarea>
            
               </div>
               
            <div class="col-md-6">
                
                    <label>Fecha Inicio</label>
            <input type="datetime-local" class="form-control" name="inicio" required>
            
              </div>

            <div class="col-md-6">
               
                    <label>Fecha Final</label>
            <input type="datetime-local" class="form-control" name="vence" required>
            
               </div>
               
               <div class="col-md-12">
               
                    <label>Lugar</label>
            <input type="text" class="form-control" name="lugar" required>
            
               </div>
               
               <div class="col-md-12">
             <label class="control-label " style="text-align: center;">Destinatarios</label>
        <select class="form-control" name="detalles" disabled>
        <option value="5">Afiliado especifico</option>
        </select>
        </div>
        
        <div class="col-md-12">
        
             <label>Correo del usuario</label>
             <input type="text" class="form-control" name="usuario" value="{{$correoprospecto}}">
           
        </div>


        <div class="col-md-12">
          <label class="control-label " style="text-align: center;">Color</label>
        <select class="form-control" name="color">
        <option value="#00acd6">Azul</option>
        <option value="#ffc107">Amarillo</option>
        <option value="#28a745">Verde</option>
        <option value="#dc3545">Rojo</option>
        <option value="#6c757d">gris</option>
        <option value="#343a40">Negro</option>
        </select>
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