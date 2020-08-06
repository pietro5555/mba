<div class="col-xs-12 mostrar" style="display:none;">
    <div class="box box-info">
        <div class="box-header">
            <div class="box-title">
                <h3>Configuración del Proceso de Rangos del Sistema</h3>
                <button class="btn btn-danger btn-block mostrar" style="display:none;"
                    onclick="toggle()">Cancelar</button>
            </div>
        </div>
        <div class="box-body">
            <form class="" action="{{route('setting-save-rango')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" id="cantnivel" value="{{$cantnivel}}">
                <input type="hidden" name="idsetrol" value="{{(!empty($settingRol)) ? $settingRol->id : '' }}">
                <div class="form-group col-xs-12">
                    <label for="">Cantidad de roles</label>
                    <input class="form-control" type="number" name="cantrango" id="cantrango" required
                        onchange="detalleRango()">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="">¿Rango por Cantidad de Referidos Directos?</label>
                    <select class="form-control" name="s_referidoD" id="s_referidoD" onchange="detalleRango()">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="">¿Rango por Cantidad de Referidos Indiretos?</label>
                    <select class="form-control" name="s_referidoind" id="s_referidoind" onchange="detalleRango()">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="">¿Rango por Cantidad de Referidos (directos e indirectos)?</label>
                    <select class="form-control" name="s_referido" id="s_referido" onchange="detalleRango()">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="">¿Rango por Cantidad de Referidos Activos (directos e indirectos)?</label>
                    <select class="form-control" name="s_referidoact" id="s_referidoact" onchange="detalleRango()">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="">¿Rango por Puntos Personales?</label>
                    <select class="form-control" name="s_personal" id="s_personal" onchange="detalleRango()">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="">¿Rango por Puntos Grupales?</label>
                    <select class="form-control" name="s_grupal" id="s_grupal" onchange="detalleRango()">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-xs-12" style="display:none" id="vpuntos">
                    <label for="">¿Valor de los puntos?</label>
                    <input type="number" name="valorpuntos" class="form-control">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="">¿Rango por Comisiones Obtenidas?</label>
                    <select class="form-control" name="s_comisiones" id="s_comisiones" onchange="detalleRango()">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="">¿Los Rangos Afectan los niveles?</label>
                    <select class="form-control" name="s_nivel" id="s_nivel" onchange="detalleRango()">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="">¿Los Rangos Reciben Bonos?</label>
                    <select class="form-control" name="s_bono" id="s_bono" onchange="detalleRango()">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="">¿Para Subir se Necesita tener otro rango en la red?</label>
                    <select class="form-control" name="s_rolnecesario" id="s_rolnecesario" onchange="detalleRango()">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="">¿Los rangos se resetean mensualmente?</label>
                    <select class="form-control" name="s_reseteo" id="s_reseteo" onchange="detalleRango()">
                        <option value="" disabled selected>Seleccione una opción</option>
                        <option value="1">SI</option>
                        <option value="0">NO</option>
                    </select>
                </div>
                <div class="col-xs-12" id="rango"></div>
                <div class="form-group col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block"> Guardar <span
                            class="glyphicon glyphicon-floppy-disk"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>