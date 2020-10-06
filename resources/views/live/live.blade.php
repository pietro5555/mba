@extends('layouts.landing')

@section('content')
@stack('styles')

@php
 //dd($menuResource)
@endphp

<div class="bg-dark-gray">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md my-auto">
          <h5 class="text-blue mt-2">
            {{ $event->title }} / {{$event->mentor->display_name}}
          </h5>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md title-level">
              <h6 class="">Nivel: {{$event->subcategory->title}}</h6>
            </div>
            <div class="col-md-6 text-center pt-1 my-auto">
              <a href="" class="btn btn-social-icon btn-facebook btn-rounded"><img src="{{ asset('images/icons/facebook.svg') }}" height="20px" width="20px"></a>
              <a href="" class="btn btn-social-icon btn-twitter btn-rounded"><img src="{{ asset('images/icons/twitter.svg') }}" height="20px" width="20px"></a>
              <a href="" class="btn btn-social-icon btn-instagram btn-rounded"><img src="{{ asset('images/icons/instagram.svg') }}" height="20px" width="20px"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<video
    class="d-block w-100 leccion-curso"
    controls
    crossorigin
    playsinline
    poster="{{ asset('images/banner_live.png') }}"
    id="player"
  >
    <!-- Video files -->
    <source
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4"
      type="video/mp4"
      size="576"
    />
    <source
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4"
      type="video/mp4"
      size="720"
    />
    <source
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4"
      type="video/mp4"
      size="1080"
    />

    <!-- Caption files -->
    <track
      kind="captions"
      label="English"
      srclang="en"
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
      default
    />
    <track
      kind="captions"
      label="Français"
      srclang="fr"
      src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt"
    />
  </video>
</div>
@if (Session::has('msj-exitoso'))
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        <strong>{{ Session::get('msj-exitoso') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (Session::has('msj-erroneo'))
    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
        <strong>{{ Session::get('msj-erroneo') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12 pl-0">
      <div class="row ml-0">
        <div class="col-md-8">
          <nav class="mb-2"><!--Menu de navegacion -->
            <div class="nav nav-tabs nav-fill font-weight-bold" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active mr-1 mt-2 text-center" id="nav-mentor-tab" data-toggle="tab" href="#nav-mentor" role="tab" aria-controls="nav-mentor" aria-selected="true">Info del Especialista</a>
              <a class="nav-item nav-link mr-1 mt-2 text-center" id="nav-agenda-tab" data-toggle="tab" href="#nav-agenda" role="tab" aria-controls="nav-agenda" aria-selected="false">Próxima Agenda</a>
              <a class="nav-item nav-link mr-1 mt-2 text-center" id="nav-favoritos-tab" data-toggle="tab" href="#nav-favoritos" role="tab" aria-controls="nav-favoritos" aria-selected="false">Favoritos</a>
              <a class="nav-item nav-link mr-1 mt-2 text-center" id="nav-anotaciones-tab" data-toggle="tab" href="#nav-anotaciones" role="tab" aria-controls="nav-anotaciones" aria-selected="false">Anotaciones</a>
            </div>
            </nav>
            <div class="col-md-10 pl-0">
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-mentor" role="tabpanel" aria-labelledby="nav-mentor-tab">
                 <div class="container-fluid mb-2">
                        <div class="row featurette">
                              <div class="col-md-7 order-md-2">
                                <h5 class="featurette-heading text-white">Mentor</h5>
                              <h3 class="featurette-heading text-primary">{{$event->mentor->display_name}}</h3>
                                <h6 class="featurette-heading text-white">{{$event->mentor->profession}}</h6>
                                <p class="lead about-course-text text-justify">{{$event->mentor->about}}.</p>
                                <a href="{{ url('courses/mentor/'.$event->mentor->ID) }}" class="text-primary">Ver perfil <i class=" fa fa-angle-right"> </i></a>
                              </div>
                              <div class="col-md-5 order-md-1 pl-0">
                                    <img src="{{ asset('uploads/avatar/'.$event->mentor->avatar) }}" alt="" class="featurette-image img-fluid mx-auto ml-2">
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
                            <div class="col-12 box-comments pl-0">
                              <div class="card card-anotaciones pb-2">
                              <div class="card-body p-0">
                                <form method="POST" action="{{ route('live.anotaciones') }}" class="m-2">
                                  @csrf
                                  <input id="event_id" name="event_id" type="hidden" value="{{ $event->id }}">
                                <div class="form-group notes-form-title">
                                  <input type="text" id="title" placeholder="Título" class="col-md-6 form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>
                                </div>
                                <div class="form-group notes-form-content">
                                  <textarea class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" id="content"  name="content" value="{{ old('content') }}" required autofocus rows="3">Escribe tu nota</textarea>
                                </div>
                                <button type="submit" class="btn btn-success float-right">Guardar nota</button>
                              </form>
                            </div>
                          </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">

                  <div class="col-md-10 pl-0 mb-2">
                        <h4 class="title-note pb-2">Notas Guardadas</h4>
                        @foreach ($notes as $note)
                                  <div class="accordion accordionNotes mb-2" id="accordionNote{{$note->id}}">
                                    <div class="card">
                                      <div class="card-header" id="heading{{$note->id}}">
                                        <p class="mb-2 mt-2" data-toggle="collapse" data-target="#collapse{{$note->id}}" aria-expanded="true" aria-controls="collapse{{$note->id}}">
                                          {{$note->title}}
                                          <img src="{{ asset('images/icons/chevron-black.svg') }}" height="20px" width="20px" class="float-right">
                                        </p>
                                       </div>

                             <div id="collapse{{$note->id}}" class="collapse" aria-labelledby="heading{{$note->id}}" data-parent="#accordionNote{{$note->id}}">
                               <div class="card-body  mb-2">
                               {{$note->content}}
                                </div>
                             </div>
                           </div>
                         </div>
                         @endforeach
                      </div><!--end Notas-->
                  </div>



                </div>
              </div><!--End Seccion Anotaciones-->
              </div><!--End tab-content-->
            </div><!--End col -->
            <!--Notas-->


        </div><!--End col -->
        <!--Menu y Chat-->
        <div class="col-md-4 " style='margin-left: -45px !important;'>
          <div class="row mt-2">
            <div class="col-md-12">
              <div class="row">
                <div class="col">
                  <div class="col vertical-menu">
                  <nav class="mb-1">
                  <div class="nav nav-tabs nav-fill" id="nav-tab-chat" role="tablist">

                  <!--@foreach($menuResource as $menu)
                    <a class="nav-item nav-link active" id="nav-settings-tab" data-toggle="tab"  href="#nav-settings" role="tab" aria-controls="nav-settings" aria-selected="true">
                      <img src="{{ asset('images/icons/settings.svg') }}" height="30px" class="">
                      <h6 class="text-center d-none d-sm-none d-md-block">{{ $menu->resources->title }}</h6>
                    </a>
                  @endforeach-->


                   <a class="nav-item nav-link active" id="nav-settings-tab" data-toggle="tab"  href="#nav-settings" role="tab" aria-controls="nav-settings" aria-selected="true">
                    <img src="{{ asset('images/icons/settings.svg') }}" height="30px" class="">
                    <h6 class="text-center d-none d-sm-none d-md-block">Configuración</h6>
                    </a>
                    <a class="nav-item nav-link" id="nav-participantes-tab" data-toggle="tab" href="#nav-participantes" role="tab" aria-controls="nav-participantes" aria-selected="false">
                    <img src="{{ asset('images/icons/person.svg') }}" height="30px" class="">
                    <h6 class="text-center d-none d-sm-none d-md-block">Participantes</h6></a>

                    <a class="nav-item nav-link" id="nav-chat-tab" data-toggle="tab" href="#nav-chat" role="tab" aria-controls="nav-chat" aria-selected="false">
                    <img src="{{ asset('images/icons/comment.svg') }}" height="30px" class="">
                    <h6 class="text-center d-none d-sm-none d-md-block">Chat</h6></a>

                    <a class="nav-item nav-link" id="nav-encuesta-tab" data-toggle="tab" href="#nav-encuesta" role="tab" aria-controls="nav-encuesta" aria-selected="false">
                    <img src="{{ asset('images/icons/lista.svg') }}" height="30px" class="">
                    <h6 class="text-center d-none d-sm-none d-md-block">Encuesta</h6></a>
                    <a class="nav-item nav-link" id="nav-presentation-tab" data-toggle="tab" href="#nav-presentation" role="tab" aria-controls="nav-presentation" aria-selected="false">
                    <img src="{{ asset('images/icons/presentacion.svg') }}" height="30px" class="">
                    <h6 class="text-center d-none d-sm-none d-md-block">Presentación</h6></a>
                    <a class="nav-item nav-link" id="nav-video-tab" data-toggle="tab" href="#nav-video" role="tab" aria-controls="nav-video" aria-selected="false">
                    <img src="{{ asset('images/icons/video.svg') }}" height="30px" class="">
                  <h6 class="text-center d-none d-sm-none d-md-block">Vídeo</h6></a>
                    <a class="nav-item nav-link" id="nav-archives-tab" data-toggle="tab" href="#nav-archives" role="tab" aria-controls="nav-archives" aria-selected="false"><img src="{{ asset('images/icons/documentos.svg') }}" height="30px" class="">
                  <h6 class="text-center d-none d-sm-none d-md-block">Archivos</h6></a>
                    <a class="nav-item nav-link" id="nav-ofertas-tab" data-toggle="tab" href="#nav-ofertas" role="tab" aria-controls="nav-ofertas" aria-selected="false"><img src="{{ asset('images/icons/descuento.svg') }}" height="30px" class="">
                  <h6 class="text-center d-none d-sm-none d-md-block">Ofertas</h6></a>
              </div>
              </nav>
            </div><!--End menu vertical-->
                </div>
                <div class="col pl-0 pr-0 mr-2">
                  <div class="tab-content" id="nav-chat-tabContent">
              <div class="tab-pane fade pl-2 active show" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab">
                    <div>
                      <a data-toggle="modal" data-target="#modal-settings-survey" class="btn btn-primary btn-block"><i class="fa fa-plus-circle"></i> Agregar Encuesta</a>
                    </div> <br>
                    <div>
                      <a data-toggle="modal" data-target="#modal-settings-presentation" class="btn btn-primary btn-block"><i class="fa fa-plus-circle"></i> Agregar Presentación</a>
                    </div> <br>
                    <div>
                      <a data-toggle="modal" data-target="#modal-settings" class="btn btn-primary btn-block"><i class="fa fa-plus-circle"></i> Agregar Video</a>
                    </div> <br>
                    <div>
                      <a data-toggle="modal" data-target="#modal-settings-file" class="btn btn-primary btn-block"><i class="fa fa-plus-circle"></i> Agregar Archivos</a>
                    </div> <br>
                    <div>
                      <a data-toggle="modal" data-target="#modal-settings-enable" class="btn btn-primary btn-block"><i class="fa fa-check"></i> Habilitar recursos</a>
                    </div>
              </div>
              <div class="tab-pane fade pl-2" id="nav-participantes" role="tabpanel" aria-labelledby="nav-participantes-tab">
                    Sección para participantes
              </div>
            <!--Chat list-->
            <div class="chat-list tab-pane fade pl-2" id="nav-chat" role="tabpanel" aria-labelledby="nav-chat-tab" scroll="auto">

                      <div class="form-row">
                        <div class="col pt-2 logo-user">
                          <div class="logo-username-green">A</div>
                        </div>
                         <div class="col pt-2">
                           <p class="nombre-anfitrion">Anfitrion</p>
                         </div>

                         <div class="col-m-12">
                           <div class="mensaje">
                            </textarea>
                            <p class="contenido-anfitrion p-1">
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                             </p>
                           </div>
                         </div>
                       </div>


                       <div class="form-row">
                        <div class="col logo-user">
                          <div class="logo-username-blue">JD</div>
                        </div>
                         <div class="col">
                           <p class="nombre-jd">John Doe</p>
                         </div>

                         <div class="col-m-12">
                           <div  class="mensaje">
                            <p class="contenido-anfitrion p-1">
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                             </p>
                           </div>
                         </div>
                       </div>


                       <div class="form-row">
                        <div class="col logo-user">
                          <div class="logo-username-green">A</div>
                        </div>
                         <div class="col">
                           <p class="nombre-anfitrion">Anfitrion</p>
                         </div>

                         <div class="col-m-12">
                           <div class="mensaje">
                            <p class="contenido-anfitrion p-1">
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                             </p>
                           </div>
                         </div>
                       </div>


                       <div class="form-row">
                        <div class="col logo-user">
                          <div class="logo-username-blue">JD</div>
                        </div>
                         <div class="col">
                           <p class="nombre-jd">John Doe</p>
                         </div>

                         <div class="col-m-12">
                           <div  class="mensaje">
                            <p class="contenido-anfitrion p-1">
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                             </p>
                           </div>
                         </div>
                       </div>
                       <div class="card card-anotaciones pb-2">
                              <div class="card-body p-0">
                                <h5 class="card-title">
                                <p class="card-text">
                                  <textarea class="place pt-2" name="nota" rows="8" cols="8">Escribe tu mensaje</textarea>
                                  <div class="col-12">
                                    <div class="row p-1">
                                    <div class="col">
                                      <div class="row">
                                        <span>
                                          <i class="em em-angry small" aria-role="presentation" aria-label="ANGRY FACE"></i>
                                        </span>
                                        <span>
                                          <i class="em em-anguished small" aria-role="presentation" aria-label="ANGUISHED FACE"></i>
                                        </span>
                                   <span>
                                     <i class="em em-astonished small" aria-role="presentation" aria-label="ASTONISHED FACE"></i>
                                   </span>
                                   <span>
                                     <i class="em em-adult" aria-role="presentation" aria-label="ADULT"></i>
                                   </span>
                                   <span>
                                     <i class="em em-angel small" aria-role="presentation" aria-label="BABY ANGEL"></i>
                                   </span>
                                   <span>
                                    <i class="em em-baby small" aria-role="presentation" aria-label="BABY"></i>
                                   </span>
                                   <span>
                                     <i class="em em---1 small" aria-role="presentation" aria-label="THUMBS UP SIGN"></i>
                                   </span>
                                   <span>
                                     <i class="em em--1 small" aria-role="presentation" aria-label="THUMBS DOWN SIGN"></i>
                                   </span>
                                   <span>
                                     <i class="em em-blush small" aria-role="presentation" aria-label="SMILING FACE WITH SMILING EYES"></i>
                                   </span>
                                   <span>
                                     <i class="em em-clap small" aria-role="presentation" aria-label="CLAPPING HANDS SIGN"></i>
                                   </span>
                                   <span>
                                     <i class="em em-cry small" aria-role="presentation" aria-label="CRYING FACE"> </i>
                                   </span>
                                   <span>
                                     <i class="em em-eyes small" aria-role="presentation" aria-label="EYES"></i>
                                   </span>
                                   <span>
                                     <i class="em em-face_with_rolling_eyes small" aria-role="presentation" aria-label="FACE WITH ROLLING EYES"></i>
                                   </span>
                                  <span>
                                    <i class="em em-exploding_head small" aria-role="presentation" aria-label="SHOCKED FACE WITH EXPLODING HEAD"></i>
                                  </span>
                                  <span>
                                    <i class="em em-face_with_raised_eyebrow small" aria-role="presentation" aria-label="FACE WITH ONE EYEBROW RAISED"></i>
                                  </span>
                                  <span>
                                    <i class="em em-dizzy_face small" aria-role="presentation" aria-label="DIZZY FACE"></i>
                                  </span>
                                  <span>
                                    <i class="em em-face_with_monocle small" aria-role="presentation" aria-label="FACE WITH MONOCLE"></i>
                                  </span>
                                  <span>
                                    <i class="em em-face_vomiting small" aria-role="presentation" aria-label="FACE WITH OPEN MOUTH VOMITING"></i>
                                  </span>

                                  </div>




                                      </div>

                                    </div>
                                  </div>



                                  <button type="button" class="btn btn-success float-right btn-sm mr-2">Enviar</button>
                                </p>
                            </div>
                          </div>

                       <div class="col mb-2">
                         <div class="row">
                          <div class="col">
                            <div class="row">
                              <div class="col">

                              </div>

                            </div>
                          </div>

                         </div>
                       </div>

                    </div> <!--End chat-list-->
                    <div class="tab-pane fade pl-2" id="nav-encuesta" role="tabpanel" aria-labelledby="nav-encuesta-tab">
                    Sección para encuesta
                  </div>
                  <div class="tab-pane fade pl-2" id="nav-presentation" role="tabpanel" aria-labelledby="nav-presentation-tab">
                  Sección para presentación
                  </div>
                  <div class="tab-pane fade pl-2" id="nav-video" role="tabpanel" aria-labelledby="nav-video-tab">
                    Sección para vídeo
                  </div>
                  <div class="tab-pane fade pl-2" id="nav-archives" role="tabpanel" aria-labelledby="nav-archives-tab">
                    Sección para archivos
                  </div>
                  <div class="tab-pane fade pl-2" id="nav-ofertas" role="tabpanel" aria-labelledby="nav-ofertas-tab">
                    Sección para ofertas
                  </div>
            </div><!--End tab-content-->
                </div>

              </div>

            </div>
          </div>
        </div><!--End Menu y Chat-->

      </div>
    </div>
  </div>

</div>

<!-- Modal Agregar recursos video -->
<div class="modal fade" id="modal-settings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content" >
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Agregar video</h5>
      			</div>
      			<form action="{{ route('set.event.store', [1]) }}" method="POST">
			        {{ csrf_field() }}
				    <div class="modal-body">
				        <div class="container-fluid">
	    					<div class="row">
						        <div class="col-md-12">
                        <div class="form-group">
						                <label>Link del Video</label>
						            	  <input type="text" class="form-control" name="url_video" required>
						            </div>
						        </div>
						    </div>
						</div>
            <input type="hidden" name="type" value='video' required>

				    </div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        			<button type="submit" class="btn btn-success">Enviar</button>
	      			</div>
	      		</form>
    		</div>
  		</div>
	</div>

<!-- Modal Agregar recursos file -->
<div class="modal fade" id="modal-settings-file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content" >
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Agregar Archivos</h5>
      			</div>
      			<form action="{{ route('set.event.store', [1]) }}" method="POST" enctype="multipart/form-data" >
			        {{ csrf_field() }}
				    <div class="modal-body">
				        <div class="container-fluid">
	    					<div class="row">
						        <div class="col-md-12">
                        <div class="form-group">
						                <label>Seleccione un Archivo</label>
						            	  <input type="file" class="form-control" name="file" required>
						            </div>
						        </div>
						    </div>
						</div>
            <input type="hidden" name="type" value='file' required>

				    </div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        			<button type="submit" class="btn btn-success">Enviar</button>
	      			</div>
	      		</form>
    		</div>
  		</div>
	</div>

<!-- Modal Agregar recursos presentation -->
<div class="modal fade" id="modal-settings-presentation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content" >
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Agregar Presentación</h5>
      			</div>
      			<form action="{{ route('set.event.store', [1]) }}" method="POST" enctype="multipart/form-data" >
			        {{ csrf_field() }}
				    <div class="modal-body">
				        <div class="container-fluid">
	    					<div class="row">
						        <div class="col-md-12">
                        <div class="form-group">
						                <label>Seleccione la presentación</label>
						            	  <input type="file" class="form-control" name="presentation" required>
						            </div>
						        </div>
						    </div>
						</div>
            <input type="hidden" name="type" value='presentation' required>

				    </div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        			<button type="submit" class="btn btn-success">Enviar</button>
	      			</div>
	      		</form>
    		</div>
  		</div>
	</div>

<!-- Modal Agregar recursos encuesta -->
<div class="modal fade" id="modal-settings-survey" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog modal-lg" role="document">
    		<div class="modal-content" >
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Agregar Encuesta</h5>
      			</div>
      			<form action="{{ route('set.event.store', [1]) }}" method="POST" id="formQuestion">
			        {{ csrf_field() }}
				    <div class="modal-body">
				        <div class="container-fluid">
	    					<div class="row">
                    <div class="col-md-12">
                      <div id="list_question">
                          <div class="form-group">
                              <label>Escribe la pregunta #1</label>
                              <textarea required class="form-control fieldSurvey" name="q1" id="q1"></textarea>
                          </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <a title="Agregar una pregunta más"  class="btn btn-primary btn-circle addQuestion"><i class="fa fa-plus-circle"></i></a>
						        </div>
						    </div>
						</div>
            <input type="hidden" name="type" value='survey' required>
            <input type="hidden" name="questions" class="questionsArray">

				    </div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        			<button type="button" class="btn btn-success sendFormQuestion">Enviar</button>
	      			</div>
	      		</form>
    		</div>
  		</div>
	</div>

  <!-- Modal Habilitar recursos 20130394-->
  <div class="modal fade" id="modal-settings-enable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLabel">Configuraciones del Evento</h5>
      			</div>
      			<form action="{{ route('admin.courses.add-subcategory') }}" method="POST">
			        {{ csrf_field() }}
				    <div class="modal-body">
				        <div class="container-fluid">
	    					<div class="row">
						        <div class="col-md-12">
                        <label>Habilitar recursos</label>
						        </div>
						    </div>
						</div>

				    </div>
	      			<div class="modal-footer">
	        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	      			</div>
	      		</form>
    		</div>
  		</div>
	</div>


@endsection

@push('scripts')
  <script type="text/javascript">
    let  nextinput = 1;
    $('.addQuestion').on('click',function(e){
        e.preventDefault();
        nextinput++;
        campo = '<div id="content_' + nextinput + '" class="form-group"> <label>Escribe la pregunta #'+nextinput+'</label> <div class="contentQuestion"> <textarea required class="form-control mr-2 fieldSurvey" id="q'+nextinput+'"&nbsp; name="q' + nextinput + '"&nbsp; ></textarea> <span> <a title="Eliminar pregunta"  class="btn btn-danger btn-circle " onclick="removeQuestion('+nextinput+')"><i class="fa fa-ban"></i></a> </span> </div> </div>';
        $(".msjError").remove();
        $("#list_question").append(campo);

    });






    $('.sendFormQuestion').on('click',function(e){
      e.preventDefault();
      var questionArray = [];
      let valida = false;
      let elementos = document.querySelectorAll(".fieldSurvey")

      elementos.forEach((elemento) => {
        questionArray.push(elemento.value)
        valida = (elemento.value === "") ? true : false
      })
      $(".questionsArray").val(questionArray)

      if(!valida)
        $("#formQuestion").submit();
      else
        msjError = '<p class="msjError" style="color: red">No pude enviar campos vacios!</>';
        $("#list_question").append(msjError);
    });

     removeQuestion = function(q) {
      $('#content_'+q).remove()
    }


  </script>
@endpush
