<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset("assets/$theme/css/inicio.css") }}">
    <link rel="stylesheet" href="{{asset("assets/$theme/css/main.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/css/bootstrap.min.css")}}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <section class="login-block" style="height:100%; width: 100%;margin:0; padding-bottom:30%; border:0;">
        <div class="container" style="height:500px; width:100%;">
            <div id="app">
                <div class="container-header" style="align-content:center">
                    @yield('titulo') 
                </div>
                <main class="py-4">
                @yield('contenido')
                </main>
            </div>
        </div>        
    </section>
            
        <script type="text/javascript" src="{{asset("assets/$theme/js/main.js")}}"></script>
        <script type="text/javascript" src="{{asset("assets/$theme/js/custom.js")}}"></script>{{-- Para que funcionesn la validacion de los formularios --}}
</body>
</html>
