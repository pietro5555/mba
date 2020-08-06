<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Filtrar por fecha</h3>
        </div>
        <div class="box-body">
            <form method="POST" action="{{ route($ruta) }}" class="form-inline">
                {{ csrf_field() }}
                @empty(!$form)
                <input type="hidden" name="form" value="{{$form}}">
                @endempty
                <div class="form-group has-feedback date col-xs-12 col-md-4">
                    <label class="control-label">Fecha desde</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
                        name="fecha1" required />
                </div>
                <div class="form-group has-feedback date col-xs-12 col-md-4">
                    <label class="control-label">Fecha hasta</label>
                    <input class="form-control form-control-solid placeholder-no-fix" type="date" autocomplete="off"
                        name="fecha2" required />
                </div>
                <div class="form-group has-feedback date col-xs-12 col-md-2">
                    <button class="btn green padding_both_small" type="submit" id="btn">
                        buscar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>