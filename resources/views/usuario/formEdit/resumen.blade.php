<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body white">
            <h3 style="padding: 10px 50px;"> Resumen</h3>

            <div class="card mb-3" style="max-width: 740px;">
              <div class="row no-gutters">
                <div class="col-md-5" style="text-align: center;">
                  <img src="{{asset('/uploads/avatar/'.$data['principal']->avatar)}}" style="width: 150px; height: 150px; border-radius: 50%; margin-top: 20px;">

                  @if(!empty($data['insignia']))
                  <img src="{{ $data['insignia'] }}" height="80px" width="80px" style="margin: 20px;">
                  @endif

                  @if(Auth::user()->ID == $data['principal']->ID || Auth::user()->rol_id == 0)
                    <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><b>Editar
                            imagen</b></a>
                  @endif

                </div>
                  <div class="col-md-7">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-6 text-center">
                                <h4>
                                    Nombre Completo
                                </h4>
                            </div>
                            <div class="col-xs-6 text-center">
                                <h4>
                                    <b>
                                        {{$data['segundo']->firstname}} {{$data['segundo']->lastname}}
                                    </b>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6 text-center">
                                <h4>
                                    Patrocinador
                                </h4>
                            </div>
                            <div class="col-xs-6 text-center">
                                <h4>
                                    <b>
                                        {{$data['referido']['display_name']}}
                                    </b>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-6 text-center">
                                    <h4>
                                        Rango
                                    </h4>
                                </div>
                                <div class="col-xs-6 text-center">
                                    <h4>
                                        <b>
                                            {{$data['rol']}}
                                        </b>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6 text-center">
                                <h4>
                                    Estado
                                </h4>
                            </div>
                            <div class="col-xs-6 text-center">
                                <h4>
                                    <b>
                                        @if($data['principal']->status == 1)
                                        Activo
                                        @elseif($data['principal']->status == 0)
                                        Inactivo
                                        @endif
                                    </b>
                                </h4>
                            </div>
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
