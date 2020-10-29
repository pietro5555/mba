@if(!$presentations->isEmpty())
    <h4>Presentaciones</h4>
    <div class="m-1">
        <ul class="list-group">
            @foreach($presentations as $presentation)
                 <a href="{{route ('download_resource_file', [$event_id, $presentation->id])}}" class="btn btn-primary btn-block" target="_blank">{{$presentation->title}}</a>
            @endforeach
        </ul>
    </div>
@endif