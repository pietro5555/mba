<div class="col-md-12 pl-0">
    {{-- Menu de Navegacion --}}
    <nav class="mb-2">
        <div class="nav nav-tabs nav-fill font-weight-bold" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active mr-1 mt-2 text-center" id="nav-mentor-tab" data-toggle="tab"
                href="#nav-mentor" role="tab" aria-controls="nav-mentor" aria-selected="true">Info del Especialista</a>
            <!--<a class="nav-item nav-link mr-1 mt-2 text-center" id="nav-agenda-tab" data-toggle="tab" href="#nav-agenda" role="tab" aria-controls="nav-agenda" aria-selected="false">Próxima Agenda</a>
        <a class="nav-item nav-link mr-1 mt-2 text-center" id="nav-favoritos-tab" data-toggle="tab" href="#nav-favoritos" role="tab" aria-controls="nav-favoritos" aria-selected="false">Favoritos</a>-->
            <a class="nav-item nav-link mr-1 mt-2 text-center" id="nav-anotaciones-tab" data-toggle="tab"
                href="#nav-anotaciones" role="tab" aria-controls="nav-anotaciones" aria-selected="false">Anotaciones</a>
        </div>
    </nav>
    {{-- Fin menu de navegacion --}}
    <div class="col-md-12 pl-0">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-mentor" role="tabpanel" aria-labelledby="nav-mentor-tab">
                <div class="container-fluid mb-2">
                    <div class="row featurette">
                        <div class="col-sm-8 col-md-7 order-sm-2 order-md-2">
                            <h5 class="featurette-heading text-white">Mentor</h5>
                            <h3 class="featurette-heading text-primary">{{$event->mentor->display_name}}</h3>
                            <h6 class="featurette-heading text-white">{{$event->mentor->profession}}</h6>
                            <p class="lead about-course-text text-justify">{{$event->mentor->about}}.</p>
                            <a href="{{ url('courses/mentor/'.$event->mentor->ID) }}" class="text-primary">Ver perfil <i
                                    class=" fa fa-angle-right"> </i></a>
                        </div>
                        <div class="col-sm-4 order-sm-1 col-md-5 order-md-1 pl-0">
                            <img src="{{ asset('uploads/avatar/'.$event->mentor->avatar) }}" alt=""
                                class="featurette-image img-fluid mx-auto ml-2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade pl-2" id="nav-agenda" role="tabpanel" aria-labelledby="nav-agenda-tab">
                Sección Próxima agenda en construcción
            </div>
            <div class="tab-pane fade pl-2" id="nav-favoritos" role="tabpanel" aria-labelledby="nav-favoritos-tab">
                Sección Favoritos en construcción
            </div>
            <!--Seccion de Anotaciones-->
            <div class="tab-pane fade" id="nav-anotaciones" role="tabpanel" aria-labelledby="nav-anotaciones-tab">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 pl-0">
                            <div class="pl-0 comments-list">
                                <div class="media pl-0">
                                    <div class="media-body">
                                        <div class="col-12 box-comments ">
                                            <div class="card card-anotaciones pb-2">
                                                <div class="card-body p-0">
                                                    <form class="m-2" id="store_note_form">
                                                        @csrf
                                                        <input id="event_id" name="event_id" type="hidden"
                                                            value="{{ $event->id }}">
                                                        <div class="form-group notes-form-title">
                                                            <input type="text" id="title" placeholder="Título" class="col-md-6 form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" required autofocus style="background-color: #363840;">
                                                        </div>
                                                        <div class="form-group notes-form-content">
                                                            <textarea class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                                                id="content" name="content" 
                                                                required autofocus rows="3" placeholder="Escribe tu nota" style="background-color: #363840;"></textarea>
                                                        </div>
                                                        <a class="btn btn-success float-right" onclick="newNote();">Guardar nota</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Notas Guardadas --}}
                    <div class="row">
                        <div class="col-md-10 mb-2" id="notes_section">
                            <h4 class="title-note pb-2">Notas Guardadas</h4>
                            @foreach ($notes as $note)
                            <div class="accordion accordionNotes mb-2" id="accordionNote{{$note->id}}">
                                <div class="card">
                                    <div class="card-header" id="heading{{$note->id}}">
                                        <p class="mb-2 mt-2" data-toggle="collapse" data-target="#collapse{{$note->id}}"
                                            aria-expanded="true" aria-controls="collapse{{$note->id}}">
                                            {{$note->title}}
                                            <img src="{{ asset('images/icons/chevron-black.svg') }}" height="20px"
                                                width="20px" class="float-right">
                                        </p>
                                    </div>

                                    <div id="collapse{{$note->id}}" class="collapse"
                                        aria-labelledby="heading{{$note->id}}"
                                        data-parent="#accordionNote{{$note->id}}">
                                        <div class="card-body mb-2">
                                            {{$note->content}}
                                            
                                            <div class="text-right">
                                                <a class="btn btn-success" onclick="editNote({{$note}});"><i class="fa fa-edit"></i> Editar</a>
                                                <a class="btn btn-danger" onclick="deleteNote({{$note->id}});"><i class="fa fa-trash"></i> Eliminar</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--end Notas-->
                    </div>
                    {{-- Fin Notas Guardadas --}}
                </div>
            </div>
            <!--End Seccion Anotaciones-->
        </div>
        <!--End tab-content-->
    </div>
    <!--End col -->
    <!--Notas-->


</div>
<!--End col -->
