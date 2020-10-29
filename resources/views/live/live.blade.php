@extends('layouts.landing')

@push('scripts')
    <script>
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
                        $("#presentations_section").html(ans);
                        refreshMenu();
                    }
                }
            });
        }
        
        function newVideo(){
            var route = "https://mybusinessacademypro.com/academia/settings/event";
            var parametros = $('#store_video_form').serialize();
            $.ajax({
                url:route,
                type:'POST',
                data:  parametros,
                success:function(ans){
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
                        $("#videos_section").html(ans);
                        refreshMenu();
                    }
                }
            });
        }
        
        function newFile(){
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
                        $("#files_section").html(ans);
                        refreshMenu();
                    }
                }
            });
        }
        
        function newOffer(){
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
                        $("#offers_section").html(ans);
                        refreshMenu();
                    }
                }
            });
        }
        
        function deletePresentation(){
            var route = "https://mybusinessacademypro.com/academia/settings/event/delete";
            var parametros = $('#delete_presentation_form').serialize();
            console.log(parametros);
            $.ajax({
                url:route,
                type:'POST',
                data:  parametros,
                success:function(ans){
                    $("#msj-error-ajax").css('display', 'none');
                    $("#option-modal-presentation").modal("hide");
                    $("#msj-success-text").html("La memoria ha sido eliminada con éxito");
                    $("#msj-success-ajax").css('display', 'block');
                    $("#presentations_section").html(ans);
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
    </script>
@endpush
@section('content')

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
