<div class="col-md-12">
    @if(Auth::user()->ID == $data['principal']->ID || Auth::user()->rol_id == 0)
    <button type="button" class="btn green padding_both_small" onclick="modalCodigo(1, 'contacto');"
        style="margin-top:5px; float: right !important;">Editar</button>
        
        @endif
</div>
<form action="{{ action($controler, ['data' => 'contacto']) }}" method="post">
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    <input name="id" type="hidden" value="{{$data['segundo']->ID}}">

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Direccion Linea 1</label>

        <input name="dirección" type="text" placeholder="{{$data['segundo']->direccion}}" class="form-control contacto"
            value="{{$data['segundo']->direccion}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Direccion Linea 2</label>

        <input name="direccion2" type="text" placeholder="{{$data['segundo']->direccion2}}" class="form-control contacto"
            value="{{$data['segundo']->direccion2}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Pais</label>

        <input name="pais" type="text" placeholder="{{$data['segundo']->pais}}" class="form-control contacto"
            value="{{$data['segundo']->pais}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Estado</label>
        <input name="estado" type="text" placeholder="{{$data['segundo']->estado}}" class="form-control contacto"
            value="{{$data['segundo']->estado}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Ciudad</label>
        <input name="ciudad" type="text" placeholder="{{$data['segundo']->ciudad}}" class="form-control contacto"
            value="{{$data['segundo']->ciudad}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Codigo postal</label>
        <input name="codigo" type="number" placeholder="{{$data['segundo']->codigo}}" class="form-control contacto"
            value="{{$data['segundo']->codigo}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Celular</label>
        <input name="phone" type="number" placeholder="{{$data['segundo']->phone}}" class="form-control contacto"
            value="{{$data['segundo']->phone}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Telefono Fijo</label>
        <input name="fijo" type="number" placeholder="{{$data['segundo']->fijo}}" class="form-control contacto"
            value="{{$data['segundo']->fijo}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label for="">Correo</label>
        <input name="user_email" type="email" placeholder="{{$data['principal']->user_email}}" class="form-control contacto"
            value="{{$data['principal']->user_email}}" disabled>
        <div class="botom1" style="display: none;">
            <label for="">Confirmar Correo</label>
            <input name="user_email_confirmation" type="email" placeholder="{{$data['principal']->user_email}}"
                class="form-control contacto" value="{{$data['principal']->user_email}}">
        </div>
    </div>

    {{-- @if (Auth::user()->ID == $data['principal']->ID) --}}
    <div class="form-group" style="margin-bottom: 15px;">
            <label for="">Clave</label>
            <input name="clave" type="password" placeholder="***********" class="form-control contacto" disabled>
            
            <div class="botom1" style="display: none;">
                <label for="">Confirmar Clave</label>
                <input name="clave_confirmation" type="password" placeholder="***********" class="form-control contacto">
            </div>
        </div>
    {{-- @endif --}}

    <div class="col-md-12" id="botom1" style="display: none;">
        <button type="button" class="btn btn-danger" onclick="cancelarContacto();"
            style="margin-top:5px; float: left !important; font-size: 12px;">cancelar</a>
            <button type="submit" class="btn green padding_both_small"
                style="margin-top:5px; margin-left:10px; margin-bottom: 20px;">Enviar</button>
    </div>

</form>