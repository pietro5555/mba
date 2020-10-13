@if(!$files->isEmpty())
<h4>Archivos</h4>
<div class="m-1">
    <ul class="list-group">
        @foreach($files as $file)
        <a href="{{route ('download_resource_file', [$event->id, $file->id])}}"
            class="btn btn-primary btn-block">{{$file->title}}</a>
        @endforeach
    </ul>
</div>

@endif
