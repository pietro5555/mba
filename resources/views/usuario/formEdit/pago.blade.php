<div class="col-md-12">
    @if(Auth::user()->ID == $data['principal']->ID || Auth::user()->rol_id == 0)
    <button type="button" class="btn green padding_both_small" onclick="modalCodigo(4, 'pago');"
        style="margin-top:5px; float: right !important;">Editar</button>
        
        @endif
</div>
<form action="{{ action($controler, ['data' => 'pago']) }}" method="post"
    enctype="multipart/form-data">
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    <input name="id" type="hidden" value="{{$data['segundo']->ID}}">

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Cuenta Paypal</label>

        <input name="paypal" id="paypal" type="text" placeholder="{{$data['segundo']->paypal}}" class="form-control pago"
            value="{{$data['segundo']->paypal}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Dirección de Blocktrail</label>

        <input name="blocktrail" id="blocktrail" type="text" placeholder="{{$data['segundo']->blocktrail}}"
            class="form-control pago" value="{{$data['segundo']->blocktrail}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Dirección de blockchain</label>

        <input name="blockchain" id="blockchain" type="text" placeholder="{{$data['segundo']->blockchain}}"
            class="form-control pago" value="{{$data['segundo']->blockchain}}" disabled>
    </div>

    <div class="form-group" style="margin-bottom: 15px;">
        <label>Bitgo Address</label>

        <input name="bitgo" id="Bitgo" type="text" placeholder="{{$data['segundo']->bitgo}}" class="form-control pago"
            value="{{$data['segundo']->bitgo}}" disabled>
    </div>
    
     <div class="form-group" style="margin-bottom: 15px;">
        <label>Dirección BTC</label>

        <input name="btc" id="btc" type="text" placeholder="{{$data['segundo']->btc}}" class="form-control pago"
            value="{{$data['segundo']->btc}}" disabled>
    </div>

    <div class="new_line"></div>

    <h3>Metodo De Pago</h3>
    <hr>

    <div class="form-group" style="margin-bottom: 15px;">

        <select class="form-control pago form-control pago-solid placeholder-no-fix form-group" name="pago" id="metodo"
            value="{{$data['segundo']->pago}}" disabled>
            <option value="Banco" @if($data['segundo']->pago == 'Banco' ) selected @endif>Banco</option>
            <option value="Paypal" @if($data['segundo']->pago == 'Paypal' ) selected @endif>Paypal
            </option>
            <option value="Blocktrail" @if($data['segundo']->pago == 'Blocktrail' ) selected
                @endif>Blocktrail
            </option>
            <option value="Blockchain" @if($data['segundo']->pago == 'Blockchain' ) selected
                @endif>Blockchain
            </option>
            <option value="Bitgo" @if($data['segundo']->pago == 'Bitgo' ) selected @endif>Bitgo</option>
        </select>
    </div>

    <div class="col-md-12" id="botom4" style="display: none;">
        <button type="button" class="btn btn-danger" onclick="cancelarPago();"
            style="margin-top:5px; float: left !important; font-size: 12px;">cancelar</button>
        <button type="submit" class="btn green padding_both_small"
            style="margin-top:5px; margin-left:10px;">Enviar</button>
    </div>

</form>