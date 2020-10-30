<!-- Modal Agregar Ofertas-->
<div class="modal fade" id="modal-settings-offers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar oferta</h5>
            </div>
            <form enctype="multipart/form-data" id="store_offer_form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Titulo</label>
                                    <input type="text" name="title" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Precio</label>
                                    <input type="number" min="1" name="price" class="form-control" required />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Imagen</label>
                                    <input type="file" name="resource" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="type" value='offers' required>
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <a class="btn btn-success" onclick="newOffer();" id="store_offer_submit">Enviar</a>
                    <button class="btn btn-success" type="button" disabled id="store_offer_loader" style="display: none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Espere...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
