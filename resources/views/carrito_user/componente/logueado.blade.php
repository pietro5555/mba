<div class="col-12">
    @php
        $public_key = 'pk_live_51HQmTBFKU1xhP2bFEs29RlQMiYvIXZysowWVmoPXNbxyCzuDAwYIhz2KSkuhpbtJFjhHMcEQpXRm7QecxBdVcMUT00E1FnHTdg';
    @endphp
    @if (is_null($membresia))
    <h3 class="text-center text-white">
        <strong>
            <small>TOTAL A PAGAR:</small>
            <span class="color-green">{{$totalItems}} USD</span>
        </strong>
    </h3>
    <div class="col-12 text-center mt-3 text-white">
        @if ($totalItems != 0)
        <div class="form-group mt-3">
            <input type="checkbox" form="form-control" id="check_deacuerdo">
            <label for="">Acepto los Términos y Condiciones</label>
        </div>
        
        <h5 class="">Selecione medio de pago</h5>
        <div class="form-group">
            <button class="btn text-white btn-color-green" onclick="pagarS()">Tarjeta</button>
            <button class="btn text-white btn-color-green" onclick="pagarC()">Cripto</button><br><br>
        </div>
        @endif
    </div>
    <div id="stripe" class="stripe d-none">
        <form action="{{route('shopping-cart.pay-membership-stripe')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="metodo" value="stripe">
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{ $public_key }}"
                data-amount="{{($totalItems * 100)}}"
                data-name="Compra"
                data-description="Compra Membresia"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto">
            </script>
        </form>
        <form action="{{route('shopping-cart.pay-membership-coinpayment')}}" method="post" id="form-coin">
            {{ csrf_field() }}
            <input type="hidden" name="metodo" value="cripto">
        </form>
    </div>
    @endif
    
    @if (!is_null($membresia))
        {{-- <hr style="background-color: white;"> --}}

        <h3 class="text-center text-white">
            <strong>
                <small>COMPRAR OFERTA POR:</small>
                <span class="color-green">{{($totalItems)}} USD</span>
            </strong>
        </h3>
        <div class="col-12 text-center mt-3 text-white">
            <div class="form-group mt-3">
                <input type="checkbox" form="form-control" id="check_deacuerdo2">
                <label for="">Acepto los Términos y Condiciones</label>
            </div>
            <h5 class="">Selecione medio de pago</h5>
            <div class="form-group">
                <button class="btn text-white btn-color-green" onclick="pagarS2()">Tarjeta</button>
                <button class="btn text-white btn-color-green" onclick="pagarC2()">Cripto</button><br><br>
            </div>
        </div>
        <div id="stripe2" class="stripe2 d-none">
            <form action="{{route('shopping-cart.finish')}}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="metodo" value="stripe">
                <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="{{ $public_key }}"
                    data-amount="{{($totalItems * 100)}}"
                    data-name="Compra"
                    data-description="Comprar Oferta"
                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                    data-locale="auto">
                </script>
            </form>
            <form action="{{route('shopping-cart.finish')}}" method="post" id="form-coin2">
                {{ csrf_field() }}
                <input type="hidden" name="metodo" value="cripto">
            </form>
        </div>
    @endif
    
</div>