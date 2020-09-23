<div class="col-12">
    <h3 class="text-center text-white">
        <strong>
            <small>TOTAL A PAGAR:</small>
            <span class="color-green">{{$totalItems}} USD</span>
        </strong>
    </h3>
    <div class="col-12 text-center mt-5 text-white">
        <div class="form-group mt-5">
            <input type="checkbox" form="form-control" id="check_deacuerdo">
            <label for="">Acepto los Términos y Condiciones</label>
        </div>
        <h5 class="">Selecione medio de pago</h5>
        <div class="form-group">
            <button class="btn text-white btn-color-green" onclick="pagarS()">Tarjeta</button>
            <button class="btn text-white btn-color-green" onclick="pagarC()">Cripto</button>
        </div>
    </div>
    <div class="stripe d-none">
        <form action="{{route('shopping-cart.finish')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="metodo" value="stripe">
            <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="{{ env('STRIPE_KEY') }}"
                data-amount="{{($totalItems * 100)}}"
                data-name="Compra"
                data-description="Compra Curso"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto">
            </script>
        </form>
        <form action="{{route('shopping-cart.finish')}}" method="post" id="form-coin">
            {{ csrf_field() }}
            <input type="hidden" name="metodo" value="cripto">
        </form>
    </div>
</div>