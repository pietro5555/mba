 @if(!empty($resources_video))
    <div class="embed-responsive embed-responsive-16by9">
        <iframe src="{!! $resources_video->url !!}"></iframe>
    </div>
@endif