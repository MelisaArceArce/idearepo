<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>IDEA</title>
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
    <link rel="stylesheet" href="{{asset("assets/$theme/css/main.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/css/bootstrap.min.css")}}">

</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include("$theme/header")
        @include("$theme/lateral")
        <div class="fixed-bottom d-flex justify-content-end">
                <a role="button" class="btn btn-primary text-white" href="{{route('feedback')}}">¡Comentanos!</a>
                </div>
        <div class="app-main">
                <div class="overlay"></div> {{-- Este div es el que crea el overlay cuando se muestra informacion adicional del proyecto --}}
                @include("$theme/aside")
                <div class="app-main__outer">
                    <div class="app-main__inner">
                            @yield('titulo')    
                            {{-- AQUI SE INCRUSTA EL CONTENIDO CON @section CON EL PARAMETRO "contenido" CUANDO SE USA EL EXTENDS --}}
                            @yield('contenido')
                    </div>
                    {{-- <!--@include("$theme/footer")-->  --}}
                </div>
        </div>
    </div>
    {{-- Aqui van los scripts --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    {{-- Script para hacer auto rezise a un contenedor --}}
    <script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
    @yield('scripts')
    <script type="text/javascript" src="{{asset("assets/$theme/js/main.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/$theme/js/custom.js")}}"></script>{{-- Para que funcionesn la validacion de los formularios --}}
    <script type="text/javascript" src="{{asset("assets/$theme/js/perfil.js")}}"></script>
    {{-- <script type="text/javascript" src="{{asset("assets/$theme/js/jquery.tabledit.js")}}"></script> --}}
    {{-- para manipular tablas y editarlas --}}
</body>
</html>