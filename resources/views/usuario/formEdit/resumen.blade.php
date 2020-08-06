<div class="col-sm-12 ">
    <div class="row">
        <div class="col-xs-12 col-sm-4">
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <img class="profile-user-img img-responsive img-circle"
                        src="{{asset('/avatar/'.$data['principal']->avatar)}}">

                    <h3 class="profile-username text-center">{{$data['principal']->user_nicename}}</h3>
                    <p class="text-muted text-center">{{$data['principal']->user_email}}</p>

 @if(Auth::user()->ID == $data['principal']->ID || Auth::user()->rol_id == 0)    
                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><b>Editar
                            imagen</b></a>
                            @endif
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos de Usuario</h3>
                </div>
                <div class="box-body">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6 text-center">
                                <h5>
                                    Nombre Usuario
                                </h5>
                            </div>
                            <div class="col-xs-6 text-center">
                                <h5>
                                    <b>
                                        {{$data['segundo']->nameuser}}
                                    </b>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6 text-center">
                                <h5>
                                    Nombre Completo
                                </h5>
                            </div>
                            <div class="col-xs-6 text-center">
                                <h5>
                                    <b>
                                        {{$data['segundo']->firstname}} {{$data['segundo']->lastname}}
                                    </b>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6 text-center">
                                <h5>
                                    Patrocinador
                                </h5>
                            </div>
                            <div class="col-xs-6 text-center">
                                <h5>
                                    <b>
                                        {{$data['referido']['display_name']}}
                                    </b>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-6 text-center">
                                    <h5>
                                        Rango
                                    </h5>
                                </div>
                                <div class="col-xs-6 text-center">
                                    <h5>
                                        <b>
                                            {{$data['rol']}}
                                        </b>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6 text-center">
                                <h5>
                                    Estado
                                </h5>
                            </div>
                            <div class="col-xs-6 text-center">
                                <h5>
                                    <b>
                                        @if($data['principal']->status == 1)
                                        Activo
                                        @elseif($data['principal']->status == 0)
                                        Inactivo
                                        @endif
                                    </b>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para la imagen -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Imagen de Usuario</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12 buq">
                    <form method="POST" action="{{ route('admin.user.actualizar', $data['principal']->ID) }}"
                        enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <div class="form-group col-sm-12">
                            <label for="">Imagen de Usuario</label>
                            <input class="form-control form-control-solid placeholder-no-fix" type="file" name="avatar"
                                required style="background-color:f7f7f7;">
                        </div>
                        <div class="form-group col-sm-12" style="padding-left: 10px;">
                            <button class="btn green padding_both_small" type="submit"
                                style="margin-bottom: 15px; margin-top: 2px;">Subir</button>
                               
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>