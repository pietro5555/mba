<!-- Modal Agregar recursos video -->
<div class="modal fade" id="modal-settings-video" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar video</h5>
            </div>
            <form id="store_video_form">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Link del Video</label>
                                    <input type="text" class="form-control"
                                        placeholder="https://www.youtube.com/embed/X4VRKMZf4Uc" name="url_video"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="type" value='video' required>
                    <input type="hidden" name="event_id" value='{{$event->id}}' >

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-success" onclick="newVideo();">Enviar</a>
                </div>
            </form>
        </div>
    </div>
</div>
