<div class="modal fade" id="option-modal-document" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Archivos</h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12" id="files_section">
                            @if(!$files->isEmpty())
                                <div class="m-1">
                                    <ul class="list-group">
                                        @foreach($files as $file)
                                            <a href="{{route ('download_resource_file', [$event->id, $file->id])}}" class="btn btn-primary btn-block" target="_blank">{{$file->title}}</a>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

