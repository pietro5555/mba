@if(!$presentations->isEmpty())
    <div class="m-1">
        @if (Auth::user()->rol_id == 2)
            @foreach($presentations as $presentation)
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-10">
                        <a href="{{route ('download_resource_file', [$event_id, $presentation->id])}}" class="btn btn-primary btn-block" target="_blank">{{$presentation->title}}</a>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-danger" href="javascript:;" onclick="deletePresentation({{$presentation->id}});" id="delete_presentation_submit-{{$presentation->id}}"><i class="fa fa-times"></i></a>
                        <button class="btn btn-danger" type="button" disabled id="delete_presentation_loader-{{$presentation->id}}" style="display: none;">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </button>
                    </div>
                </div>
            @endforeach
        @else
            @foreach($presentations as $presentation)
                <ul class="list-group">
                    <li><a href="{{route ('download_resource_file', [$event_id, $presentation->id])}}" class="btn btn-primary btn-block" target="_blank">{{$presentation->title}}</a></li>
                </ul>
            @endforeach
        @endif
    </div>
@endif