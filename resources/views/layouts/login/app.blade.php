<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $settings->name }} - {{ $title }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="stylesheet" href="{{asset('assets/login_nuevo/usuario/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/login_nuevo/usuario/css/my-login.css')}}">

<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
</head>


<body class="my-login-page">
    <main class="py-4">
      @yield('content')
       </main>
</body>
</html>