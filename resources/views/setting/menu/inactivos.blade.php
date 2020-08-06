<div class="modal fade" id="inactivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menu Inactivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-menu-cambio')}}" method="post">
          {{ csrf_field() }}
          
        <input type="hidden" name="tipos" value="inactivos">    
          
          
    <div class="col-md-4">
          <h3>Inicio</h3>
          <h4>Estatus</h4>
        <input type="checkbox" name="inicio" {{($inactivos['inicio']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
    </div>
    
    <div class="col-md-4">
          <h3>Actualizar</h3>
          <h4>Estatus</h4>
        <input type="checkbox" name="actualizar" {{($inactivos['actualizar']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
    </div> 
    
    
    <div class="col-md-4">
          <h3>Registro</h3>
          <h4>Estatus</h4>
        <input type="checkbox" name="registro" {{($inactivos['registro']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
    </div>
    
    
    <div class="col-md-4">
          <h3>Registro Cliente</h3>
          <h4>Estatus</h4>
        <input type="checkbox" name="registro_cliente" {{($inactivos['registro_cliente']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
    </div>
    
     <div class="col-md-4">
          <h3>Calendario</h3>
          <h4>Estatus</h4>
        <input type="checkbox" name="calendario" {{($inactivos['calendario']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
    </div>
    
    <div class="col-md-4">
          <h3>Prospeccion</h3>
          <h4>Estatus</h4>
        <input type="checkbox" name="prospeccion" {{($inactivos['prospeccion']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
    </div>
    
    <div class="col-md-12">
          <h3>Red de Usuarios</h3>
          <div class="col-md-4">
          <h4>Estatus</h4>
        <input type="checkbox" name="red_usuario" {{($inactivos['red']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Arbol de Usuario</h4>
        <input type="checkbox" name="arbol" {{($inactivos['red']->usuario == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Arbol de Cliente</h4>
        <input type="checkbox" name="arbol_cliente" {{($inactivos['red']->cliente == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Registro directos</h4>
        <input type="checkbox" name="directos" {{($inactivos['red']->directos == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Registro red</h4>
        <input type="checkbox" name="red" {{($inactivos['red']->red == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
    </div>
    
    
    
     <div class="col-md-12">
          <h3>Transacciones</h3>
          <div class="col-md-4">
          <h4>Estatus</h4>
        <input type="checkbox" name="tran" {{($inactivos['transacciones']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Personales</h4>
        <input type="checkbox" name="personales" {{($inactivos['transacciones']->personales == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Red</h4>
        <input type="checkbox" name="red_tran" {{($inactivos['transacciones']->red == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Link personal</h4>
        <input type="checkbox" name="link" {{($inactivos['transacciones']->link == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
    </div>
    
    
    <div class="col-md-12">
          <h3>Billetera</h3>
          <div class="col-md-4">
          <h4>Estatus</h4>
        <input type="checkbox" name="bille" {{($inactivos['billetera']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Billetera</h4>
        <input type="checkbox" name="billetera" {{($inactivos['billetera']->billetera == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Transferencia</h4>
        <input type="checkbox" name="transferencia" {{($inactivos['billetera']->transferencia == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Corte</h4>
        <input type="checkbox" name="corte" {{($inactivos['billetera']->corte == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Canje</h4>
        <input type="checkbox" name="canje" {{($inactivos['billetera']->canje == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
    </div>

   <div class="col-md-12">
          <h3>Informes</h3>
          <div class="col-md-4">
          <h4>Estatus</h4>
        <input type="checkbox" name="info" {{($inactivos['informes']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Activacion</h4>
        <input type="checkbox" name="activo" {{($inactivos['informes']->activacion == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Comisiones</h4>
        <input type="checkbox" name="comisiones" {{($inactivos['informes']->comisiones == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Liquidacion</h4>
        <input type="checkbox" name="liquidacion" {{($inactivos['informes']->liquidacion == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Reporte Comisiones</h4>
        <input type="checkbox" name="repor_comision" {{($inactivos['informes']->repor_comisiones == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Afiliados</h4>
        <input type="checkbox" name="afiliados" {{($inactivos['informes']->afiliados == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
    </div>
    
    
    <div class="col-md-4">
          <h3>Correo</h3>
          <h4>Estatus</h4>
        <input type="checkbox" name="correo" {{($inactivos['correos']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
    </div>
    
    <div class="col-md-4">
          <h3>Ranking</h3>
          <h4>Estatus</h4>
        <input type="checkbox" name="ranking" {{($inactivos['ranking']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
    </div> 
    
    
    <div class="col-md-12">
          <h3>Tickets</h3>
          <div class="col-md-4">
          <h4>Estatus</h4>
        <input type="checkbox" name="ticket" {{($inactivos['tickets']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Mis tickets</h4>
        <input type="checkbox" name="mios" {{($inactivos['tickets']->mios == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Generar tickets</h4>
        <input type="checkbox" name="generar" {{($inactivos['tickets']->generar == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
    </div>
        
        
        <div class="col-md-12">
          <h3>Tienda</h3>
          <div class="col-md-4">
          <h4>Estatus</h4>
        <input type="checkbox" name="tienda" {{($inactivos['tienda']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Productos</h4>
        <input type="checkbox" name="productos" {{($inactivos['tienda']->productos == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Informacion Bancaria</h4>
        <input type="checkbox" name="bancaria" {{($inactivos['tienda']->bancaria == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Soportes de Pago</h4>
        <input type="checkbox" name="pagos" {{($inactivos['tienda']->pagos == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Soporte Historial</h4>
        <input type="checkbox" name="lista_pagos" {{($inactivos['tienda']->lista_pagos == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Paypal</h4>
        <input type="checkbox" name="paypal" {{($inactivos['tienda']->paypal == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Paypal Pagos</h4>
        <input type="checkbox" name="paga_paypal" {{($inactivos['tienda']->paga_paypal == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
    </div>
    
    
    <div class="col-md-12">
          <h3>Herramientas</h3>
          <div class="col-md-4">
          <h4>Estatus</h4>
        <input type="checkbox" name="herramienta" {{($inactivos['herramientas']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Materiales</h4>
        <input type="checkbox" name="documentos" {{($inactivos['herramientas']->documentos == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Blog y Articulos</h4>
        <input type="checkbox" name="articulos" {{($inactivos['herramientas']->articulos == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Notas</h4>
        <input type="checkbox" name="notas" {{($inactivos['herramientas']->notas == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Activacion Correos</h4>
        <input type="checkbox" name="activacion_correos" {{($inactivos['herramientas']->activacion_correos == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
    </div>
        

               
               <button type="submit" class="btn btn-primary btn-block">Actualizar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> 