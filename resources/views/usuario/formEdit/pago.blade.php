<div class="col-md-12">
    <div class="box box-info" style="border-radius: 10px;">
      <div class="box-body">


<h3 class="box-title white" style="margin-top: -5px; margin-bottom: 20px; padding: 15px 20px;border-radius: 20px; background-color: #d5d827; color: white;">Pagos

@if(Auth::user()->ID == $data['principal']->ID || Auth::user()->rol_id == 0)
    <button type="button" class="btn btn-success" onclick="activarPago();"
        style="float: right !important;"><i class="fas fa-edit"></i> Editar</button>
        
        @endif
    </h3>


<form action="{{ action($data['controler'], ['data' => 'pago']) }}" method="post"
    enctype="multipart/form-data">
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    <input name="id" type="hidden" value="{{$data['segundo']->ID}}">

    <div class="form-group col-md-12 white">
        <label>Cuenta Paypal</label>

        <input name="paypal" id="paypal" type="text" placeholder="{{$data['segundo']->paypal}}" class="form-control pago"
            value="{{$data['segundo']->paypal}}" disabled>
    </div>

    <div class="form-group col-md-12 white">
        <label>Dirección de Blocktrail</label>

        <input name="blocktrail" id="blocktrail" type="text" placeholder="{{$data['segundo']->blocktrail}}"
            class="form-control pago" value="{{$data['segundo']->blocktrail}}" disabled>
    </div>

    <div class="form-group col-md-12 white">
        <label>Dirección de blockchain</label>

        <input name="blockchain" id="blockchain" type="text" placeholder="{{$data['segundo']->blockchain}}"
            class="form-control pago" value="{{$data['segundo']->blockchain}}" disabled>
    </div>

    <div class="form-group col-md-12 white">
        <label>Bitgo Address</label>

        <input name="bitgo" id="Bitgo" type="text" placeholder="{{$data['segundo']->bitgo}}" class="form-control pago"
            value="{{$data['segundo']->bitgo}}" disabled>
    </div>
    
     <div class="form-group col-md-12 white">
        <label>Dirección BTC</label>

        <input name="btc" id="btc" type="text" placeholder="{{$data['segundo']->btc}}" class="form-control pago"
            value="{{$data['segundo']->btc}}" disabled>
    </div>

    <div class="col-md-12" id="botom4" style="display: none;">
        <button type="button" class="btn btn-danger" onclick="cancelarPago();"
            style="margin-top:5px; float: left !important; font-size: 12px;">cancelar</button>
        <button type="submit" class="btn green padding_both_small"
            style="margin-top:5px; margin-left:10px;">Enviar</button>
    </div>
   </div>
  </div>
 </div>   

</form>