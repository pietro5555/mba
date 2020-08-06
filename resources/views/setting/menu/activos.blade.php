<div class="modal fade" id="activos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menu Activo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('setting-menu-cambio')}}" method="post">
          {{ csrf_field() }}
          
    <input type="hidden" name="tipos" value="activos">      

     <div class="col-md-4">
          <h3>Inicio</h3>
          <h4>Estatus</h4>
        <input type="checkbox" name="inicio" {{($activos['inicio']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
    </div>
    
    <div class="col-md-4">
          <h3>Actualizar</h3>
          <h4>Estatus</h4>
        <input type="checkbox" name="actualizar" {{($activos['actualizar']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
    </div> 
    
    
    <div class="col-md-4">
          <h3>Registro</h3>
          <h4>Estatus</h4>
        <input type="checkbox" name="registro" {{($activos['registro']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
    </div>
    
    
    <div class="col-md-4">
          <h3>Registro Cliente</h3>
          <h4>Estatus</h4>
        <input type="checkbox" name="registro_cliente" {{($activos['registro_cliente']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
    </div>
    
     <div class="col-md-4">
          <h3>Calendario</h3>
          <h4>Estatus</h4>
        <input type="checkbox" name="calendario" {{($activos['calendario']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
    </div>
    
    <div class="col-md-4">
          <h3>Prospeccion</h3>
          <h4>Estatus</h4>
        <input type="checkbox" name="prospeccion" {{($activos['prospeccion']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
    </div>
    
    <div class="col-md-12">
          <h3>Red de Usuarios</h3>
          <div class="col-md-4">
          <h4>Estatus</h4>
        <input type="checkbox" name="red_usuario" {{($activos['red']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Arbol de Usuario</h4>
        <input type="checkbox" name="arbol" {{($activos['red']->usuario == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Arbol de Cliente</h4>
        <input type="checkbox" name="arbol_cliente" {{($activos['red']->cliente == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Registro directos</h4>
        <input type="checkbox" name="directos" {{($activos['red']->directos == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Registro red</h4>
        <input type="checkbox" name="red" {{($activos['red']->red == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
    </div>
    
    
    
     <div class="col-md-12">
          <h3>Transacciones</h3>
          <div class="col-md-4">
          <h4>Estatus</h4>
        <input type="checkbox" name="tran" {{($activos['transacciones']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Personales</h4>
        <input type="checkbox" name="personales" {{($activos['transacciones']->personales == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Red</h4>
        <input type="checkbox" name="red_tran" {{($activos['transacciones']->red == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Link personal</h4>
        <input type="checkbox" name="link" {{($activos['transacciones']->link == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
    </div>
    
    
    <div class="col-md-12">
          <h3>Billetera</h3>
          <div class="col-md-4">
          <h4>Estatus</h4>
        <input type="checkbox" name="bille" {{($activos['billetera']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Billetera</h4>
        <input type="checkbox" name="billetera" {{($activos['billetera']->billetera == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Transferencia</h4>
        <input type="checkbox" name="transferencia" {{($activos['billetera']->transferencia == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Corte</h4>
        <input type="checkbox" name="corte" {{($activos['billetera']->corte == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Canje</h4>
        <input type="checkbox" name="canje" {{($activos['billetera']->canje == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
    </div>

   <div class="col-md-12">
          <h3>Informes</h3>
          <div class="col-md-4">
          <h4>Estatus</h4>
        <input type="checkbox" name="info" {{($activos['informes']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Activacion</h4>
        <input type="checkbox" name="activo" {{($activos['informes']->activacion == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Comisiones</h4>
        <input type="checkbox" name="comisiones" {{($activos['informes']->comisiones == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Liquidacion</h4>
        <input type="checkbox" name="liquidacion" {{($activos['informes']->liquidacion == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Reporte Comisiones</h4>
        <input type="checkbox" name="repor_comision" {{($activos['informes']->repor_comisiones == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Afiliados</h4>
        <input type="checkbox" name="afiliados" {{($activos['informes']->afiliados == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
    </div>
    
    
    <div class="col-md-4">
          <h3>Correo</h3>
          <h4>Estatus</h4>
        <input type="checkbox" name="correo" {{($activos['correos']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
    </div>
    
    <div class="col-md-4">
          <h3>Ranking</h3>
          <h4>Estatus</h4>
        <input type="checkbox" name="ranking" {{($activos['ranking']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
    </div> 
    
    
    <div class="col-md-12">
          <h3>Tickets</h3>
          <div class="col-md-4">
          <h4>Estatus</h4>
        <input type="checkbox" name="ticket" {{($activos['tickets']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Mis tickets</h4>
        <input type="checkbox" name="mios" {{($activos['tickets']->mios == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Generar tickets</h4>
        <input type="checkbox" name="generar" {{($activos['tickets']->generar == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
    </div>
        
        
        <div class="col-md-12">
          <h3>Tienda</h3>
          <div class="col-md-4">
          <h4>Estatus</h4>
        <input type="checkbox" name="tienda" {{($activos['tienda']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Productos</h4>
        <input type="checkbox" name="productos" {{($activos['tienda']->productos == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Informacion Bancaria</h4>
        <input type="checkbox" name="bancaria" {{($activos['tienda']->bancaria == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Soportes de Pago</h4>
        <input type="checkbox" name="pagos" {{($activos['tienda']->pagos == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Soporte Historial</h4>
        <input type="checkbox" name="lista_pagos" {{($activos['tienda']->lista_pagos == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Paypal</h4>
        <input type="checkbox" name="paypal" {{($activos['tienda']->paypal == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Paypal Pagos</h4>
        <input type="checkbox" name="paga_paypal" {{($activos['tienda']->paga_paypal == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
    </div>
    
    
    <div class="col-md-12">
          <h3>Herramientas</h3>
          <div class="col-md-4">
          <h4>Estatus</h4>
        <input type="checkbox" name="herramienta" {{($activos['herramientas']->activo == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Materiales</h4>
        <input type="checkbox" name="documentos" {{($activos['herramientas']->documentos == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Blog y Articulos</h4>
        <input type="checkbox" name="articulos" {{($activos['herramientas']->articulos == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Notas</h4>
        <input type="checkbox" name="notas" {{($activos['herramientas']->notas == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
        </div>
        
        <div class="col-md-4">
        <h4>Activacion Correos</h4>
        <input type="checkbox" name="activacion_correos" {{($activos['herramientas']->activacion_correos == 0) ? '' : 'checked' }} data-toggle="toggle" data-on="Activo" data-off="Inactivo" data-onstyle="info" data-offstyle="danger" data-width="100">
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