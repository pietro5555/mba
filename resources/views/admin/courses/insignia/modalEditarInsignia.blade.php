<!-- Modal Agregar Curso-->
<div class="modal fade" id="modal-asignia-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Crear Curso</h5>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" id="form_edit">
              {{ csrf_field() }}
              @method('put')
              <div class="modal-body">
                  <div class="container-fluid">
                      <div class="row">
                          <input type="hidden" name="">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Curso</label>
                                  <select class="form-control" name="course_id" required id="course">
                                      <option value="" selected disabled>Seleccione un curso..</option>
                                      @foreach ($courses as $course)
                                          <option value="{{ $course->id }}">{{ $course->title }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          
                          <div class="col-md-12">
                            <div class="form-group">
                                <label>Nivel</label>
                                <select class="form-control" name="nivel_id" required id="nivel">
                                    <option value="" selected disabled>Seleccione una membresia..</option>
                                    @foreach ($membresias as $membresia)
                                        <option value="{{ $membresia->id }}">{{ $membresia->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                    <h5 class="text-center">
                                        Insignia Actual <br>
                                        <img src="" alt="" id="img_actual" height="60" class="mb-1">
                                    </h5>
                                    <label>Imagen Insignia</label>
                                    <input type="file" class="form-control" name="img_insignia">
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Actualizar Insignia</button>
                </div>
            </form>
      </div>
    </div>
</div>