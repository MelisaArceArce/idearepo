<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Sistema idea</title>
    <!--<script src="https://kit.fontawesome.com/b49c515174.js"></script> -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
   {{-- <link href="{{ asset("assets/$theme/css/wizard.css") }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset("assets/$theme/css/main.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/$theme/css/inicio.css") }}">
    
</head>
<body>
    <section class="login-block">
        <div class="container">
        <div class="container-header" style="align-content:center">
                @yield('titulo') 
        </div>
            @yield('contenido')
        </div>
        
        </section>
    
        <script type="text/javascript" src="{{asset("assets/$theme/js/main.js")}}"></script>
        <script type="text/javascript" src="{{asset("assets/$theme/js/custom.js")}}"></script>{{-- Para que funcionesn la validacion de los formularios --}}
    </body>
    </html>            