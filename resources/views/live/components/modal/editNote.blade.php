<!-- Modal Editar Nota -->
<div class="modal fade" id="modal-edit-note" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Anotación</h5>
            </div>
            <form id="update_note_form">
                {{ csrf_field() }}
                <input type="hidden" name="note_id" id="id-note">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group notes-form-title">
                                    <input type="text" class="col-md-6" name="title" id="title-note" required style="background-color: #363840;">
                                </div>
                                <div class="form-group notes-form-content">
                                    <textarea class="form-control" id="content-note" name="content" required rows="3" style="background-color: #363840;"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-success" onclick="updateNote();" id="update_note_submit">Guardar Cambios</a>
                    <button class="btn btn-success" type="button" disabled id="update_note_loader" style="display: none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Espere...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
