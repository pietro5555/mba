{{-- fomulario --}}
<div class="col-xs-12 mostrar" style="display:none;">
    <div class="box box-info">
        <div class="box-header">
            <div class="box-title">
                <h3>Configuración de informe de Comisiones </h3>
                <button class="btn btn-info btn-block mostrar hh" onclick="toggle()">Editar</button>
            </div>
        </div>
        {{-- cuerpo formulario --}}
        <div class="box-body">
            <form class="" action="{{route('setting-save-ganancias')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{(!empty($ganancias)) ? $ganancias->id : ''}}">
                        
                <div class="form-group col-sm-6 col-xs-12 ptr">
                    <label for="">Tipo de Ganancias</label>
                    <select class="form-control" name="tipocomision" id="tipocomision" required
                        onchange="comisiondetalle()">
                        <option value="" selected disabled>Seleccione una Opción</option>
                        <option value="producto">Produtos (Todos los Productos)
                        </option>
                        <option value="categoria">categoria (Todos las Categorias)
                        </option>
                    </select>
                </div>
                
                <div class="form-group col-sm-6 col-xs-12 ptr" id="subcategoria" style="display:none;">
                    <label for="">Cantidad de Categorias</label>
                    <input type="number" class="form-control" name="niveles" id="niveles" 
                        onkeyup="comisiondetalle()">
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