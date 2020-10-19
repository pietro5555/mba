<!-- Modal Agregar Curso-->
<div class="modal fade" id="modal-asignia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Crear Curso</h5>
            </div>
            <form action="{{ route('insignia.store') }}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="modal-body">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Curso</label>
                                  <select class="form-control" name="course_id" required>
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
                                <select class="form-control" name="nivel_id" required>
                                    <option value="" selected disabled>Seleccione una membresia..</option>
                                    @foreach ($membresias as $membresia)
                                        <option value="{{ $membresia->id }}">{{ $membresia->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Imagen Insignia</label>
                                  <input type="file" class="form-control" name="img_insignia" readonly>
                              </div>
                          </div>
                      </div>
                  </div>

              </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Asignar Insignia</button>
                </div>
            </form>
      </div>
    </div>
</div>