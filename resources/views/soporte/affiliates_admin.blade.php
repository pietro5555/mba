@extends('layouts.dashboardnew')

@push('script')
@endpush


<style>

ol {
    counter-reset: my-awesome-counter;
    list-style: none;
    padding-left: 40px;
  }
  ol li {
    margin: 0 0 0.5rem 0;
    counter-increment: my-awesome-counter;
    position: relative;
  }
  ol li::before {
    content: counter(my-awesome-counter);
    color: black;
    font-size: 2rem;
    font-weight: bold;
    position: absolute;
    --size: 32px;
    left: calc(-1 * var(--size) - 10px);
    line-height: var(--size);
    width: var(--size);
    height: var(--size);
    top: 0;
    transform: rotate(-10deg);
    background:#2A91FF;
    border-radius: 50%;
    text-align: center;
    box-shadow: 1px 1px 0 #999;
  }


</style>

@section('content')


<div class="col-xs-12">
<h2 class="white font-weight-bold">Afiliados</h2><hr>
<div  style="float:right;">
    <a href="{{route('soporte')}}" class="btn btn-success"><i class="fas fa-arrow-circle-left"></i> Soporte</a>
</div><br>
<h4 class="col-md-8 white">Te damos la bienvenida a <b class="text-primary">uno de los mejores y más geniales</b> programas de marketing de Afiliados del
mundo.</h4>


<h4 class="col-md-8 text-justify white">El programa de <b class="text-primary">My Business Academy Pro</b> te ayuda a que ganes dinero por aprender.
Contamos con cientos de cursos disponibles en <b class="text-primary">10 idiomas diferentes</b> , listos para que los compartas con un
solo click y puedas así ganar dinero a través de cada compra que recomiendes.</h4>

<div class="col-md-12">
    <div class="row">
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card">
                <div class="card-header bg-primary">
                    <h2 class="text-center" style="color:black;">REGISTRATE</h2>
                </div>
                <div class="card-body bg-info text-center card-aliados">
                <h4 class="card-text" style="padding: 10px; color: black;">
                    Intégrate a nuestra comunidad, aprende todo lo que necesitas para ser un emprendedor PRO y como miles de estudiantes alrededor del mundo regístrate a nuestro programa de Afiliados de MBA PRO y comienza a ganar dinero de inmediato.
                </h4>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card">
                <div class="card-header bg-primary">
                    <h2 class="text-center" style="color:black;">CAPACITATE</h2>
                </div>
                <div class="card-body bg-info text-center card-aliados">
                <h4 style="padding: 10px; color: black; margin-top: 10px; margin-bottom: 10px;">
                Te ofrecemos cientos de cursos para que puedas aprender lo mejor con los mejores Coaches y mentores.
                </h4>
                </div>
            </div>

        </div>
    
    </div>

</div>

<div class="col-md-12">
    <div class="row">
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card">
                <div class="card-header bg-primary">
                    <h2 class="text-center" style="color:black;">RECOMIÉNDANOS</h2>
                </div>
                <div class="card-body bg-info text-center card-aliados">
                <h4 class="card-text" style="padding: 10px; color: black;">
                Comparte los cursos que más te gusten con tus contactos. Contamos con herramientas de personalización de enlaces para ofrecerte seguridad y claridad en tus recomendaciones.
                </h4>
                </div>
            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="card">
                <div class="card-header bg-primary">
                    <h2 class="text-center" style="color:black;">GANA DINERO</h2>
                </div>
                <div class="card-body bg-info text-center card-aliados">
                <h4 style="padding: 10px; color: black; margin-top: 10px; margin-bottom: 10px;">
               
                    Gánate el 30% en comisiones por cada afiliado que se inscriba,  tu ganancia aumenta conforme el alumno vaya subiendo de nivel en su aprendizaje.

                </h4>
                </div>
            </div>

        </div>
    
    </div>

</div>

<h3 class="col-md-12 white mt-4">¿Por qué miles de personas ya eligieron el Programa de Afiliados de <b class="text-primary">MBA PRO</b>?</h3>

<h1 class="col-md-4 text-primary">5 Poderosas razones</h1>

<div class="col-md-12">
<ol class="col-md-8">
  <li class="white"><h4 style="line-height: 28px;">Tenemos los mejores precios del ramo educativo online, descuentos extraordinarios a nuestra comunidad y ofrecemos en general la mayor tasa de conversión del mercado de cursos digitales, para que alcances tu independencia financiera en mucho menos tiempo.</h4> </li><br>
  <li class="white"><h4 style="line-height: 28px;">Ofrecemos una experiencia sumamente fácil, solo inscríbete y recomienda compartiendo tu link de afiliado el cual se genera automáticamente desde tu registro, sin letras chiquitas ni clausulas que bloqueen tus ganancias.</h4></li><br>
  <li class="white"><h4 style="line-height: 28px;">Ingresa a <b class="text-primary"><a class="text-link-mba" href="https://mybusinessacademypro.com/">www.mybusinessacademypro.com</a></b> , crea tu cuenta de forma gratuita rellenando algunos datos de forma breve y listo comienza a recomendar aquellos cursos que te encanten.</h4></li><br>
  <li class="white"><h4 style="line-height: 28px;">Gozaras de links ilimitados para compartir tu precio especial</h4></li><br>
  <li class="white"><h4 style="line-height: 28px;">Gracias a nuestras pasarelas de pago universales, puedes obtener tu dinero como mejor te convenga sin importar en que parte del mundo te encuentres.</h4></li>
</ol>
</div>

<div class="col-md-12">
<h2 class="col-md-12 text-primary">Comisiones afiliados</h2>

<div class="col-md-12 table-responsive">
<table class="table">
  <thead class="bg-primary">
    <tr>
      <th>Nivel</th>
      <th>Membresia del ser</th>
      <th>Membresia del hacer</th>
      <th>Membresia del tener</th>
      <th>Membresia del trascender</th>
    </tr>
  </thead>
  <tbody class="bg-info">
    <tr>
      <th></th>
      <td class="text-center text-red" colspan="4"><h4><b>30% de comisión de Afiliación</b></h4>
      <br><h5><b>Aplica sobre el costo preferencial</b> </h5>
      <br><h5 style="color:black;"><b>y sin importar la categoría de la membresía se afilie tu referido.</b></h5>
      <br><h5 style="color:black;"><b>o si lo paga mensual , anual o vitalicio.</b></h5>
      </td>
    </tr>
  </tbody>
</table>

</div>
</div>

</div>

@endsection
