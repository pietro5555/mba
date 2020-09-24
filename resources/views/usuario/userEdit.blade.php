@extends('layouts.dashboardnew')

@section('content')

@include('usuario.formEdit.resumen')

<div class="col-md-12">
    <div class="box box-info">
        <div class="box-body">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item active">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true" aria-expanded="true">informacion Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                        aria-controls="profile" aria-selected="false">Informacion de contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                        aria-controls="contact" aria-selected="false">Perfil Social</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="bancaria-tab" data-toggle="tab" href="#bancaria" role="tab"
                        aria-controls="bancaria" aria-selected="false">Informacion bancaria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pagos-tab" data-toggle="tab" href="#pagos" role="tab" aria-controls="pagos"
                        aria-selected="false">Pagos</a>
                </li>
            </ul>
            <!-- Aquí es informacion personal -->

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                    @include('usuario.formEdit.personal', ['controler' => $data['controler']])
                </div>
                <!-- termina informacion personal -->

                <!-- Empieza informacion de Contacto -->
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @include('usuario.formEdit.contacto', ['controler' => $data['controler']])
                </div>
                <!-- Termina informacion de Contacto -->

                <!-- Empieza PErfil Social -->
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    @include('usuario.formEdit.social', ['controler' => $data['controler']])
                </div>
                <!-- Termina Perfil Social -->

                <!-- Empieza Informaion Bancaria -->
                <div class="tab-pane fade" id="bancaria" role="tabpanel" aria-labelledby="bancaria-tab">
                    @include('usuario.formEdit.bancario', ['controler' => $data['controler']])
                </div>
                <!-- Termina Informaion Bancaria -->

                <!-- Empieza Pagos -->
                <div class="tab-pane fade" id="pagos" role="tabpanel" aria-labelledby="pagos-tab">
                    @include('usuario.formEdit.pago', ['controler' => $data['controler']])
                </div>
            </div>
            <!-- Termina Pago -->
        </div>
    </div>
</div>
                
@endsection
@push('script')
<script>
    
    function cancelarPersonal() {
        $('.personal').attr('disabled', true)
        $('#botom0').hide('slow')
    }
    

    function cancelarContacto() {
        $('.contacto').attr('disabled', true)
        $('#botom1').hide('slow')
        $('.botom1').hide('slow')
    }

    function cancelarSocial() {
        $('.social').attr('disabled', true)
        $('#botom2').hide('slow')
    }

    function cancelarBanco() {
        $('.banco').attr('disabled', true)
        $('#botom3').hide('slow')
    }

    function cancelarPago() {
        $('.pago').attr('disabled', true)
        $('#botom4').hide('slow')
    }


     function activarPersonal() {
        $('.personal').attr('disabled', false)
        $('#botom0').show('slow')
    }
    

    function activarContacto() {
        $('.contacto').attr('disabled', false)
        $('#botom1').show('slow')
        $('.botom1').show('slow')
    }

    function activarSocial() {
        $('.social').attr('disabled', false)
        $('#botom2').show('slow')
    }

    function activarBanco() {
        $('.banco').attr('disabled', false)
        $('#botom3').show('slow')
    }

    function activarPago() {
        $('.pago').attr('disabled', false)
        $('#botom4').show('slow')
    }
    
</script>
@endpush