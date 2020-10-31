<!-- Modal Agregar recursos presentation -->
<div class="modal fade" id="modal-settings-presentation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Memoria</h5>
            </div>
            <form enctype="multipart/form-data" id="store_presentation_form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Seleccione la memoria</label>
                                    <input type="file" class="form-control" name="presentation" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="type" value='presentation' required>
                    <input type="hidden" name="event_id" value="{{ $event->id }}">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-success" onclick="newPresentation();" id="store_presentation_submit">Enviar</a>
                    <button class="btn btn-success" type="button" disabled id="store_presentation_loader" style="display: none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Espere...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
