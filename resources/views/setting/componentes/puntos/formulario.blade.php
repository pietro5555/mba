{{-- fomulario --}}
<div class="col-xs-12 mostrar" style="display:none;">
    <div class="box box-info">
        <div class="box-header">
            <div class="box-title">
                <h3>Configuración de las comisiones del Sistema </h3>
                <button class="btn btn-info btn-block mostrar hh" onclick="toggle()">Editar</button>
            </div>
        </div>
        {{-- cuerpo formulario --}}
        <div class="box-body">
            <form class="" action="{{route('setting-save-puntos')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{(!empty($settingPuntos)) ? $settingPuntos->id : ''}}">
                
                <!--<div class="form-group col-sm-6 col-xs-12 ptr">
                    <label for="">Cantidad de niveles ó categorias de Comisión</label>
                    <input type="number" class="form-control" name="niveles" id="niveles" required
                        onkeyup="comisiondetalle()">
                </div>-->
                
                    <input type="hidden" class="form-control" name="niveles" id="niveles" required
                        onkeyup="comisiondetalle()" value="1">
                        
                <div class="form-group col-sm-4 col-xs-12 ptr">
                    <label for="">Tipo de Puntos</label>
                    <select class="form-control" name="tipocomision" id="tipocomision" required
                        onchange="comisiondetalle()">
                        <option value="" selected disabled>Seleccione una Opción</option>
                        <option value="producto">Produtos (Los Puntos dependeran del producto)
                        </option>
                    </select>
                </div>
                
                <div class="form-group col-sm-4 col-xs-12 ptr">
                    <label for="">Tipo de pago de los puntos</label>
                    <select class="form-control" name="tipopago" required>
                        <option value="" selected disabled>Seleccione una Opción</option>
                        <option value="normal">Valor Fijo</option>
                        <option value="porcentaje">Valor Por Porcentaje</option>
                    </select>
                </div>
                
                <div class="form-group col-sm-4 col-xs-12 ptr">
                    <label for="">Forma de ganar puntos</label>
                    <select class="form-control" name="tipopuntos" required>
                        <option value="" selected disabled>Seleccione una Opción</option>
                        <option value="propias">Puntos por Compras propias</option>
                        <option value="comision">Puntos por Comisones</option>
                        <option value="ambas">Ambas</option>
                    </select>
                </div>
                <div class="row form-group col-xs-12 ptr" style="background:#fff" id="valor2">

                </div>
                <div class="form-group col-sm-12 ji">
                    <div class="form-group col-sm-6">
                        <button class="btn btn-danger btn-block mostrar" style="display:none;"
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
{{-- formulario fin --}}