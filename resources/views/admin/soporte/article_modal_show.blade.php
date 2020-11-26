<div class="modal fade" id="modal-article-show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Artículo completo</h5>
                </div>
                <form action="" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="modal-body">
                      <div class="container-fluid" id="content-modal">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Título</label>
                                  <input type="text" class="form-control" name="article_title_show" id="article_title_show" disabled>
                              </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Descripción</label>
                                  <textarea class="ckeditor form-control" name="article_description_show" id="article_description_show" disabled></textarea>
                              </div>
                          </div>
                      </div>
                  </div>
                  <input type="hidden" name="article_id_show" id="article_id_show" value="">
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
          </div>
        </div>
  </div>
