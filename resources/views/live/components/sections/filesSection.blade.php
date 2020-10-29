@if(!$files->isEmpty())
                                <div class="m-1">
                                    <ul class="list-group">
                                        @foreach($files as $file)
                                            <a href="{{route ('download_resource_file', [$event_id, $file->id])}}" class="btn btn-primary btn-block" target="_blank">{{$file->title}}</a>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif