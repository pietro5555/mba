<!-- Modal Editar Ticket-->
<div class="modal fade" id="modal-ticket-show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Información completa del Ticket</h5>
                </div>
            <form action="" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="modal-body">
                      <div class="container-fluid" id="content-modal">
                          <input type="hidden" name="ticket_id" id="ticket_id" >
                          <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tipo de ticket</label>
                                    <input type="text" class="form-control" name="tipo_edit" id="tipo_edit" disabled>
                                </div>
                            </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Asunto del Ticket</label>
                                  <input type="text" class="form-control" name="titulo_edit" id="titulo_edit" disabled>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Comentario</label>
                                  <textarea class="ckeditor form-control" name="comentario_edit" id="comentario_edit" disabled></textarea>
                              </div>
                          </div>
                          <!--<div class="col-md-12">
                                <div class="form-group">
                                       <label>Archivo</label><br>
                                       <div class="col-md-8">
                                            <input type="text" class="form-control" name="archivo_edit" id="archivo_edit" disabled>
                                       </div>
                                        
                                        <button class="btn btn-info">Descargar</button>
                                </div>
                           </div>-->
                      </div>
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
          </div>
        </div>
  </div>
