	<div class="modal fade" id="modal-edit-note" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modificar mis notas</h5>
                </div>
                <form action="{{route('anotaciones.user.edit', $note->id)}}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="modal-body">
                      <div class="container-fluid" id="content-modal">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Título</label>
                                  <input type="text" class="form-control" name="title" id="title" required>
                                  <span id="titleError" class="alert-message"></span>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Descripción</label>
                                  <textarea class="ckeditor form-control" name="description" id="description"></textarea>
                                  <span id="descriptionError" class="alert-message"></span>
                              </div>
                          </div>
                      </div>
                  </div>
                  <input type="hidden" name="note_id" id="note_id" value="">
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
          </div>
        </div>
  </div>
