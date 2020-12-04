<!-- Modal Editar Ticket-->
<div class="modal fade" id="modal-ticket-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modificar Ticket</h5>
                </div>
            <form action="{{route('admin.soporte.update.ticket')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="modal-body">
                      <div class="container-fluid" id="content-modal">
                          <input type="hidden" name="ticket_id" id="ticket_id" >
                          <div class="col-md-12">
                                <div class="form-group">
                                    <label>Tipo de ticket</label>
                                    <select class="form-control select2" name="tipo" id="tipo" required style="background:none!important;">
                                            <option value="" class="text-negro" disabled>Selecciones una opción</option>
                                            <option value="General" class="text-negro">Consulta general</option>
                                            <option value="Academia" class="text-negro">Academia</option>
                                            <option value="Afiliados" class="text-negro">Afiliados</option>

                                    </select>
                                </div>
                            </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Asunto del Ticket</label>
                                  <input type="text" class="form-control" name="titulo" id="titulo" required>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Comentario</label>
                                  <textarea class="ckeditor form-control" name="comentario" id="comentario" required></textarea>
                              </div>
                          </div>
                          <div class="col-md-12">
                                <div class="form-group">
                                       <label>Subir Archivo</label><br>
                                        <input type="file" id="fileUpload" name="archivo">
                                </div>
                           </div>
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
