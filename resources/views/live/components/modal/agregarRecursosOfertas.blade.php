<!-- Modal Agregar Ofertas-->
<div class="modal fade" id="modal-settings-offers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar oferta</h5>
            </div>
            <form action="{{ route('set.event.store', [$event->id]) }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="">Recurso</label>
                                    <input type="file" name="resource" class="form-control" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="type" value='offers' required>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
