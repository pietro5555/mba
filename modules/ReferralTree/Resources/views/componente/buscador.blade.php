<div class="col-xs-12">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">
                Buscar Usuarios
            </h3>
        </div>
        <div class="box-body">
            <form action="{{route('moretree2')}}" method="post" class="form-inline">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">ID a Buscar</label>
                    <input type="number" step="1" name="id" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>