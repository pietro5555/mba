
@extends('layouts.landing')

@push('scripts')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        function refreshChat(){
            $("#badge-chat").css('display', 'none');
        }
        function refreshVideo(){
            $("#badge-video").css('display', 'none');
        }
        function refreshPresentation(){
            $("#badge-presentation").css('display', 'none');
        }
        function refreshFile(){
            $("#badge-file").css('display', 'none');
        }
        function refreshOffer(){
            $("#badge-offer").css('display', 'none');
        }
        function refreshSurvey(){
            $("#badge-survey").css('display', 'none');
        }
        
        function newNote(){
            var route = "https://mybusinessacademypro.com/academia/anotaciones/store";
            var parametros = $('#store_note_form').serialize();
            $.ajax({
                url:route,
                type:'POST',
                data:  parametros,
                success:function(ans){
                    $("#notes_section").html(ans);
                }
            });
        }
        
        function newPresentation(){
            $("#store_presentation_submit").css('display', 'none');
            $("#store_presentation_loader").css('display', 'block');
            var route = "https://mybusinessacademypro.com/academia/settings/event";
            var form = $('#store_presentation_form')[0];
            var parametros = new FormData(form);
            $.ajax({
                url:route,
                type:'POST',
                data:  parametros,
                processData: false,
                contentType: false,
                success:function(ans){
                    $("#store_presentation_loader").css('display', 'none');
                    $("#store_presentation_submit").css('display', 'block');
                    if (ans == false){
                        $("#msj-success-ajax").css('display', 'none');
                        $("#modal-settings-presentation").modal("hide");
                        $("#option-modal-settings").modal("hide");
                        $("#msj-error-text").html("Hubo un error al cargar la memoria");
                        $("#msj-error-ajax").css('display', 'block');
                    }else{
                        $("#msj-error-ajax").css('display', 'none');
                        $("#modal-settings-presentation").modal("hide");
                        $("#option-modal-settings").modal("hide");
                        $("#msj-success-text").html("La memoria ha sido agregada con éxito");
                        $("#msj-success-ajax").css('display', 'block');
                        //$("#presentations_section").html(ans);
                        refreshMenu();
                        refreshPresentationSection(false);
                    }
                }
            });
        }
        
        function newVideo(){
            $("#store_video_submit").css('display', 'none');
            $("#store_video_loader").css('display', 'block');
            var route = "https://mybusinessacademypro.com/academia/settings/event";
            var parametros = $('#store_video_form').serialize();
            $.ajax({
                url:route,
                type:'POST',
                data:  parametros,
                success:function(ans){
                    $("#store_video_loader").css('display', 'none');
                    $("#store_video_submit").css('display', 'block');
                    if (ans == false){
                        $("#msj-success-ajax").css('display', 'none');
                        $("#modal-settings-video").modal("hide");
                        $("#option-modal-settings").modal("hide");
                        $("#msj-error-text").html("Hubo un error al cargar el video");
                        $("#msj-error-ajax").css('display', 'block');
                    }else{
                        $("#msj-error-ajax").css('display', 'none');
                        $("#modal-settings-video").modal("hide");
                        $("#option-modal-settings").modal("hide");
                        $("#msj-success-text").html("El video ha sido agregado con éxito");
                        $("#msj-success-ajax").css('display', 'block');
                        //$("#videos_section").html(ans);
                        refreshMenu();
                        refreshVideoSection(false);
                    }
                }
            });
        }
        
        function newFile(){
            $("#store_file_submit").css('display', 'none');
            $("#store_file_loader").css('display', 'block');
            var route = "https://mybusinessacademypro.com/academia/settings/event";
            var form = $('#store_file_form')[0];
            var parametros = new FormData(form);
            $.ajax({
                url:route,
                type:'POST',
                data:  parametros,
                processData: false,
                contentType: false,
                success:function(ans){
                    $("#store_file_loader").css('display', 'none');
                    $("#store_file_submit").css('display', 'block');
                    if (ans == false){
                        $("#msj-success-ajax").css('display', 'none');
                        $("#modal-settings-file").modal("hide");
                        $("#option-modal-settings").modal("hide");
                        $("#msj-error-text").html("Hubo un error al cargar el archivo");
                        $("#msj-error-ajax").css('display', 'block');
                    }else{
                        $("#msj-error-ajax").css('display', 'none');
                        $("#modal-settings-file").modal("hide");
                        $("#option-modal-settings").modal("hide");
                        $("#msj-success-text").html("El archivo ha sido agregado con éxito");
                        $("#msj-success-ajax").css('display', 'block');
                        refreshMenu();
                        refreshFileSection(false);
                    }
                    
                }
            });
        }
        
        function newOffer(){
            $("#store_offer_submit").css('display', 'none');
            $("#store_offer_loader").css('display', 'block');
            var route = "https://mybusinessacademypro.com/academia/settings/event";
            var form = $('#store_offer_form')[0];
            var parametros = new FormData(form);
            $.ajax({
                url:route,
                type:'POST',
                data:  parametros,
                processData: false,
                contentType: false,
                success:function(ans){
                    $("#store_offer_loader").css('display', 'none');
                    $("#store_offer_submit").css('display', 'block');
                    if (ans == false){
                        $("#msj-success-ajax").css('display', 'none');
                        $("#modal-settings-offers").modal("hide");
                        $("#option-modal-settings").modal("hide");
                        $("#msj-error-text").html("Hubo un error al crear la oferta");
                        $("#msj-error-ajax").css('display', 'block');
                    }else{
                        $("#msj-error-ajax").css('display', 'none');
                        $("#modal-settings-offers").modal("hide");
                        $("#option-modal-settings").modal("hide");
                        $("#msj-success-text").html("La oferta ha sido creada con éxito");
                        $("#msj-success-ajax").css('display', 'block');
                        //$("#offers_section").html(ans);
                        refreshMenu();
                        refreshOfferSection(false);
                    }
                }
            });
        }
        
        function newResponseSurvey(){
            $("#survey_response_submit").css('display', 'none');
            $("#survey_response_loader").css('display', 'block');
            var route = "https://mybusinessacademypro.com/academia/survey";
            var form = $('#survey_response_form')[0];
            var parametros = new FormData(form);
            $.ajax({
                url:route,
                type:'POST',
                data:  parametros,
                processData: false,
                contentType: false,
                success:function(ans){
                    $("#survey_response_loader").css('display', 'none');
                    $("#survey_response_submit").css('display', 'block');
                    if (ans == false){
                        $("#msj-success-ajax").css('display', 'none');
                        $("#option-modal-survey").modal("hide");
                        $("#msj-error-text").html("Hubo un error al responder las encuestas");
                        $("#msj-error-ajax").css('display', 'block');
                    }else{
                        $("#msj-error-ajax").css('display', 'none');
                        $("#option-modal-survey").modal("hide");
                        $("#msj-success-text").html("Las respuestas han sido guardadas con éxito");
                        $("#msj-success-ajax").css('display', 'block');
                        refreshSurveySection(false);
                    }
                }
            });
        }
        
        function deletePresentation($presentation){
            $("#delete_presentation_submit-"+$presentation).css('display', 'none');
            $("#delete_presentation_loader-"+$presentation).css('display', 'block');
            var route = "https://mybusinessacademypro.com/academia/settings/event/delete";
            $("#resource_type").val('presentation');
            $("#resource_id").val($presentation);
            var parametros = $('#delete_resource_form').serialize();
            $.ajax({
                url:route,
                type:'POST',
                data:  parametros,
                success:function(ans){
                    $("#delete_presentation_loader-"+$presentation).css('display', 'none');
                    $("#delete_presentation_submit-"+$presentation).css('display', 'block');
                    $("#msj-error-ajax").css('display', 'none');
                    $("#option-modal-presentation").modal("hide");
                    $("#msj-success-text").html("La memoria ha sido eliminada con éxito");
                    $("#msj-success-ajax").css('display', 'block');
                    refreshMenu();
                    refreshPresentationSection(false);
                }
            });
        }
        
        function deleteFile($file){
            $("#delete_file_submit-"+$file).css('display', 'none');
            $("#delete_file_loader-"+$file).css('display', 'block');
            var route = "https://mybusinessacademypro.com/academia/settings/event/delete";
            $("#resource_type").val('file');
            $("#resource_id").val($file);
            var parametros = $('#delete_resource_form').serialize();
            $.ajax({
                url:route,
                type:'POST',
                data:  parametros,
                success:function(ans){
                    $("#delete_file_loader-"+$file).css('display', 'none');
                    $("#delete_file_submit-"+$file).css('display', 'block');
                    $("#msj-error-ajax").css('display', 'none');
                    $("#option-modal-document").modal("hide");
                    $("#msj-success-text").html("El archivo ha sido eliminado con éxito");
                    $("#msj-success-ajax").css('display', 'block');
                    refreshMenu();
                    refreshFileSection(false);
                }
            });
        }
        
        function refreshMenu(){
            var route = "https://mybusinessacademypro.com/academia/refresh-menu/{{Auth::user()->ID}}/{{$event->id}}";
            $.ajax({
                url:route,
                type:'GET',
                success:function(ans){
                    $("#v-pills-tab").html(ans);
                }
            });
        }
        
        function refreshVideoSection($notification){
            var route = "https://mybusinessacademypro.com/academia/refresh-video-section/{{$event->id}}";
            $.ajax({
                url:route,
                type:'GET',
                success:function(ans){
                    $("#videos_section").html(ans);
                    if ($notification == true){
                        $("#badge-video").css('display', 'block');
                    }
                }
            });
        }

        function refreshPresentationSection($notification){
            var route = "https://mybusinessacademypro.com/academia/refresh-presentation-section/{{$event->id}}";
            $.ajax({
                url:route,
                type:'GET',
                success:function(ans){
                    $("#presentations_section").html(ans);
                    if ($notification == true){
                        $("#badge-presentation").css('display', 'block');
                    }
                }
            });
        }

        function refreshFileSection($notification){
            var route = "https://mybusinessacademypro.com/academia/refresh-file-section/{{$event->id}}";
            $.ajax({
                url:route,
                type:'GET',
                success:function(ans){
                    $("#files_section").html(ans);
                    if ($notification == true){
                        $("#badge-file").css('display', 'block');
                    }
                }
            });
        }

        function refreshOfferSection($notification){
            var route = "https://mybusinessacademypro.com/academia/refresh-offer-section/{{$event->id}}";
            $.ajax({
                url:route,
                type:'GET',
                success:function(ans){
                    $("#offers_section").html(ans);
                    if ($notification == true){
                        $("#badge-offer").css('display', 'block');
                    }
                }
            });
        }

        function refreshSurveySection($notification){
            var route = "https://mybusinessacademypro.com/academia/refresh-survey-section/{{$event->id}}";
            $.ajax({
                url:route,
                type:'GET',
                success:function(ans){
                    $("#surveys_section").html(ans);
                    if ($notification == true){
                        if ($("#type_user").val() == 2){
                            loadCharts();
                            $("#badge-survey").css('display', 'block');
                        }else{
                            $("#badge-survey").css('display', 'block');
                        }
                    }else{
                        if ($("#type_user").val() == 2){
                            loadCharts();
                        }
                    }
                }
            });
        }

        Pusher.logToConsole = true;
        var pusher = new Pusher('70633ff8ae20c2f8780b', {cluster: 'mt1'});
        var channel = pusher.subscribe('notificacion-channel');
        channel.bind('notificacion-event', function(data) {
            if (data.user != $("#user_auth").val()){
                refreshMenu();
                if (data.type == 'video'){ 
                    refreshVideoSection(true);
                }else if (data.type == 'presentation'){
                    refreshPresentationSection(true);
                }else if (data.type == 'file'){
                    refreshFileSection(true);
                }else if (data.type == 'offer'){
                    refreshOfferSection(true);
                }else if (data.type == 'survey'){
                    refreshSurveySection(true);
                }else if (data.type == 'delete-presentation'){
                    refreshPresentationSection(false);
                }else if (data.type == 'delete-file'){
                    refreshFileSection(false);
                }
            }
        });
    </script>
@endpush
@section('content')
    <input type="hidden" id="user_auth" value="{{ Auth::user()->ID }}">
    <input type="hidden" id="event_id" value="{{ $event->id }}">
    <input type="hidden" id="type_user" value="{{ Auth::user()->rol_id }}">
    
    <div class="bg-dark-gray">
        {{-- Encabezado o titulo --}}
        @include('live.components.cabezera')
        @include('live.components.avisos')
        {{-- Video --}}
        @include('live.components.video')
      
        
    </div>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 pl-0">
                <div class="row ml-0" style="padding-right: 10%; padding-left: 10%;">
                    {{-- Seccion del Informacion del Mentor --}}
                    @include('live.components.seccionMentor')
    
                </div>
            </div>
        </div>
    </div>
    
    <form id="delete_resource_form">
        <input type="hidden" name="resource_id" id="resource_id">
        <input type="hidden" name="resource_type" id="resource_type">
    </form>
    <!-- MODALES PARA LAS OPCIONES DEL MENU -->
    @include('live.components.optionsMenu.chat')
    @include('live.components.optionsMenu.setting')
    @include('live.components.optionsMenu.survey')
    @include('live.components.optionsMenu.presentation')
    @include('live.components.optionsMenu.video')
    @include('live.components.optionsMenu.documents')
    @include('live.components.optionsMenu.offers')
    
    <!-- MODALES PARA AGREGAR RECURSOS EN LA OPCIÓN CONFIGURACIÓN DEL MENU -->
    @include('live.components.modal.agregarRecursosVideo')
    @include('live.components.modal.agregarRecursosArchivo')
    @include('live.components.modal.agregarRecursosPresentacion')
    @include('live.components.modal.agregarRecursosEncuestas')
    @include('live.components.modal.agregarRecursosOfertas')

    <!-- Scrips de la seccion de live -->
    @include('live.components.scritpsLive')
@endsection
