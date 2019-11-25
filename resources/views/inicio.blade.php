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
    <link rel="stylesheet" href="{{asset("assets/$theme/css/main.css")}}">
    <link rel="stylesheet" href="{{asset("assets/$theme/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{ asset("assets/$theme/css/inicio.css") }}">
</head>
<body class="cuerpo">
    <section class="login-block"> 
        <div class="container">
        <div class="row">
            {{-- Inicio de formulario --}}
            <div class="col-md-4 login-sec">
                <div class="" style="margin-bottom: 30px;" >
                    <img class="" style="width:100%; height: 100%; " src="/assets/template/images/logo3.png" alt="logo">
                </div>
                <form method="POST" action="{{ route('login') }}"  novalidate> {{--class="needs-validation" --}}
                    @csrf
                    <div class="form-group row" style="padding-top:20px;">
                        <div class="col-md-12">
                            <input id="matricula" type="matricula" placeholder="Matricula" class="form-control  @error('matricula') is-invalid @enderror" name="matricula" value="{{ old('matricula') }}" required autocomplete="matricula" autofocus>
                            @error('matricula')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{  $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                
                        <div class="col-md-12 ">
                            <input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{  $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-10 col-form-label text-md-right">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Recuperar contraseña') }}
                            </a>
                                @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5 offset-md-4" style="margin-right:40px;" >
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label"  for="remember" style="width: 180px;font-size: 12px; color:orangered;">
                                    {{ __('Recordar mis datos') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-0"> 
                        <div class="col-md-12 offset-md-0">
                            <button type="submit" class="btn btn-block btn-primary">
                                {{ __('Iniciar Sesión') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group row mb-0"> 
                        <div class="col-md-12 offset-md-0" style="padding-top:20px; ">
                            <button onclick="location.href='{{ route('register') }}'" type="button"  class="btn btn-block btn-primary">
                                    {{ __('Registrar') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            {{-- Fin de Fomrulario --}}
            {{-- Inicio de carousel --}}
            <div class="col-md-8 banner-sec hidden-sm-down d-none d-lg-block">
                <div id="indicador" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#indicador" data-slide-to="0" class="active"></li>
                        <li data-target="#indicador" data-slide-to="1"></li>
                        <li data-target="#indicador" data-slide-to="2"></li>
                        
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                        <img class="d-block img-fluid" src="{{asset("assets/$theme/images/inicio/1.jpg")}}" alt="Primer slide">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                    
                                </div>	
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset("assets/$theme/images/inicio/2.jpg")}}" alt="Segundo slide">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                </div>	
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset("assets/$theme/images/inicio/3.jpg")}}" alt="Tercer slide">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                    
                                        <b style="background: white; color: black; border: 15px solid white;">Si quieres saber más da clic <a href="sobreNosotros">aquí.</a></b>
                                    
                                    
                                </div>	
                            </div>
                        </div> 
                        <!-- <div class="carousel-item">
                            <img class="d-block img-fluid" src="{{asset("assets/$theme/images/inicio/3.jpg")}}" alt="Cuarto slide">
                            <div class="carousel-caption d-none d-md-block">
                                <div class="banner-text">
                                    <h2></h2>
                                    <b>Si quieres saber más da clic <a href="sobreNosotros">aquí</a></b>
                                </div>	
                            </div>
                        </div>-->
                    </div>	    
                </div>
                <a class="carousel-control-prev" href="#indicador" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
                <a class="carousel-control-next" href="#indicador" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
            </div>{{-- Fin de carousel --}}
        </div>{{-- Fin de row --}}
    </section>

    <script type="text/javascript" src="{{asset("assets/$theme/js/main.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/$theme/js/custom.js")}}"></script>{{-- Para que funcionesn la validacion de los formularios --}}

</body>
</html>