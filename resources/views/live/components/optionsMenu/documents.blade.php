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
                                    @if (Auth::user()->rol_id == 2)
                                        @foreach($files as $file)
                                            <div class="row" style="padding-bottom: 10px;">
                                                <div class="col-10">
                                                    <a href="{{route ('download_resource_file', [$event->id, $file->id])}}" class="btn btn-primary btn-block" target="_blank">{{$file->title}}</a>
                                                </div>
                                                <div class="col-2">
                                                    <a class="btn btn-danger" href="javascript:;" onclick="deleteFile({{$file->id}});" id="delete_file_submit-{{$file->id}}"><i class="fa fa-times"></i></a>
                                                    <button class="btn btn-danger" type="button" disabled id="delete_file_loader-{{$file->id}}" style="display: none;">
                                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        @foreach($files as $file)
                                            <ul class="list-group">
                                                <a href="{{route ('download_resource_file', [$event->id, $file->id])}}" class="btn btn-primary btn-block" target="_blank">{{$file->title}}</a>
                                            </ul>
                                        @endforeach
                                    @endif
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

