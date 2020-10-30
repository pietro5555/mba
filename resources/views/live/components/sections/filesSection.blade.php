@if(!$files->isEmpty())
                                <div class="m-1">
                                    @if (Auth::user()->rol_id == 2)
                                        @foreach($files as $file)
                                            <div class="row" style="padding-bottom: 10px;">
                                                <div class="col-10">
                                                    <a href="{{route ('download_resource_file', [$event_id, $file->id])}}" class="btn btn-primary btn-block" target="_blank">{{$file->title}}</a>
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
                                                <a href="{{route ('download_resource_file', [$event_id, $file->id])}}" class="btn btn-primary btn-block" target="_blank">{{$file->title}}</a>
                                            </ul>
                                        @endforeach
                                    @endif
                                </div>
                            @endif