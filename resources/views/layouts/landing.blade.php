<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="Expires" content="0" />
        <meta http-equiv="Pragma" content="no-cache" />
        <title>{{ $settings->name }}</title>

        <link rel="stylesheet" href="{{ asset('bootstrap-4.5.1/css/bootstrap.min.css') }}">
        <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
        <link href="https://emoji-css.afeld.me/emoji.css" rel="stylesheet">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

        <!-- css para la vista de anotaciones y mas -->
        <link rel="stylesheet" href="{{asset('css/anotaciones-simple.css')}}">

        <style>
            .goog-te-gadget-simple{
                display: inline-block;
                text-align: center;
                vertical-align: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                border: 1px solid;
                padding: .375rem .75rem !important;
                font-size: 1rem !important;
                line-height: 1.5;
                transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                background-color: #007bff !important;
                border-color: #007bff !important;
                border-radius: 25px !important;
                font-weight: bold;
            }
            .goog-te-gadget-simple .goog-te-menu-value span{
                color: #fff !important;
            }

            .goog-te-gadget-icon{
                display: none;
            }
        </style>
        
        @stack('styles')
        
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};

            var base_url = '{{ url('/') }}';
            var assetsPath = base_url + '/assets';
        </script>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            @include('layouts.partials.sidebar')

            <!-- Page Content -->
            <div class="bg-dark-gray" id="page-content-wrapper">
                @include('layouts.partials.header')
                
                @yield('content')

                <div class="section-paises">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 py-5">
                                <div class="mb-2 text-center">
                                    <img src="{{ asset('images/50impact.png')}}" alt="" height="32px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/icf.png')}}" alt="" height="32px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/no_work_no_money.png')}}" alt="" height="32px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/fenttix.png')}}" alt="" height="32px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/platinum.png')}}" alt="" height="32px" class="mr-md-2 mr-3">

                                </div>
                                <div class="mb-2 text-center text-white">
                                    PAISES EN DONDE ESTAMOS PRESENTES
                                </div>
                                <div class="mb-2 text-center">
                                    <img src="{{ asset('images/usa.png')}}" height="40px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/españa.png')}}" height="40px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/rusia.png')}}" height="40px" width="40px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/marruecos.png')}}" height="40px" width="40px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/japon.png')}}" height="40px" width="40px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/cuba.png')}}" height="40px" width="40px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/colombia.png')}}" height="40px" width="40px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/ecuador.png')}}" height="40px" width="40px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/mexico.png')}}" height="40px" width="40px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/peru.png')}}" height="40px" width="40px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/venezuela.png')}}" height="40px" width="40px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/paraguay.png')}}" height="40px" width="40px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/vietnam.png')}}" height="40px" width="40px" class="mr-md-2 mr-3">
                                </div>
                                <div class="mb-2 text-center text-white">
                                    Próximamente aceptaremos
                                    <img src="{{ asset('images/visa.png')}}" height="15px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/mastercard.png')}}" height="15px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/american.png')}}" height="15px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/stripe.png')}}" height="15px"class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/square.png')}}" height="15px"class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/apple_pay.png')}}" height="15px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/bitpay.png')}}" height="15px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/g_pay.png')}}" height="15px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/amazon_pay.png')}}" height="15px" class="mr-md-2 mr-3">
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                @include('layouts.partials.footer')
            </div>
            <!-- /#page-content-wrapper -->
        </div>
        <!-- /#wrapper -->

        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'en, es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true}, 'google_translate_element');
                setTimeout(() => {
                    $('.goog-te-menu-value > span:first').html('Idioma')
                }, 1000);
                }
            </script>

        <!-- Bootstrap core JavaScript -->
        <script src="https://kit.fontawesome.com/d6f2727f64.js" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="{{ asset('bootstrap-4.5.1/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('bootstrap-4.5.1/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>

        @stack('scripts')
    </body>
</html>
