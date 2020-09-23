<div class="col-xs-12 mostrar" style="display:none;">
    <div class="box box-info">
        <div class="box-body">
            {{-- correo de bienvenida --}}
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="box-title">
                            <h3 class="white">Configuración de la Plantilla de Correo Bienvenida</h3>
                        </div>
                    </div>
                    <div class="box-body">
                        <form class="" action="{{route('setting-save-plantilla')}}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="plantilla" value="bienvenida">
                            <input type="hidden" name="idplantilla"
                                value="{{(!empty($plantillaB->id)) ? $plantillaB->id : '' }}">
                            <div class="form-group">
                                <label for="" class="white">Titulo del Correo</label>
                                <input type="text" name="titulo" class="form-control"
                                    value="{{(!empty($plantillaB->titulo)) ? $plantillaB->titulo : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="" class="white">Contenido del Correo</label>
                                <textarea name="correo" cols="30"
                                    rows="10">{{(!empty($plantillaB->contenido)) ? $plantillaB->contenido : '' }}</textarea>
                                <p class="help-block white">Las Variables de abajo son dinamica, al colocar esas variables se
                                    colocara la
                                    informacion perteneciente a los usuarios</p>
                            </div>
                            <div class="form-group white">
                                <label for="">Variables que pueden usar</label>
                                <span class="var">@nombre</span>
                                <span class="var">@usuario</span>
                                <span class="var">@idpatrocinio</span>
                                <span class="var">@clave</span>
                                <span class="var">@correo</span>
                            </div>
                            <div class="form-group col-sm-12 ji">
                                <div class="form-group col-sm-6">
                                    <button type="button" class="btn btn-danger btn-block mostrar" style="display:none;"
                                        onclick="toggle()">Cancelar</button>
                                </div>
                                <div class="form-group col-sm-6">
                                    <button type="submit" class="btn green btn-block"> Guardar <span
                                            class="glyphicon glyphicon-floppy-disk"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- correo de pago --}}
            @if($Correos->pago == '1')
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="box-title">
                            <h3 class="white">Configuración de la Plantilla de Correo Pago</h3>
                        </div>
                    </div>
                    <div class="box-body">
                            <form class="" action="{{route('setting-save-plantilla')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="plantilla" value="pago">
                                <input type="hidden" name="idplantilla" value="{{(!empty($plantillaP->id)) ? $plantillaP->id : '' }}">
                                <div class="form-group">
                                    <label for="" class="white">Titulo del Correo</label>
                                    <input type="text" name="titulo" class="form-control"
                                        value="{{(!empty($plantillaP->titulo)) ? $plantillaP->titulo : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="white">Contenido del Correo</label>
                                    <textarea name="correo1" cols="30"
                                        rows="10">{{(!empty($plantillaP->contenido)) ? $plantillaP->contenido : '' }}</textarea>
                                    <p class="help-block white">Las Variables de abajo son dinamica, al colocar esas variables se colocara la
                                        informacion perteneciente a los usuarios</p>
                                </div>
                                <div class="form-group white">
                                    <label for="">Variables que pueden usar</label>
                                    <span class="var">@nombrecompleto</span>
                                    <span class="var">@correo</span>
                                    <span class="var">@pago</span>
                                    <span class="var">@usuario</span>
                                    <span class="var">@idpatrocinio</span>
                                </div>
                                <div class="form-group col-sm-12 ji">
                                    <div class="form-group col-sm-6">
                                        <button type="button" class="btn btn-danger btn-block mostrar" style="display:none;"
                                            onclick="toggle()">Cancelar</button>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <button type="submit" class="btn green btn-block"> Guardar <span
                                                class="glyphicon glyphicon-floppy-disk"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            @endif
            
            @if($Correos->compra == '1')
            {{-- correo de Compra --}}
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="box-title">
                            <h3 class="white">Configuración de la Plantilla de Compra</h3>
                        </div>
                    </div>
                    <div class="box-body">
                        
                        <div class="col-md-12">
                        <div class="alert alert-warning" role="alert">
                            <h5> La variable Datos contiene el nombre del producto como la cantidad (Si a colocado iva a los productos esta contendra el valor del iva)
                            estas no pueden ser colocadas por separado</h5>
                          </div>
                         </div>
                            <form class="" action="{{route('setting-save-plantilla')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="plantilla" value="compra">
                                <input type="hidden" name="idplantilla" value="{{(!empty($plantillaC->id)) ? $plantillaC->id : '' }}">
                                <div class="form-group">
                                    <label for="" class="white">Titulo del Correo</label>
                                    <input type="text" name="titulo" class="form-control"
                                        value="{{(!empty($plantillaC->titulo)) ? $plantillaC->titulo : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="white">Contenido del Correo</label>
                                    <textarea name="correo2" cols="30"
                                        rows="10">{{(!empty($plantillaC->contenido)) ? $plantillaC->contenido : '' }}</textarea>
                                    <p class="help-block white">Las Variables de abajo son dinamica, al colocar esas variables se colocara la
                                        informacion perteneciente a los usuarios</p>
                                </div>
                                <div class="form-group white">
                                    <label for="">Variables que pueden usar</label>
                                    <span class="var">@nombre</span>
                                    <span class="var">@correo</span>
                                    <span class="var">@datos</span>
                                    <span class="var">@fecha</span>
                                    <span class="var">@total</span>
                                </div>
                                <div class="form-group col-sm-12 ji">
                                    <div class="form-group col-sm-6">
                                        <button type="button" class="btn btn-danger btn-block mostrar" style="display:none;"
                                            onclick="toggle()">Cancelar</button>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <button type="submit" class="btn green btn-block"> Guardar <span
                                                class="glyphicon glyphicon-floppy-disk"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            @endif
            
            @if($Correos->pc == '1')
            {{-- correo de Pago Compra --}}
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="box-title">
                            <h3 class="white">Configuración de la Plantilla de Pago Compra</h3>
                        </div>
                    </div>
                    <div class="box-body">
                        
                        <div class="col-md-12">
                        <div class="alert alert-warning" role="alert">
                            <h5> La variable Datos contiene el nombre del producto como la cantidad (Si a colocado iva a los productos esta contendra el valor del iva)
                            estas no pueden ser colocadas por separado</h5>
                          </div>
                         </div>
                            <form class="" action="{{route('setting-save-plantilla')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="plantilla" value="pc">
                                <input type="hidden" name="idplantilla" value="{{(!empty($plantillaPC->id)) ? $plantillaPC->id : '' }}">
                                <div class="form-group">
                                    <label for="" class="white">Titulo del Correo</label>
                                    <input type="text" name="titulo" class="form-control"
                                        value="{{(!empty($plantillaPC->titulo)) ? $plantillaPC->titulo : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="white">Contenido del Correo</label>
                                    <textarea name="correo3" cols="30"
                                        rows="10">{{(!empty($plantillaPC->contenido)) ? $plantillaPC->contenido : '' }}</textarea>
                                    <p class="help-block white">Las Variables de abajo son dinamica, al colocar esas variables se colocara la
                                        informacion perteneciente a los usuarios</p>
                                </div>
                                <div class="form-group white">
                                    <label for="">Variables que pueden usar</label>
                                    <span class="var">@nombre</span>
                                    <span class="var">@correo</span>
                                    <span class="var">@datos</span>
                                    <span class="var">@fecha</span>
                                    <span class="var">@total</span>
                                </div>
                                <div class="form-group col-sm-12 ji">
                                    <div class="form-group col-sm-6">
                                        <button type="button" class="btn btn-danger btn-block mostrar" style="display:none;"
                                            onclick="toggle()">Cancelar</button>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <button type="submit" class="btn green btn-block"> Guardar <span
                                                class="glyphicon glyphicon-floppy-disk"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            @endif
            
            @if($Correos->liquidacion == '1')
            {{-- correo de Liquidacion --}}
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="box-title">
                            <h3 class="white">Configuración de la Plantilla Liquidacion</h3>
                        </div>
                    </div>
                    <div class="box-body">
                        
                        <div class="col-md-12">
                        <div class="alert alert-warning" role="alert">
                            <h5> La variable Datosbancarios contiene el Numero de cuenta, Tipo de Cuenta, Nombre del banco</h5>
                          </div>
                         </div>
                            <form class="" action="{{route('setting-save-plantilla')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="plantilla" value="liquidacion">
                                <input type="hidden" name="idplantilla" value="{{(!empty($plantillaL->id)) ? $plantillaL->id : '' }}">
                                <div class="form-group">
                                    <label for="" class="white">Titulo del Correo</label>
                                    <input type="text" name="titulo" class="form-control"
                                        value="{{(!empty($plantillaL->titulo)) ? $plantillaL->titulo : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="white">Contenido del Correo</label>
                                    <textarea name="correo4" cols="30"
                                        rows="10">{{(!empty($plantillaL->contenido)) ? $plantillaL->contenido : '' }}</textarea>
                                    <p class="help-block white">Las Variables de abajo son dinamica, al colocar esas variables se colocara la
                                        informacion perteneciente a los usuarios</p>
                                </div>
                                <div class="form-group white">
                                    <label for="">Variables que pueden usar</label>
                                    <span class="var">@nombre</span>
                                    <span class="var">@correo</span>
                                    <span class="var">@datosbancarios</span>
                                    <span class="var">@fecha</span>
                                    <span class="var">@total</span>
                                </div>
                                <div class="form-group col-sm-12 ji">
                                    <div class="form-group col-sm-6">
                                        <button type="button" class="btn btn-danger btn-block mostrar" style="display:none;"
                                            onclick="toggle()">Cancelar</button>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <button type="submit" class="btn green btn-block"> Guardar <span
                                                class="glyphicon glyphicon-floppy-disk"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            @endif
            
            
            
            
            {{-- correo de Prospeccion --}}
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="box-title">
                            <h3 class="white">Configuración de la Plantilla Prospeccion</h3>
                        </div>
                    </div>
                    <div class="box-body">
                        
                            <form class="" action="{{route('setting-save-plantilla')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="hidden" name="plantilla" value="prospeccion">
                                <input type="hidden" name="idplantilla" value="{{(!empty($plantillaPros->id)) ? $plantillaPros->id : '' }}">
                                <div class="form-group">
                                    <label for="" class="white">Titulo del Correo</label>
                                    <input type="text" name="titulo" class="form-control"
                                        value="{{(!empty($plantillaPros->titulo)) ? $plantillaPros->titulo : '' }}">
                                </div>
                                <div class="form-group">
                                    <label for="" class="white">Contenido del Correo</label>
                                    <textarea name="correo5" cols="30"
                                        rows="10">{{(!empty($plantillaPros->contenido)) ? $plantillaPros->contenido : '' }}</textarea>
                                    <p class="help-block white">Las Variables de abajo son dinamica, al colocar esas variables se colocara la
                                        informacion perteneciente a los usuarios</p>
                                </div>
                                <div class="form-group white">
                                    <label for="">Variables que pueden usar</label>
                                    <span class="var">@nombrecompleto</span>
                                    <span class="var">@usuario</span>
                                    <span class="var">@correo</span>
                                    <span class="var">@idpatrocinio</span>
                                </div>
                                <div class="form-group col-sm-12 ji">
                                    <div class="form-group col-sm-6">
                                        <button type="button" class="btn btn-danger btn-block mostrar" style="display:none;"
                                            onclick="toggle()">Cancelar</button>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <button type="submit" class="btn green btn-block"> Guardar <span
                                                class="glyphicon glyphicon-floppy-disk"></span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>