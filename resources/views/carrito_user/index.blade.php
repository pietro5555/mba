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
<div class="title-page-one_course col-md border-bottom-2">
    <h6>Carrito</h6>
    <hr style="border: 1px solid #707070;opacity: 1;" />
</div>
<div class="col-12 mb-2">
    <div class="row">
        <div class="col-12 col-md-6 d-flex align-items-center">
            @auth
            @include('carrito_user.componente.logueado')
            @else
            @include('carrito_user.componente.sinloguear')
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
          $('.stripe-button-el').click()
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
            alert("Debe estar de acuerdo con los términos y condiciones!");
            return false;
        }else{
          $('#form-coin2').submit()
        }
    }
</script>

@endsection
