@extends('layouts.dashboardnew')

@section('content')


<div class="col-xs-12">
    <div class="box">
        <div class="box-body">
            {{-- informacion --}}
            <div class="col-xs-12 mostrar">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="box-title white">
                            <h3>Información del Metodo de Activacion </h3>
                            <button class="btn btn-info btn-block mostrar hh toggle">Editar</button>
                        </div>
                    </div>
                    <div class="box-body white">
                        @empty(!$settingAct)
                        <div class="col-sm-3 col-xs-12 ch">
                            <h3>Tipo de Activacion</h3>
                            @empty(!$settingAct->tipoactivacion)
                            <h5>
                                @if ($settingAct->tipoactivacion == 1)
                                Producto
                                @elseif ($settingAct->tipoactivacion == 2)
                                Monto Minimo
                                @endif
                            </h5>
                            @endempty
                        </div>
                        <div class="col-sm-3 col-xs-12 ch">
                            <h3>Tipo de Recompra</h3>
                            @empty(!$settingAct->tiporecompra)
                            <h5>
                                @if ($settingAct->tiporecompra == 1)
                                Producto
                                @elseif ($settingAct->tiporecompra == 2)
                                Monto Minimo
                                @endif
                            </h5>
                            @endempty
                        </div>
                        <div class="col-sm-3 col-xs-12 ch">
                            <h3>Requisto Activacion</h3>
                            @empty(!$settingAct->tipoactivacion && !$settingAct->requisitoactivacion)
                            <h5>
                                @if ($settingAct->tipoactivacion == 1)
                                ID Producto :
                                @elseif ($settingAct->tipoactivacion == 2)
                                Monto Minimo :
                                @endif
                                {{$settingAct->requisitoactivacion}}
                            </h5>
                            @endempty
                        </div>
                        <div class="col-sm-3 col-xs-12 ch kl">
                            <h3>Requisto Recompra</h3>
                            @empty(!$settingAct->tiporecompra && !$settingAct->requisitorecompra)
                            <h5>
                                @if ($settingAct->tiporecompra == 1)
                                ID Producto :
                                @elseif ($settingAct->tiporecompra == 2)
                                Monto Minimo :
                                @endif
                                {{$settingAct->requisitorecompra}}
                            </h5>
                            @endempty
                        </div>
                        <div class="col-sm-3 col-xs-12 ch">
                            <h3>Tipo de Activacion</h3>
                            @empty(!$settingAct->desactivar_usuario)
                            <h5>
                                @if ($settingAct->desactivar_usuario == 0)
                                Desactivar usuario al final del mes
                                @elseif ($settingAct->desactivar_usuario == 1)
                                Desactivar usuario al cumplir los 30 dias activos
                                @endif
                            </h5>
                            @endempty
                        </div>
                        @endempty
                    </div>
                </div>
            </div>
            {{-- informacion fin --}}
            {{-- formulario --}}
            <div class="col-xs-12 mostrar" style="display:none;">
                <div class="box box-info">
                    <div class="box-header">
                        <div class="box-title white">
                                <h3>Configuración del Proceso de Activacion del Sistema </h3>
                                <button class="btn btn-info btn-block mostrar hh" onclick="toggle()">Editar</button>
                        </div>
                    </div>
                    <div class="box-body">
                        <form class="" action="{{route('setting-save-activacion')}}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{(!empty($settingAct->id)) ? $settingAct->id : ''}}">
                            <div class="form-group col-sm-6 col-xs-12 ptr">
                                <label for="" class="white">Tipo de Activacion</label>
                                <select class="form-control" name="activacion" id="activacion" required
                                    onchange="activaciondetalle()">
                                    <option value="" selected disabled>Seleccione una Opción</option>
                                    <option value="1">Activacion por Producto</option>
                                    <option value="2">Activacion por Monto Minimo</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12 ptr">
                                <label for="" class="white">Activacion por Recompra</label>
                                <select class="form-control" name="recompra" id="recompra" onchange="recompradetalle()">
                                    <option value="" selected disabled>Seleccione una Opción</option>
                                    <option value="0">No Aplica</option>
                                    <option value="1">Recompra por Producto</option>
                                    <option value="2">Recompra por Monto Minimo</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12 ptr">
                                <label for="" id="r_activacion"></label>
                                <input type="text" class="form-control" placeholder="Requisito Activacion"
                                    name="requisito_a" required>
                            </div>
                            <div class="form-group col-sm-6 col-xs-12 ptr">
                                <label for="" id="r_recompra"></label>
                                <input type="text" class="form-control" placeholder="Requisitos Recompra"
                                    name="requisito_r">
                            </div>
                            <div class="form-group col-sm-12 ji">
                                <div class="form-group col-sm-6">
                                    <button class="btn btn-danger btn-block mostrar" style="display:none;"
                                        onclick="toggle()">Cancelar</button>
                                </div>
                                <div class="form-group col-sm-6">
                                    <button type="submit" class="btn btn-success btn-block"> Guardar <span
                                            class="glyphicon glyphicon-floppy-disk"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- formulario fin --}}
        </div>
    </div>
</div>

@endsection

@push('script')
<script type="text/javascript">
    function toggle() {
        $('.mostrar').toggle('slow')
    }

    function activaciondetalle() {
        let valor = $('#activacion').val()
        if (valor == 1) {
            $('#r_activacion').text('ID del Producto Para la Activacion')
        } else {
            $('#r_activacion').text('Monto Minimo Para la Activacion')
        }
    }

    function recompradetalle() {
        let valor = $('#recompra').val()
        if (valor == 1) {
            $('#r_recompra').text('ID del Producto Para la Recompra')
        } else {
            $('#r_recompra').text('Monto Minimo Para la Recompra')
        }
    }
</script>
@endpush