@extends('layouts.dashboardnew')

@push('script')
@endpush

@section('content')


<div class="col-xs-12">
    <div class="col-md-4">
            <div class="sidenav">
                <br><br><br><br><br><br>
                <form action="{{route('admin.soporte.search.questions_two')}}" method="GET">
                <div class="form-group col-md-12">
                        <div class="input-group">
                      <div class="input-group-addon academy-question-search" style="background:#2A91FF!important; border:none; border-top-left-radius: 20px; border-bottom-left-radius: 20px; padding: 0px!important;">
                        <button class="btn btn-none border-0" type="submit" style="background:none!important;"><i class="fa fa-search white" aria-hidden="true"></i></button>
                      </div>
                      <input name="frecuent-question" id="frecuent-question" type="text" placeholder="Busca tu pregunta" class="form-control academy-question-search" value="">
                        </div>
                </div>
                 </form>

                <br><br>
                <a><h3 class="white">Categorías</h3></a>
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link" id="v-pills-questions-tab" data-toggle="pill" href="#v-pills-questions" role="tab" aria-controls="v-pills-questions" aria-selected="true"><i class="far fa-comments text-primary"></i> Preguntas frecuentes</a>
                <a class="nav-link" id="v-pills-academy-tab" data-toggle="pill" href="#v-pills-academy" role="tab" aria-controls="v-pills-academy" aria-selected="false"><i class="fas fa-graduation-cap text-primary"></i> Academia</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fas fa-user-plus text-primary"></i> Afiliados</a>
                @if(Auth::user()->rol_id != 0)
                <a href="{{route('soporte.tickets.clients')}}" class="nav-link"><i class="fas fa-ticket-alt text-primary"></i> Mis Tickets</a>
                @endif
                @if(Auth::user()->rol_id == 0)
                <a href="{{route('soporte.tickets.team')}}" class="nav-link"><i class="fas fa-tools text-primary"></i> Tickets/Soporte</a>
                @endif
                </div>
            </div>
    </div>
    <div class="col-md-8">
        <div class="tab-content" id="v-pills-tabContent">
        <!--PREGUNTAS FRECUENTES-->
            <div class="tab-pane fade" id="v-pills-questions" role="tabpanel" aria-labelledby="v-pills-questions-tab">
                <h2 class="white font-weight-bold">Preguntas frecuentes</h2><hr>
                
                <!--ACCORDION-->
                @include('soporte.components.accordion_questions')
                <!--ACCORDION END-->
            </div>
        <!--PREGUNTAS FRECUENTES END-->
        <!--ACADEMIA-->
            <div class="tab-pane fade" id="v-pills-academy" role="tabpanel" aria-labelledby="v-pills-academy-tab">
                <h2 class="white font-weight-bold">Academia</h2><hr>
                <!--ACCORDION-->
                @include('soporte.components.accordion_academy')
                <!--ACCORDION END-->
                <br><br><br><br>
                <h4 style="color:#838181;">¿No encuentras la respuesta que buscas? Abre un ticket</h4>
                <a href="{{route('soporte.tickets')}}" class="btn btn-success">Abrir Ticket</a>
            </div>
            <!--ACADEMIA END-->
             <!--AFILIADOS-->
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <h2 class="white font-weight-bold">Afiliados</h2><hr>
                <h4 class="white">En construcción...</h4>
            </div>
            <!--AFILIADOS END-->
        </div>
    </div>

</div>

@endsection
