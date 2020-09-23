<div class="col-xs-12 mostrar">
    <div class="box box-info">
        <div class="box-header">
            <div class="box-title white">
                <h3>Información de los Rangos del Sistema </h3>
                <button class="btn btn-primary btn-block mostrar toggle">Editar</button>
            </div>
        </div>
        <div class="box-body">
            @empty(!$settingRol)
            <div class="col-sm-4 col-xs-12">
                <label class="texto-central white">Cantidad de Roles</label>
                <input class="form-control" readonly value="{{$settingRol->rangos}}">
            </div>
            @if ($settingRol->referidosd == 1)
            <div class="col-sm-4 col-xs-12">
                <label class="texto-central white">Rango por Referidos Directos</label>
                <input class="form-control" readonly value="SI">
            </div>
            @endif
            @if ($settingRol->referidosInd == 1)
            <div class="col-sm-4 col-xs-12">
                <label class="texto-central white">Rango por Referidos Indirectos</label>
                <input class="form-control" readonly value="SI">
            </div>
            @endif
            @if ($settingRol->referidos == 1)
            <div class="col-sm-4 col-xs-12">
                <label class="texto-central white">Rango por Referidos</label>
                <input class="form-control" readonly value="SI">
            </div>
            @endif
            @if($settingRol->referidosact == 1)
            <div class="col-sm-4 col-xs-12">
                <label class="texto-central white">Rango por Referidos Activos</label>
                <input class="form-control" readonly value="SI">
            </div>
            @endif
            @if($settingRol->compras == 1)
            <div class="col-sm-4 col-xs-12">
                <label class="texto-central white">Rango por Puntos Personales</label>
                <input class="form-control" readonly value="SI">
            </div>
            @endif
            @if($settingRol->grupal == 1)
            <div class="col-sm-4 col-xs-12">
                <label class="texto-central white">Rango por Puntos Grupales</label>
                <input class="form-control" readonly value="SI">
            </div>
            @endif
            @if($settingRol->valorpuntos > 0)
            <div class="col-sm-4 col-xs-12">
                <label class="texto-central white">Valor de los Puntos</label>
                <input class="form-control" readonly value="{{$settingRol->valorpuntos}}">
            </div>
            @endif
            @if($settingRol->comisiones == 1)
            <div class="col-sm-4 col-xs-12">
                <label class="texto-central white">Rango por Comisiones </label>
                <input class="form-control" readonly value="SI">
            </div>
            @endif
            @if($settingRol->niveles == 1)
            <div class="col-sm-4 col-xs-12">
                <label class="texto-central white">Afecta niveles</label>
                <input class="form-control" readonly value="SI">
            </div>
            @endif
            @if($settingRol->bonos == 1)
            <div class="col-sm-4 col-xs-12">
                <label class="texto-central white">Recibes Bono</label>
                <input class="form-control" readonly value="SI">
            </div>
            @endif
            @if($settingRol->rolnecesario == 1)
            <div class="col-sm-4 col-xs-12">
                <label class="texto-central white">Roles Necesarios en Red</label>
                <input class="form-control" readonly value="SI">
            </div>
            @endif
            @if($settingRol->reseteomensual == 1)
            <div class="col-sm-4 col-xs-12">
                <label class="texto-central white">Reseteo Mensual</label>
                <input class="form-control" readonly value="SI">
            </div>
            @endif
            <div class="col-xs-12 white">
                <h3>Rangos</h3>
            </div>
            @foreach ($rangos as $rango)
            <div class="col-xs-12">
                <div class="col-sm-4 col-xs-12">
                    <label class="texto-central white">Nombre Rango</label>
                    <input class="form-control" readonly value="{{$rango->name}}">
                </div>
                @if ($settingRol->referidosd == 1)
                <div class="col-sm-4 col-xs-12">
                    <label class="texto-central white">Cantidad de Referidos Directos</label>
                    <input class="form-control" readonly value="{{$rango->referidosd}}">
                </div>
                @endif
                @if ($settingRol->referidosInd == 1)
                <div class="col-sm-4 col-xs-12">
                    <label class="texto-central white">Cantidad de Referidos Indirectos</label>
                    <input class="form-control" readonly value="{{$rango->referidosInd}}">
                </div>
                @endif
                @if ($settingRol->referidos == 1)
                <div class="col-sm-4 col-xs-12">
                    <label class="texto-central white">Cantidad de Referidos </label>
                    <input class="form-control" readonly value="{{$rango->referidos}}">
                </div>
                @endif
                @if($settingRol->referidosact == 1)
                <div class="col-sm-4 col-xs-12">
                    <label class="texto-central white">Cantidad de Referidos Activos</label>
                    <input class="form-control" readonly value="{{$rango->refeact}}">
                </div>
                @endif
                @if($settingRol->compras == 1)
                <div class="col-sm-4 col-xs-12">
                    <label class="texto-central white">Total por Puntos Personales</label>
                    <input class="form-control" readonly value="{{$rango->compras}}">
                </div>
                @endif
                @if($settingRol->grupal == 1)
                <div class="col-sm-4 col-xs-12">
                    <label class="texto-central white">Total por Puntos Grupales</label>
                    <input class="form-control" readonly value="{{$rango->grupal}}">
                </div>
                @endif
                @if($settingRol->comisiones == 1)
                <div class="col-sm-4 col-xs-12">
                    <label class="texto-central white">Total por Comisiones </label>
                    <input class="form-control" readonly value="{{$rango->comisiones}}">
                </div>
                @endif
                @if($settingRol->niveles == 1)
                <div class="col-sm-4 col-xs-12">
                    <label class="texto-central white">Nivel Afectado</label>
                    <input class="form-control" readonly value="{{$rango->niveles}}">
                </div>
                @endif
                @if($settingRol->bonos == 1)
                <div class="col-sm-4 col-xs-12">
                    <label class="texto-central white">Total de Bono</label>
                    <input class="form-control" readonly value="{{$rango->bonos}}">
                </div>
                @endif
                @foreach ($rangos as $rango2)
                @if ($rango2->id == $rango->rolnecesario && $rango->rolnecesario != 0)
                <div class="col-sm-4 col-xs-12">
                    <label class="texto-central white">Rango Necesario en Red</label>
                    <input class="form-control" readonly value="{{$rango->rolnecesariocant}} - {{$rango2->name}}">
                </div>
                @endif
                @if ($rango2->id == $rango->rolprevio && $rango->rolprevio != 0)
                <div class="col-sm-4 col-xs-12">
                    <label class="texto-central white">Rango Previo</label>
                    <input class="form-control" readonly value="{{$rango2->name}}">
                </div>
                @endif
                @endforeach
                <div class="col-sm-4 col-xs-12">
                    <label class="texto-central white">Permite Cobrar Comision</label>
                    <input class="form-control" readonly value="{{($rango->acepta_comision == 1) ? 'SI':'NO'}}">
                </div>
                <hr class="col-xs-12">
            </div>
            @endforeach
            @endempty
        </div>
    </div>
</div>