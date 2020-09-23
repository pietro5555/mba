{{-- fomulario --}}
<div class="col-xs-12 mostrar" style="display:none;">
    <div class="box box-info">
        <div class="box-header">
            <div class="box-title">
                <h3 class="white">Configuración de las comisiones del Sistema </h3>
                <button class="btn btn-info btn-block mostrar hh" onclick="toggle()">Editar</button>
            </div>
        </div>
        {{-- cuerpo formulario --}}
        <div class="box-body">
            <form class="" action="{{route('setting-save-comision')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{(!empty($settingComision)) ? $settingComision->id : ''}}">
                <div class="form-group col-sm-6 col-xs-12 ptr">
                    <label for="" class="white">Cantidad de niveles ó categorias de Comisión</label>
                    <input type="number" class="form-control" name="niveles" id="niveles" required
                        onkeyup="comisiondetalle()">
                </div>
                <div class="form-group col-sm-6 col-xs-12 ptr">
                    <label for="" class="white">Tipo de Comisión</label>
                    <select class="form-control" name="tipocomision" id="tipocomision" required
                        onchange="comisiondetalle()">
                        <option value="" selected disabled>Seleccione una Opción</option>
                        <option value="general">General (Valor general para todos los niveles)</option>
                        <option value="detallado">Detallado (Valor detallado para todos los niveles)</option>
                        <option value="categoria">Categoria (Sera por las categorias de la tienda y los rangos del
                            sistema)
                        </option>
                        <option value="producto">Productos (La comision sera en base de los productos a cada nivel)
                        </option>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-xs-12 ptr" id="valor">

                </div>
                <div class="form-group col-sm-6 col-xs-12 ptr white">
                    <label for="" class="white">Tipo de pago de comision</label>
                    <select class="form-control" name="tipopago" required>
                        <option value="" selected disabled>Seleccione una Opción</option>
                        <option value="normal">Valor Fijo</option>
                        <option value="porcentaje">Valor Por Porcentaje</option>
                    </select>
                </div>
                <div class="row form-group col-xs-12 ptr" id="valor2">

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