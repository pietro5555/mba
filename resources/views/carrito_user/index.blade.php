@extends('layouts.landing')

@section('content')
<style>
    .color-green{
        color: #6ab742;
    }

    .btn-color-green{
        background: #6ab742;
    }
</style>

@if (Session::has('msj-exitoso'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            <strong>{{ Session::get('msj-exitoso') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

@if (Session::has('msj-error'))
        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
            <strong>{{ Session::get('msj-error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

<div class="title-page-one_course col-md border-bottom-2">
    <h6>Carrito</h6>
    <hr style="border: 1px solid #707070;opacity: 1;" />    
</div>
<div class="col-12 mb-2">
    <div class="row">
        <div class="col-12 col-md-6">
             <div class="d-block d-sm-block d-md-none float-right">
               <a class="btn btn-primary " href="{{route('shopping-cart.membership')}}"><i class="fas fa-chevron-circle-left"></i> Atrás</a> 
            </div><br>
            @auth
            @include('carrito_user.componente.logueado')
            @include('carrito_user.componente.messages')
            @else
            @include('carrito_user.componente.sinloguear')
            @include('carrito_user.componente.messages')
            @endauth

        </div>
        <div class="col-12 col-md-6 p-4" style="background: #363840">
            @include('carrito_user.componente.tabla')
        </div>
    </div>
</div>

<script>
    function pagarS() {
      event.preventDefault();

        if (!$("#check_deacuerdo").prop('checked')) {
            alert("Debe estar de acuerdo con los términos y condiciones!");
            return false;
        }else{
          $('#stripe .stripe-button-el').click()
        }
    }
    function pagarS2() {
      event.preventDefault();
        if (!$("#check_deacuerdo2").prop('checked')) {
            alert("Debe estar de acuerdo con los términos y condiciones para la compra de membresía!");
            return false;
        }else{
            $('#stripe2 .stripe-button-el').click()
        }
    }
    function pagarC() {
      event.preventDefault();
        if (!$("#check_deacuerdo").prop('checked')) {
            alert("Debe estar de acuerdo con los términos y condiciones!");
            return false;
        }else{
          $('#form-coin').submit()
        }
    }


    function pagarC2() {
      event.preventDefault();
        if (!$("#check_deacuerdo2").prop('checked')) {
            alert("¡Debe estar de acuerdo con los términos y condiciones para la compra de membresía!");
            return false;
        }else{
          $('#form-coin2').submit()
        }
    }

        //pagar  con billetera
    function pagarB() {
      event.preventDefault();
        if (!$("#check_deacuerdo").prop('checked')) {
            alert("Debe estar de acuerdo con los términos y condiciones!");
            return false;
        }else{
          $('#form-billetera').submit()
        }
    }

    
    function pagarB2() {
      event.preventDefault();
        if (!$("#check_deacuerdo2").prop('checked')) {
            alert("¡Debe estar de acuerdo con los términos y condiciones para la compra de membresía!");
            return false;
        }else{
          $('#form-billetera2').submit()
        }
    }


        //pagar  con paypal
    function pagarPaypal() {
      event.preventDefault();
        if (!$("#check_deacuerdo").prop('checked')) {
            alert("Debe estar de acuerdo con los términos y condiciones!");
            return false;
        }else{
          $('#form-paypal').submit()
        }
    }

    
    function pagarPaypal2() {
      event.preventDefault();
        if (!$("#check_deacuerdo2").prop('checked')) {
            alert("¡Debe estar de acuerdo con los términos y condiciones para la compra de membresía!");
            return false;
        }else{
          $('#form-paypal2').submit()
        }
    }

    function toggle() {
    $('.mostrar').toggle('slow')
    }

</script>

@endsection
