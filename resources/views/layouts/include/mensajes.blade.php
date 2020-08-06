{{-- mensajes de errores de formularios --}}
@if($errors->any())
<div class="col-md-12">
    <div class="alert alert-danger">
        <button class="close" data-close="alert"></button>
        <span>
            <ul class="no-margin">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </span>
    </div>
</div>
<hr>
@endif

{{-- mensajes por tipo --}}
@if (Session::has('msj'))
<div class="col-md-12">
    <div class="alert alert-{{Session::get('tipo')}}">
        <button class="close" data-close="alert"></button>
        <span>
            {{Session::get('msj')}}
        </span>
    </div>
</div>
<hr>
@endif