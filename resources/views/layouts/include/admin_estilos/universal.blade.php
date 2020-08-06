@php
  $textura = DB::table('settings')
    ->select('estilo')
    ->first();
@endphp
  
@if($textura->estilo == '1')
<link rel="stylesheet" href="{{asset('assets/AdminLTE-2.4.12/dist/css/skins/skin-blue.css')}}">

@elseif($textura->estilo == '2')
<link rel="stylesheet" href="{{asset('assets/AdminLTE-2.4.12/dist/css/skins/skin-blue-light.css')}}">

@elseif($textura->estilo == '3')

<link rel="stylesheet" href="{{asset('assets/AdminLTE-2.4.12/dist/css/skins/skin-black.css')}}">

@elseif($textura->estilo == '4')
<link rel="stylesheet" href="{{asset('assets/AdminLTE-2.4.12/dist/css/skins/skin-black-light.css')}}">

@elseif($textura->estilo == '5')
<link rel="stylesheet" href="{{asset('assets/AdminLTE-2.4.12/dist/css/skins/skin-green.css')}}">

@elseif($textura->estilo == '6')
<link rel="stylesheet" href="{{asset('assets/AdminLTE-2.4.12/dist/css/skins/skin-green-light.css')}}">

@elseif($textura->estilo == '7')
<link rel="stylesheet" href="{{asset('assets/AdminLTE-2.4.12/dist/css/skins/skin-purple.css')}}">

@elseif($textura->estilo == '8')
<link rel="stylesheet" href="{{asset('assets/AdminLTE-2.4.12/dist/css/skins/skin-purple-light.css')}}">

@elseif($textura->estilo == '9')
<link rel="stylesheet" href="{{asset('assets/AdminLTE-2.4.12/dist/css/skins/skin-red.css')}}">

@elseif($textura->estilo == '10')
<link rel="stylesheet" href="{{asset('assets/AdminLTE-2.4.12/dist/css/skins/skin-red-light.css')}}">

@elseif($textura->estilo == '11')
<link rel="stylesheet" href="{{asset('assets/AdminLTE-2.4.12/dist/css/skins/skin-yellow.css')}}">

@elseif($textura->estilo == '12')
<link rel="stylesheet" href="{{asset('assets/AdminLTE-2.4.12/dist/css/skins/skin-yellow-light.css')}}">
@endif

