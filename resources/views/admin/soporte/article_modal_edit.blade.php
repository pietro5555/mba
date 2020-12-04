<!-- Modal Editar Artículo-->
<div class="modal fade" id="modal-article-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modificar Artículo</h5>
                </div>
                <form action="{{ route('admin.soporte.update.article') }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="modal-body">
                      <div class="container-fluid" id="content-modal">
                          <input type="hidden" name="article_id" id="article_id" >
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Título del Artículo</label>
                                  <input type="text" class="form-control" name="title" id="title" required>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Descripción</label>
                                  <textarea class="ckeditor form-control" name="description" id="description" required></textarea>
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
