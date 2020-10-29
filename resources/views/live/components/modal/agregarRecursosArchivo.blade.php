<!-- Modal Agregar recursos file -->
<div class="modal fade" id="modal-settings-file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Archivos</h5>
            </div>
            <form enctype="multipart/form-data" id="store_file_form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Seleccione un Archivo</label>
                                    <input type="file" class="form-control" name="file" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="type" value='file' required>
                    <input type="hidden" name="event_id" value="{{ $event->id }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-success" onclick="newFile();">Enviar</a>
                </div>
            </form>
        </div>
    </div>
</div>
