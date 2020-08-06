<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title></title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="col-xs-12">
            <img src="{{asset('assets/img/logo-light.png')}}" height="80" alt="">
        </div>
        
        <div class="col-md-12">
       {!! (!empty($data)) ? $data : '' !!}
        </div>
        
        <div class="col-xs-12">
            {!! (!empty($firma)) ? $firma : '' !!}
        </div>
        
        
    </body> 
</html>