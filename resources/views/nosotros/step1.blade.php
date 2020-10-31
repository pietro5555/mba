@extends('layouts.landing')

@section('content')

<div class="container-fluid courses-slider" style="background-color: #1C1D21;margin-bottom: 0px; padding-bottom: 0px;">
    <div class="container-fluid courses-slider" style="padding-bottom: 0px;">
      <div id="mainSlider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item  active ">
              <div class="overlay"></div>
                  <img src="{{ asset('nosotros/nosotros/nosotros.png') }}" class="d-block w-100" alt="...">
                   <div class="carousel-caption">
                    <div class="col-md-5 offset-md-5">
                    <div class="estilobusiness">MY BUSINESS ACADEMY PRO</div>
                  </div>
              </div>
          </div>   
        </div>
    </div>
  </div>
</div>

<div class="col-md-12" style="background-color: #EDEDED;">
   <div class="col-md-8 offset-md-2" style="padding: 50px 50px; text-align: center;">
  <h4>Es la mejor academia online de educación financiera y negocios, dirigida a las personas que quieran convertirse en inversionistas PRO</h4>
   </div>
  </div>


  <div class="card mb-3" style="max-width: 100%; margin-bottom: 0rem!important;">
        <div class="row no-gutters">
            <div class="col-md-6" style="background-color: #2A91FF; color: #fff; padding: 40px !important;">
                <div class="card-body">
                     <h5 class="card-title" style="font-size: 40px; text-align: center;">MÁS ALLÁ DE LA RIQUEZA</h5>
                     <p class="card-text" style="text-align: center;">Te hacemos crecer personalmente con mucho contenido de desarrollo personal.</p>
                </div>
            </div>
                <div class="col-md-6" style="min-height: 300px; background-image: url('{{ asset('nosotros/nosotros/02.png') }}'); background-size: cover; background-position: top;">
                </div>
        </div>
    </div>

  <div class="col-md-12" style="background-color: #1C1D21; margin-bottom: 40px;">
    <div class="col-md-8 offset-md-2" style="margin-top: 50px;">
      <div class="card mb-3" style="max-width: 100%; margin-bottom: 0rem!important;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ asset('nosotros/nosotros/03.png') }}" class="card-img" alt="...">
            </div>
            <div class="col-md-4 align-items-center" style="background-color: #2A91FF; padding: 20px 20px; text-align: center; color: #fff;">
              <p>El modelo académico cuenta con flexibilidad de aprendizaje, información de primer nivel y herramientas de aplicación sencilla e inmediata.</p>
            </div>
             <div class="col-md-4" style="min-height: 200px; background-image: url('{{ asset('nosotros/nosotros/04.png') }}'); background-size: cover; background-position: top;">
            </div>
        </div>
      </div>

      <div class="card mb-3" style="max-width: 100%; margin-bottom: 0rem!important;">
        <div class="row no-gutters">
           <div class="col-md-4">
              <img src="{{ asset('nosotros/nosotros/05.png') }}" class="card-img" alt="...">
           </div>
          <div class="col-md-8" style="background-color: #fff;">
            <div class="card-body row align-items-center">
               <p class="card-text" style="padding: 30px 30px;">5 niveles de aprendizaje: desde el principiante, básico o intermedio para introducirte al fascinante mundo de las finanzas, hasta el avanzado y pro, que te llevan a lograr resultados extraordinarios.</p>
            </div>
          </div>
         </div>
       </div>


       <div class="card mb-3" style="max-width: 100%; margin-bottom: 0rem!important;">
        <div class="row no-gutters">
          <div class="col-md-8" style="background-color: #fff;">
            <div class="card-body row align-items-center">
               <p class="card-text" style="padding: 30px 30px;">Se cuenta con múltiples módulos y varias lecciones que cubren el concepto y contexto total del fascinante mundo Fintech, incluyendo sus diferentes campos de acción, como el forex, real estate y muchos otros.</p>
            </div>
          </div>
           <div class="col-md-4">
              <img src="{{ asset('nosotros/nosotros/06.png') }}" class="card-img" alt="...">
           </div>
         </div>
       </div>


       <div class="card mb-3" style="max-width: 100%; margin-bottom: 0rem!important;">
        <div class="row no-gutters">
           <div class="col-md-4">
              <img src="{{ asset('nosotros/nosotros/07.png') }}" class="card-img" alt="...">
           </div>
          <div class="col-md-8" style="color: #fff; background-color: #2A91FF;">
            <div class="card-body row align-items-center">
               <p class="card-text" style="padding: 30px 30px;">Nuestro propósito es llevarte más allá de la riqueza, por ello no solo te hacemos crecer monetariamente, sino también personalmente, ofreciéndote mucho contenido de desarrollo personal y crecimiento integral como profesional.</p>
            </div>
          </div>
         </div>
       </div>

    </div>
</div>

    <div class="col-md-12" style="background-color: #FFFFFF;">
     <div class="section-title-landing new-courses-section-title" style="text-align: center; padding-bottom: 0px; padding-top: 50px;">
      Nuestros Valores
    </div>

     
     <div class="col-md-8 offset-md-2" style="padding-bottom: 80px; padding-top: 50px;">
      <div class="card mb-3" style="max-width: 100%; margin-bottom: 0rem!important;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="{{ asset('nosotros/nosotros/09.png') }}" style="width: 100%;">
              <div class="card-img-overlay d-flex flex-column" style="color: #fff; text-align: center;">
                    <div class="mt-auto">
                        <div class="new-course-title">
                          Conexión
                        </div>            
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('nosotros/nosotros/10.png') }}" style="width: 100%;">
              <div class="card-img-overlay d-flex flex-column" style="color: #fff; text-align: center;">
                    <div class="mt-auto">
                        <div class="new-course-title">
                          Innovación
                        </div>            
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                 <img src="{{ asset('nosotros/nosotros/08.png') }}" style="width: 100%;">
              <div class="card-img-overlay d-flex flex-column" style="color: #fff; text-align: center;">
                    <div class="mt-auto">
                        <div class="new-course-title">
                          Crecimiento
                        </div>            
                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="card mb-3" style="max-width: 100%; margin-bottom: 0rem!important;">
        <div class="row no-gutters">
            <div class="col-md-4">
              <img src="{{ asset('nosotros/nosotros/11.png') }}" style="width: 100%;">
              <div class="card-img-overlay d-flex flex-column" style="color: #fff; text-align: center;">
                    <div class="mt-auto">
                        <div class="new-course-title">
                          Calidad
                        </div>            
                    </div>
                </div>
            </div>
            <div class="col-md-4">
              <img src="{{ asset('nosotros/nosotros/12.png') }}" style="width: 100%;">
              <div class="card-img-overlay d-flex flex-column" style="color: #fff; text-align: center;">
                    <div class="mt-auto">
                        <div class="new-course-title">
                          Eficacia
                        </div>            
                    </div>
                </div>
            </div>
             <div class="col-md-4">
              <img src="{{ asset('nosotros/nosotros/13.png') }}" style="width: 100%;">
              <div class="card-img-overlay d-flex flex-column" style="color: #fff; text-align: center;">
                    <div class="mt-auto">
                        <div class="new-course-title">
                          Trascendencia
                        </div>            
                    </div>
                </div>
            </div>
        </div>
      </div>

  </div>
</div> 


<div class="col-md-12" style="background-color: #1C1D21;">
     <div class="section-title-landing new-courses-section-title" style="text-align: center;     padding: 30px; color: #FFFFFF;">
      Nuestros Fundadores
    </div>

    <div class="card mb-3" style="max-width: 100%; margin-bottom: 0rem!important;">
        <div class="row no-gutters">
            <div class="col-md-6">
              <img src="{{ asset('nosotros/fundadores/josegordo.png') }}" style="width: 100%; height: 100%;">
            </div>
            <div class="col-md-6" style="color: #fff; background-color: #1c1d21;">
            <div class="card-body">
                
                <p class="card-title" style="padding: 0px 20px; text-align: left; color: #2A91FF; font-family:Muli, Sans-serif; font-size: 50px; font-weight: bold;">
                    JOSÉ GORDO
                </p>

               <p class="card-text" style="padding: 0px 20px; text-align: left; color: #fff; line-height: 30px;"> 
                Especialista en desarrollo de negocios rentables, sostenibles y de expansión global.
               </p>
               <p class="card-text" style="padding: 0px 20px; text-align: left; line-height: 40px;">
                15 años de experiencia en el mundo financiero, eterno aprendiz y emprendedor, amante de las finanzas, la innovación, y los proyectos de impacto social. Con la experiencia ganada a través los años y su pasión por el desarrollo personal y profesional de sus equipos de trabajo, ha creado diferentes técnicas de entrenamientos altamente efectivo, además de ser escritor y autor de 4 libros de negocios, 2 best seller. Fundador y Co-creador de My Business Academy Pro, así como de Piense y Hágase Rico, El Legado. Su compromiso es dejar huella en todo país que pise y persona que lo acompañe</p>
            </div>
          </div>
        </div>
    </div>       


    <div class="card mb-3" style="max-width: 100%; margin-bottom: 0rem!important;">
        <div class="row no-gutters">
          <div class="col-md-6" style="color: #fff; background-color: #1c1d21;">
          <div class="card-body">
              
              <p class="card-title" style="padding: 0px 20px; color: #2A91FF; font-family:Muli, Sans-serif; font-size: 50px; font-weight: bold;">
                    MARIANA LÓPEZ DE WAARD
                </p>

               <p class="card-text" style="padding: 0px 30px; color: #fff; line-height: 40px;">
                Licenciada en Marketing con Especialidad en Negocios Internacionales, Filántropa, Exitosa Empresaria y Conferencista de empresas con expansión global.
               </p>
               <p class="card-text" style="padding: 0px 30px; line-height: 40px;">
                 Experta en la apertura de nuevos mercados y mentora de grandes equipos de trabajo de la industria del Multinivel. Su compromiso es influir positivamente en mujeres y hombres para sacar al líder que llevan dentro e impulsarlos a cumplir sus sueños.</p>
            </div>
           </div> 
            <div class="col-md-6">
              <img src="{{ asset('nosotros/fundadores/mujer.png') }}" style="width: 100%;">
            </div>
          </div>
        </div>
    </div>


    <div class="col-md-12" style="background-color: #EDEDED;">
     <div class="section-title-landing new-courses-section-title" style="text-align: center; padding: 30px; color: #2A91FF;">
      Nuestros Especialistas
    </div>

<div class="col-md-10 offset-md-1">
    <div class="card mb-3" style="max-width: 100%; margin-bottom: 0rem!important;">
        <div class="row no-gutters">
           <div class="col-md-4" style="background-color: #EDEDED;">
              <img src="{{ asset('nosotros/nosotros/16.png') }}" class="card-img" alt="...">
             <div class="card-img-overlay d-flex flex-column" style="color: #fff; text-align: center;"> 
               <div class="mt-auto">
                  <div class="new-course-title" style="background-color: #333; padding: 8px; float: right; color: #2A91FF;">
                    Tania Tostado
                  </div>            
              </div>
             </div> 
           </div>
          <div class="col-md-8" style="background-color: #EDEDED;">
            <div class="card-body">
                <p class="card-text" style="padding-left: 20px; line-height: 40px; color:#2A91FF; font-size: 40px; font-weight: bold;">Tania Tostado</p>
                
               <p class="card-text" style="padding-left: 20px; line-height: 35px;">Licenciada en Administración financiera con especialidad en finanzas corporativas, ha colaborado con bancos de talla mundial como: UBS, Credit Suisse y Deutche Bank en Suiza, Bank Hapoalim en Israel, Baern Stearns Securities en EUA, entre muchos otros. En 2008, fue ganadora del premio Best Development, otorgado por la International Property Awards y CNBC. Como consultora independiente, asesora a múltiples y reconocidas empresas en latinoamérica para hacer importantes transacciones con cifras de millones de dólares.</p>
            </div>
          </div>
        </div>
    </div>

    <div class="card mb-3" style="max-width: 100%; margin-bottom: 0rem!important;  margin-top: 80px;">
        <div class="row no-gutters">
          <div class="col-md-8" style="background-color: #EDEDED;">
              <div class="card-body">
               
               <p class="card-text" style="padding-left: 20px; line-height: 40px; color:#2A91FF; font-size: 40px; font-weight: bold;">Erick Reynaga</p>
               
               <p class="card-text" style="padding-right: 20px; line-height: 40px;">Especialista con 6 años de experiencia en el mundo del Trading, Forex y las Criptodivisas, así como de fondos de inversión con marcas de reconocimiento internacional. Cuenta con una maestría en administración y negocios, es líder de proyectos educativos financieros para diferentes cúpulas de negocios de jóvenes empresarios en México y es promotor de una Sociedad Financiera de Operación Múltiple en la que se operan diversas transacciones con crypto.</p>
            </div>
          </div>
          <div class="col-md-4" style="background-color: #EDEDED;">
              <img src="{{ asset('nosotros/nosotros/17.png') }}" class="card-img" alt="...">
              <div class="card-img-overlay d-flex flex-column" style="color: #fff; text-align: center;"> 
               <div class="mt-auto">
                  <div class="new-course-title" style="background-color: #333; padding: 8px; float: left; color: #2A91FF;">
                    Erick Reynaga
                  </div>            
                </div>
             </div> 
           </div>
        </div>
    </div>

    <div class="card mb-3" style="max-width: 100%; margin-bottom: 0rem!important; margin-top: 80px;">
        <div class="row no-gutters">
           <div class="col-md-4" style="background-color: #EDEDED;">
              <img src="{{ asset('nosotros/nosotros/18.png') }}" class="card-img" alt="...">
              <div class="card-img-overlay d-flex flex-column" style="color: #fff; text-align: center;"> 
               <div class="mt-auto">
                  <div class="new-course-title" style="background-color: #333; padding: 8px; float: right; color: #2A91FF;">
                    Mirela Vuckovic
                  </div>            
              </div>
             </div> 
           </div>
          <div class="col-md-8" style="background-color: #EDEDED;">
            <div class="card-body">
                
                <p class="card-text" style="padding-left: 20px; line-height: 40px; color:#2A91FF; font-size: 40px; font-weight: bold;"> Mirela Vuckovic</p>
                
               <p class="card-text" style="padding-left: 20px; line-height: 40px;">Lic. en Economía por la University of Split de Croacia. Colaboró en Londres para importantes marcas de offshore banking. En México tiene 12 años como consultora directiva de reconocidas empresas Fintech en todo Latam. Así como instructora de diversos programas académicos con diferentes marcas de la industria financiera.</p>
            </div>
          </div>
        </div>
    </div>


    <div class="card mb-3" style="max-width: 100%; margin-bottom: 0rem!important; padding-bottom: 80px; margin-top: 80px;">
        <div class="row no-gutters">
          <div class="col-md-8" style="background-color: #EDEDED;">
              <div class="card-body">
                  
                <p class="card-text" style="padding-left: 20px; line-height: 40px; color:#2A91FF; font-size: 40px; font-weight: bold;"> Manuel Guerrero Aguilar</p>
                
               <p class="card-text" style="padding-right: 20px; line-height: 40px;">Lic. en administración Financiera, apasionado del conocimiento y la aplicación de la tecnología en los mercados financieros, desde muy joven se ha interesado por explorar y promover temas de inversiones, forex, trading, IA, entre otros.</p>
            </div>
          </div>
          <div class="col-md-4" style="background-color: #EDEDED;">
              <img src="{{ asset('nosotros/nosotros/19.png') }}" class="card-img" alt="...">
              <div class="card-img-overlay d-flex flex-column" style="color: #fff; text-align: center;"> 
               <div class="mt-auto">
                  <div class="new-course-title" style="background-color: #333; padding: 8px; color: #2A91FF; float: left;">
                    Manuel Guerrero Aguilar
                  </div>            
                </div>
             </div>
           </div>
        </div>
    </div>

</div>

   </div>  
  
@endsection