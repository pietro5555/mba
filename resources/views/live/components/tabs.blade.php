<div class="tab-content mt-2 col-md-4" id="v-pills-tabContent">
    {{-- Tab de Configuracion --}}
    <div class="tab-pane fade  ml-2" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
        @include('live.components.tabs.configuracion')
    </div>
    {{-- Fin Tab de Configuracion --}}

    {{-- Tab de Estudiantes --}}
    <div class="tab-pane fade ml-2" id="v-pills-students" role="tabpanel" aria-labelledby="v-pills-students-tab">
        @include('live.components.tabs.estudiantes')
    </div>
    {{-- Fin Tab de Estudiantes --}}

    {{-- Tab de Chat --}}
    <div class="tab-pane show active fade ml-2 mb-2" id="v-pills-messages" role="tabpanel"
        aria-labelledby="v-pills-messages-tab">
        @include('live.components.tabs.chat')
    </div>
    {{-- Fin tab de chat --}}

    {{-- Tab de Ofertas --}}
    <div class="tab-pane fade ml-2" id="v-pills-offers" role="tabpanel" aria-labelledby="v-pills-offers-tab">
        @include('live.components.tabs.ofertas')
    </div>
    {{-- Fin tabs de Ofertas --}}

    {{-- Tab de Encuesta --}}
    <div class="tab-pane fade ml-2" id="v-pills-survey" role="tabpanel" aria-labelledby="v-pills-survey-tab">
        @include('live.components.tabs.encuestas')
    </div>
    {{-- Fin de Tab de Encuesta --}}

    {{-- Tab de Presentacion --}}
    <div class="tab-pane fade ml-2" id="v-pills-presentation" role="tabpanel"
        aria-labelledby="v-pills-presentation-tab">
        @include('live.components.tabs.presentacion')
    </div>
    {{-- Fin tab de Presentacion --}}

    {{-- Tab de Videos --}}
    <div class="tab-pane fade ml-2" id="v-pills-video" role="tabpanel" aria-labelledby="v-pills-video-tab">
        @include('live.components.tabs.video')
    </div>
    {{-- Fin Tab de Video --}}

    {{-- Tab de Documentos --}}
    <div class="tab-pane fade ml-2" id="v-pills-documents" role="tabpanel" aria-labelledby="v-pills-documents-tab">
        @include('live.components.tabs.documentos')
    </div>
    {{-- Fin Tab de Documentos --}}

</div>
