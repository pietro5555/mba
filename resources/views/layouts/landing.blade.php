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
        <!-- css para cookies -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
        <style>
            .goog-te-gadget-simple{
                display: inline-block;
                text-align: center;
                vertical-align: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                font-size: 1rem !important;
                line-height: 1.5;
                transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                background-color: #007bff !important;
                border-color: #007bff !important;
                font-weight: bold;
                border-radius: 25px;
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
        <script>
                     $('document').ready(function () {
                    // RESTYLE THE DROPDOWN MENU
                    $('#google_translate_element').on("click", function () {

                    // Change font family and color
                    $("iframe").contents().find(".goog-te-menu2-item div, .goog-te-menu2-item:link div, .goog-te-menu2-item:visited div, .goog-te-menu2-item:active div, .goog-te-menu2 *")
                        .css({
                            'color': '#544F4B',
                            'font-family': 'Roboto',
                                            'width':'100%',
                        });
                    // Change menu's padding
                    $("iframe").contents().find('.goog-te-menu2-item-selected').css ('display', 'none');

                            // Change menu's padding
                    $("iframe").contents().find('.goog-te-menu2').css ('padding', '0px');
                    // Change the width of the languages
                    $("iframe").contents().find('.goog-te-menu2-item').css('width', '100%');
                    $("iframe").contents().find('td').css('width', '100%');

                    // Change hover effects
                    $("iframe").contents().find(".goog-te-menu2-item div").hover(function () {
                        $(this).css('background-color', '#007bff').find('span.text').css('color', 'white');
                    }, function () {
                        $(this).css('background-color', 'white').find('span.text').css('color', '#544F4B');
                    });

                    // Change Google's default blue border
                    $("iframe").contents().find('.goog-te-menu2').css('border', 'none');

                    // Change the iframe's box shadow
                    $(".goog-te-menu-frame").css('box-shadow', '0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.3)');
                    // Change iframes's size
                    $("iframe").contents().find('.goog-te-menu2').css({
                        'height': '100%',
                        'width': '100%',
                        'padding-bottom':'5px',
                    });

                    });
                    });

        </script>
        <script>
            $(document).ready(function(){ //Hacia arriba
              irArriba();
            });

            function irArriba(){
              $('.ir-arriba').click(function(){ $('body,html').animate({ scrollTop:'0px' },1000); });
              $(window).scroll(function(){
                if($(this).scrollTop() > 0){ $('.ir-arriba').slideDown(600); }else{ $('.ir-arriba').slideUp(600); }
              });
              $('.ir-abajo').click(function(){ $('body,html').animate({ scrollTop:'1000px' },1000); });
            }
                        
        </script>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            @include('layouts.partials.sidebar')

            <!-- Page Content -->
            <div class="bg-dark-gray" id="page-content-wrapper">
                @include('layouts.partials.header')

                @yield('content')
                     <div class="icon-bar">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//mybusinessacademypro.com/academia/" class="btn btn-social-media-icon btn-rounded facebook mt-2 mb-2" target="_blank"><i class="text-center fa fa-facebook"></i></a>
                        <a href="https://twitter.com/intent/tweet?text=https%3A//mybusinessacademypro.com/academia/" class="btn btn-social-media-icon btn-rounded twitter mt-2 mb-2" target="_blank"><i class="text-center fa fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/shareArticle?mini=true&url=https%3A//mybusinessacademypro.com/academia/&title=My%20Bussiness%20Academy%20Pro&summary=&source=" class="btn btn-social-media-icon btn-rounded linkedin mt-2 mb-2" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="mailto:?subject=My%20Bussiness%20Academy%20Pro&body=https%3A//mybusinessacademypro.com/academia/" class="btn btn-social-media-icon btn-rounded email-icon mt-2 mb-2" target="_blank"><i class="fas fa-envelope"></i></a>
                        <a href="https://www.youtube.com/channel/UCQaLkVtbR6RK8HfhajFnikg" class="btn btn-social-media-icon btn-rounded youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                     </div>

                <div class="section-paises">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 py-5">
                                <div class="mb-2 text-center">
                                    <img src="{{ asset('images/icf.png')}}" alt="" height="32px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/no_work_no_money.png')}}" alt="" height="32px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/logo-fentix.png')}}" alt="" height="35px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/logo-fxtlive.png')}}" alt="" height="32px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/mytradinglogo.png')}}" alt="" height="35px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/logo-jose.png')}}" alt="" height="32px" class="mr-md-2 mr-3">
                                </div>
                                <div class="mb-2 text-center text-white" style="margin:20px;">
                                    PAISES EN DONDE ESTAMOS PRESENTES
                                </div>
                                <div class="mb-2 text-center" style="margin:20px;">
                                    <img src="{{ asset('images/usa.png')}}" height="40px" class="mr-md-2 mr-3">
                                    <img src="{{ asset('images/espana.png')}}" height="40px" class="mr-md-2 mr-3">
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
                                <div class="mb-2 text-center text-white" style="margin-top: 10px;">
                                    Medios de Pago
                                    <img src="{{ asset('images/stripe.png') }}" height="15px" class="mr-md-2 mr-3" style="margin-left: 1rem! important;">
                                    <img src="{{ asset('images/logopaypalwhite.png') }}" height="15px" class="mr-md-2 mr-3" style="margin-left: 1rem! important;">
                                </div>
                                <div class="mb-2 text-center text-white" style="margin-top: 10px;">
                                    Aceptamos
                                    <img src="{{ asset('images/visa.png') }}" height="15px" class="mr-md-3 mr-3" style="margin-left: 1rem! important;">
                                    <img src="{{ asset('images/mastercard.png') }}" height="15px" class="mr-md-3 mr-3">
                                    <img src="{{ asset('images/american.png') }}" height="15px" class="mr-md-3 mr-3">
                                </div>
                                <div class="mb-2 text-center text-white" style="margin-top: 10px;">
                                    Pr&oacute;ximamente
                                    <img src="{{ asset('images/amazon_pay.png') }}" height="15px" class="mr-md-3 mr-3" style="margin-left: 1rem! important;">
                                    <img src="{{ asset('images/apple_pay.png') }}" height="15px" class="mr-md-3 mr-3">
                                    <img src="{{ asset('images/g_pay.png') }}" height="15px" class="mr-md-3 mr-3">

                                </div>
                                <div class="text-center text-white" style="margin-top: 20px;">
                                    <a href="{{route('client.policies')}}" class="text-white" target="_blank" style="padding: 2px;">Pol&iacute;ticas de Uso</a> &nbsp&nbsp
                                    <a href="{{ route('terms-and-conditions') }}" class="text-white" style="padding: 2px;" target="_blank">T&eacute;rminos y condiciones</a>&nbsp&nbsp
                                    <a href="#" data-toggle="modal" data-target="#contactModal" class="text-white" style="padding: 2px;" target="_black"> Contacto</a>&nbsp&nbsp
                                    <a href="{{route('index')}}" class="text-white" style="padding: 2px;">Inicio</a>&nbsp&nbsp
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- Boton hacia arriba -->
                    <a class="ir-arriba"  javascript:void(0) title="Volver arriba">
                      <span class="fa-stack">
                        <i class="fa fa-circle fa-stack-2x"></i>
                        <i class="fa fa-arrow-up fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                </div>

                @include('layouts.partials.footer')
            </div>
            <!-- /#page-content-wrapper -->
        </div>
        <!-- /#wrapper -->
        {{-- Modal de Contacto --}}
        <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: black;">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: white;">Déjanos tu Mensaje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form action="{{ route('contact-us') }}" method="POST">
                        @csrf
                        <div class="modal-body text-center">
                            <div class="form-group">
                                <label for="name" style="color: white;">Nombre (*)</label>
                                <input type="text" class="form-control" name="name" style="background-color: #1C1D21;" required>
                            </div>
                            <div class="form-group">
                                <label for="email" style="color: white;">Correo (*)</label>
                                <input type="email" class="form-control" name="email" style="background-color: #1C1D21;" required>
                            </div>
                            <div class="form-group">
                                <label for="subject" style="color: white;">Asunto (*)</label>
                                <input type="text" class="form-control" name="subject" style="background-color: #1C1D21;" required>
                            </div>
                            <div class="form-group">
                                <label for="message" style="color: white;">Mensaje</label>
                                <textarea class="form-control" name="message" rows="3" style="background-color: #1C1D21;" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'en,fr,it,pt,de,ar,zh,hi,ja,ru,vi,es', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, gaTrack: true}, 'google_translate_element');
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
        <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
        <script>
        window.cookieconsent.initialise({
          "palette": {
            "popup": {
              "background": "#252e39"
            },
            "button": {
              "background": "#14a7d0"
            }
          },
          "theme": "classic",
          "position": "bottom-right",
          "content": {
            "message": "Utilizamos cookies propias y de terceros para mejorar nuestros servicios. Si continúa con la navegació, consideraremos que acepta este uso.",
            "dismiss": "Acepto",
            "link": "Leer más.",
            "href": "https://mybusinessacademypro.com/academia/policies"
          }
        });
        </script>

        {{-- mensajes push --}}
         <script src="{{ asset('assets/push/push-js-master/bin/push.js')}}"></script>

         {{-- Sweetalert 2 --}}
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

        @stack('scripts')
    </body>
    @include('layouts.push.push')
</html>
