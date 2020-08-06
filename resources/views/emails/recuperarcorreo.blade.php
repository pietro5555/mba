<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    
    <title></title>
  </head>
  <body>
      <div class="col-xs-12">
          <img src="{{asset('assets/img/logo-light.png')}}" height="80" alt="">
      </div>
    <div class="">
      <h3>Cambio de Clave {{$settings->name}}</h3>
      <br><br>
      <p>por favor Ingrese al siquiente link para cambiar la clave</p>
      <a href="{{route('autenticacion-codigo', [$data['codigo']])}}">Nueva Clave</a>
    </div>
  </body>
</html>
