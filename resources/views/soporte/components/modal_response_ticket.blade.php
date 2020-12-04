<!-- Modal Responder Ticket-->
<div class="modal fade" id="modal-ticket-response" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Responder Ticket</h5>
                </div>
            <form action="{{route('admin.soporte.response.ticket')}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="modal-body">
                      <div class="container-fluid" id="content-modal">
                          <input type="hidden" name="ticket_id" id="ticket_id" >
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Asunto del Ticket</label>
                                  <input type="text" class="form-control" name="titulo" id="titulo" disabled>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Descripción</label>
                                  <textarea class="ckeditor form-control" name="comentario" id="comentario" disabled></textarea>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Respuesta</label>
                                  <textarea class="ckeditor form-control" name="response" id="response" required></textarea>
                              </div>
                          </div>
                      </div>
                  </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
          </div>
        </div>
  </div>
