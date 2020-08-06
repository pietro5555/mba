<!-- Agregar Fechas -->   
<div class="modal fade" id="mostrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="titulo"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('calendario-modificar')}}" method="post">
          {{ csrf_field() }} 

           <input type="hidden" name="ID" id="ID">
           <input type="hidden" id="iduser">
           
           <div class="col-md-12">
                    <label>Titulo</label>
            <input type="text" class="form-control habilitar" name="titulo" id="titu" required disabled>
               </div>


            <div class="col-md-12">
                
                    <label>Descripcion</label>
            <textarea type="text" class="form-control habilitar" name="contenido" id="contenido" required rows="3" disabled oncopy="return false" onpaste="return false" onkeydown="pulsar(event)"></textarea>
            
               </div>
               
            <div class="col-md-6">
                
                    <label>Fecha Inicio</label>
            <input type="datetime-local" class="form-control habilitar" name="inicio" id="inicio" required disabled>
            
              </div>

            <div class="col-md-6">
               
                    <label>Fecha Final</label>
            <input type="datetime-local" class="form-control habilitar" name="vence" id="vence" required disabled>
            
               </div>
               
               <div class="col-md-12">
               
                    <label>Lugar</label>
            <input type="text" class="form-control habilitar" name="lugar" id="lugar" required disabled>
            
               </div>
               
               <div class="col-md-12 oculto">
             <label class="control-label " style="text-align: center;">Destinatarios</label>
        <select class="form-control habilitar" name="detalle" id="tipo" onchange="seleccionado()" disabled>
        <option value="1">Todos los afiliados</option>
        <option value="2">Todos los afiliados activos</option>
        <option value="3">Todos los afiliados inactivos</option>
        <option value="4">Afiliados registrados este mes</option>
        <option value="5">Afiliado especifico</option>
        </select>
        </div>
        
        <div class="col-md-12 oculto" style="margin-top:20px;">
        <div id="subcate">
             <label>Ingrese el correo del usuario</label>
             <input type="text" class="form-control habilitar" name="usuario" id="especifico" disabled>
           </div>
        </div>


        <div class="col-md-12 oculto">
          <label class="control-label " style="text-align: center;">Color</label>
        <select class="form-control habilitar" name="color" id="color" disabled>
        <option value="#00acd6">Azul</option>
        <option value="#ffc107">Amarillo</option>
        <option value="#28a745">Verde</option>
        <option value="#dc3545">Rojo</option>
        <option value="#6c757d">gris</option>
        <option value="#343a40">Negro</option>
        </select>
        </div>
               
            <div class="col-md-12" style="margin-top:20px; margin-bottom:20px;">   
               <button type="submit" class="btn btn-info btn-block oculto">Modificar</button>
               </div>
        </form>
      </div>
      <div class="modal-footer">
          <form action="{{route('calendario-eliminar')}}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="ID" id="eliminar">
        <button type="submit" class="btn btn-danger oculto">Borrar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </form>
      </div>
    </div>
  </div>
</div> 