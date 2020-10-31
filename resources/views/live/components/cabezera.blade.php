<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 d-flex">
            <div class="row d-flex align-items-center mb-0">
                <div class="col-12 col-md-4 text-blue">
                    <h5>{{ $event->title }} <br> ({{$event->mentor->display_name}})</h5>
                </div>
                <div class="col-12 col-md-5">
                    <div class="nav nav-pills mt-2 menu-vertical-anotaciones" id="v-pills-tab" role="tablist" style="padding-left: 20px;">
                        <!--<a class="nav-link text-white text-center" id="v-pills-messages-tab" data-toggle="modal" href="#option-modal-chat" role="tab" aria-selected="false">
                            <img src="https://mybusinessacademypro.com/academia/images/icons/comment.svg" height="30px" class="">
                            <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Chat</h6>
                        </a>-->
                        @if(Auth::user()->rol_id == 2)
                            <a class="nav-link  text-white text-center" id="v-pills-settings-tab" data-toggle="modal" href="#option-modal-settings" role="tab" aria-selected="true">
                                <img src="{{ asset('images/icons/settings.svg') }}" height="30px" class="">
                                <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Configuraci&oacute;n</h6>
                            </a>
                        @endif
                        @foreach($menuResource as $resource)
                            @if($resource->resources_id ==4 && $resource->status==1)
                                <a class="nav-link text-white text-center" id="v-pills-survey-tab" data-toggle="modal" href="#option-modal-survey" role="tab"  aria-selected="false">
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
                                <a class="nav-link text-white text-center" id="v-pills-offers-tab" data-toggle="modal" href="#option-modal-offer"
                                    role="tab" aria-controls="v-pills-offers" aria-selected="false">
                                    <img src="{{ asset('images/icons/descuento.svg') }}" height="30px" class="">
                                    <h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Ofertas</h6>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-md-2">
                    <div class="row justify-content-end">
                        <div class="nav nav-pills mt-2 pl-4 pr-4 menu-vertical-anotaciones" role="tablist">
                            <a class="nav-link text-white text-center" id="v-pills-messages-tab" data-toggle="modal" href="#option-modal-chat" onclick="refreshChat();" role="tab" aria-selected="false">
                                <img src="https://mybusinessacademypro.com/academia/images/icons/comment.svg" height="30px" class=""> 
                                <span class="badge badge-pill badge-danger" id="badge-chat" style="display: none;"><i class="far fa-comment"></i></span>
                                <!--<h6 class="text-center d-none d-sm-none d-md-block" style="font-size:10px;">Chat</h6>-->
                            </a>
                        </div>
                    </div>
                    <!--<div class="row justify-content-end">
                        <div class="">
                            <h5 class="title-level">Nivel: {{$event->subcategory->title}}</h5>
                        </div>

                        <div class="p-2">
                            <a href="https://m.facebook.com/MyBusinessAcademyPro/"
                                class="btn btn-social-icon ml-2 mr-2 btn-facebook btn-rounded" target="_blank">
                                <img src="{{ asset('images/icons/facebook.svg') }}" height="20px" width="20px">
                            </a>
                            <a href="" class="btn btn-social-icon ml-2 mr-2 btn-twitter btn-rounded" target="_blank">
                                <img src="{{ asset('images/icons/twitter.svg') }}" height="20px" width="20px">
                            </a>
                            <a href="https://instagram.com/mybusinessacademypro?igshid=tdj5prrv1gx1"
                                class="btn btn-social-icon ml-2 mr-2 btn-instagram btn-rounded" target="_blank">
                                <img src="{{ asset('images/icons/instagram.svg') }}" height="20px" width="20px">
                            </a>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
