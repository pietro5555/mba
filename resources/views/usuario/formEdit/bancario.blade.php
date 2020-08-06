<div class="col-md-12">
    @if(Auth::user()->ID == $data['principal']->ID || Auth::user()->rol_id == 0)
    <button type="button" class="btn green padding_both_small" onclick="modalCodigo(3, 'banco');"
        style="margin-top:5px; float: right !important;">Editar</button>
        
        @endif
</div>
<form action="{{ action($controler, ['data' => 'bancarios']) }}" method="post">
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    <input name="id" type="hidden" value="{{$data['segundo']->ID}}">

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Nombre del Banco</label>

        <input name="banco" type="text" placeholder="{{$data['segundo']->banco}}" class="form-control banco"
            value="{{$data['segundo']->banco}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Tipo de cuenta</label>

        <input name="tipocuenta" type="text" placeholder="{{$data['segundo']->tipocuenta}}" class="form-control banco"
            value="{{$data['segundo']->tipocuenta}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Titular de la cuenta</label>

        <input name="titular" type="text" placeholder="{{$data['segundo']->titular}}" class="form-control banco"
            value="{{$data['segundo']->titular}}" disabled>
    </div>
    
    <div class="form-group" style="margin-bottom: 15px;">
        <label>Documento identidad del tutular de la cuenta</label>

        <input name="documento_identidad_titular" type="text" placeholder="{{$data['segundo']->documento_identidad_titular}}" class="form-control banco"
            value="{{$data['segundo']->documento_identidad_titular}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Número de cuenta</label>

        <input name="cuenta" type="number" step="any" placeholder="{{$data['segundo']->cuenta}}"
            class="form-control banco" value="{{$data['segundo']->cuenta}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Código Swift</label>

        <input name="swift" type="text" placeholder="{{$data['segundo']->swift}}" class="form-control banco"
            value="{{$data['segundo']->swift}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Numero PAN</label>

        <input name="pan" type="number" step="any" placeholder="{{$data['segundo']->pan}}" class="form-control banco"
            value="{{$data['segundo']->pan}}" disabled>
    </div>

    <div class="col-md-12" id="botom3" style="display: none;">
        <button type="button" class="btn btn-danger" onclick="cancelarBanco();"
            style="margin-top:5px; float: left !important; font-size: 12px;">cancelar</button>
        <button type="submit" class="btn green padding_both_small" style="margin-top:5px; margin-left:10px;">Enviar</button>
    </div>

</form>