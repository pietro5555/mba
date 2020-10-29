
<a class="nav-link text-white text-center" id="v-pills-messages-tab" data-toggle="modal" href="#option-modal-chat" role="tab" aria-selected="false">
    <img src="https://mybusinessacademypro.com/academia/images/icons/comment.svg" height="30px" class="">
    <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Chat</h6>
</a>
@if(Auth::user()->rol_id == 2)
    <a class="nav-link  text-white text-center" id="v-pills-settings-tab" data-toggle="modal" href="#option-modal-settings" role="tab" aria-selected="true">
        <img src="{{ asset('images/icons/settings.svg') }}" height="30px" class="">
        <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Configuraci&oacute;n</h6>
    </a>
 @endif
@foreach($menuResource as $resource)
    @if($resource->resources_id ==4 && $resource->status==1)
        <a class="nav-link text-white text-center" id="v-pills-survey-tab" data-toggle="modal" href="#option-modal-survey" role="tab" aria-selected="false">
            <img src="{{ asset('images/icons/lista.svg') }}" height="30px" class="">
            <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Encuesta</h6>
        </a>
    @endif
    @if($resource->resources_id ==5 && $resource->status==1)
        <a class="nav-link text-white text-center" id="v-pills-presentation-tab" data-toggle="modal" href="#option-modal-presentation" role="tab" aria-selected="false">
            <img src="{{ asset('images/icons/presentacion.svg') }}" height="30px" class="">
            <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Memorias</h6>
        </a>
    @endif
    @if($resource->resources_id ==6 && $resource->status==1)
        <a class="nav-link text-white text-center" id="v-pills-video-tab" data-toggle="modal" href="#option-modal-video" role="tab" aria-selected="false">
            <img src="{{ asset('images/icons/video.svg') }}" height="30px" class="">
            <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Video</h6>
        </a>
    @endif
    @if($resource->resources_id ==7 && $resource->status==1)
        <a class="nav-link text-white text-center" id="v-pills-documents-tab" data-toggle="modal" href="#option-modal-document" role="tab" aria-selected="false">
            <img src="{{ asset('images/icons/documentos.svg') }}" height="30px" class="">
            <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Archivos</h6>
        </a>
    @endif
    @if($resource->resources_id ==8 && $resource->status==1)
        <a class="nav-link text-white text-center" id="v-pills-offers-tab" data-toggle="modal" href="#option-modal-offer" role="tab" aria-controls="v-pills-offers" aria-selected="false">
            <img src="{{ asset('images/icons/descuento.svg') }}" height="30px" class="">
            <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Ofertas</h6>
        </a>
    @endif
 @endforeach