<div class="nav flex-column nav-pills mt-2 menu-vertical-anotaciones" id="v-pills-tab" role="tablist"
    aria-orientation="vertical">
    <a class="nav-link active text-white text-center" id="v-pills-messages-tab" data-toggle="pill"
        href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
        <img src="{{ asset('images/icons/comment.svg') }}" height="30px" class="">
        <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Chat</h6>
    </a>
    <!--Solo se muestra para mentores-->
    @if(Auth::user()->rol_id == 2)
    <a class="nav-link  text-white text-center" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings"
        role="tab" aria-controls="v-pills-settings" aria-selected="true">
        <img src="{{ asset('images/icons/settings.svg') }}" height="30px" class="">
        <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Configuración</h6>
    </a>
    <a class="nav-link text-white text-center" id="v-pills-students-tab" data-toggle="pill" href="#v-pills-students"
        role="tab" aria-controls="v-pills-students" aria-selected="false">
        <img src="{{ asset('images/icons/person.svg') }}" height="30px" class="">
        <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Participantes</h6>
    </a>
    @endif
    @foreach($menuResource as $resource)
    {{-- @if($resource->resources_id == 3 && $resource->status==1)
    <a class="nav-link active text-white text-center" id="v-pills-messages-tab" data-toggle="pill"
        href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"> <img
            src="{{ asset('images/icons/comment.svg') }}" height="30px" class="">
    <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Chat</h6>
    </a>
    @endif --}}
    @if($resource->resources_id ==4 && $resource->status==1)
    <a class="nav-link text-white text-center" id="v-pills-survey-tab" data-toggle="pill" href="#v-pills-survey"
        role="tab" aria-controls="v-pills-survey" aria-selected="false">
        <img src="{{ asset('images/icons/lista.svg') }}" height="30px" class="">
        <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Encuesta</h6>
    </a>
    @endif
    @if($resource->resources_id ==5 && $resource->status==1)
    <a class="nav-link text-white text-center" id="v-pills-presentation-tab" data-toggle="pill"
        href="#v-pills-presentation" role="tab" aria-controls="v-pills-presentation" aria-selected="false">
        <img src="{{ asset('images/icons/presentacion.svg') }}" height="30px" class="">
        <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Presentación</h6>
    </a>
    @endif
    @if($resource->resources_id ==6 && $resource->status==1)
    <a class="nav-link text-white text-center" id="v-pills-video-tab" data-toggle="pill" href="#v-pills-video"
        role="tab" aria-controls="v-pills-video" aria-selected="false">
        <img src="{{ asset('images/icons/video.svg') }}" height="30px" class="">
        <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Vídeo</h6>
    </a>
    @endif
    @if($resource->resources_id ==7 && $resource->status==1)
    <a class="nav-link text-white text-center" id="v-pills-documents-tab" data-toggle="pill" href="#v-pills-documents"
        role="tab" aria-controls="v-pills-documents" aria-selected="false">
        <img src="{{ asset('images/icons/documentos.svg') }}" height="30px" class="">
        <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Archivos</h6>
    </a>
    @endif
    @if($resource->resources_id ==8 && $resource->status==1)
    <a class="nav-link text-white text-center" id="v-pills-offers-tab" data-toggle="pill" href="#v-pills-offers"
        role="tab" aria-controls="v-pills-offers" aria-selected="false">
        <img src="{{ asset('images/icons/descuento.svg') }}" height="30px" class="">
        <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Ofertas</h6>
    </a>
    @endif
    @endforeach
</div>
