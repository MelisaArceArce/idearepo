<?php
    /* Recupero los mensajes de la session - Adrian Rico*/
    $mensajes = Session::get('notificaciones');
    foreach ($mensajes as $key => $valor) {
        echo ( $valor->nombres);
    }
?>
<div class="app-header header-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            {{--inicico real--}}
            <div class="btn-group">
            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-smmobile-toggle-header-nav"> {{--botón con puntitos--}}
                    <span class="btn-icon-wrapper">
                    {{--  <i class="fa fa-ellipsis-v fa-w-6"></i> 991  --}} 
                        <i class="fa text-secondary fa-bell pr-1 pl-1">
                            @if ( session('num_notificaciones') )
                                <i class="badge badge-secondary">{{ session('num_notificaciones') }} </i>
                            @endif 
                        </i>
                    </span>
                </button>
            </a>
            <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" x-placement="bottom-end" style="position: absolute; will-change: transform;  top: 0px; left: 0px; button: 0px;transform: translate3d(60px, 40px, 0px);">
                    @if ( session('num_notificaciones') == 0)
                        <h6 tabindex="-1" class="dropdown-header text-secondary">Sin nuevos mensajes</h6>
                    @else
                        @foreach ($mensajes as $key => $dato)
                                <form id="enviar_noti_{{$key}}" action="{{route('leerNotificacion', $dato->id )}}" method="POST" >
                                @csrf    
                                <h6 tabindex="-1" class="dropdown-header text-secondary">Remitente: {{ $dato->nombres }}</h6>
                                <div class="container-fluid" style="width:100%; padding:0px; margin:0px; border:0px;">
                                <div class="row" >
                                        <div class="col-lg-4"  style="">
                                        <li class="notificacion dropdown-item container-fluid" id="{{$key}}" title="Click para aceptar notificación">
                                        <div class="container-fluid" style="width:360px; padding:0px; margin:0px; border:0px;white-space: normal;">
                                            Mensaje: 
                                            <br>
                                            {{ $dato->mensaje }}
                                            <br>Fecha: {{ $dato->hora }}
                                        </div>
                                        </li>
                                        </div>
                                </div>
                                </div>
                                <div tabindex="-1" class="dropdown-divider"></div>
                            </form >
                        @endforeach
                    @endif
                </div>
            </div>
            {{--fin real--}}
        </span>
    </div>   


    <div class="app-header__content header-mobile-open"> 
        <div class="app-header-left">
        </div>
            
        {{-- <div class="app-header-left">
            @yield('submenu_admin_proyecto')
        </div> --}}
        
        <div class="app-header-right">
                @yield('submenu_admin_proyecto')
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    <button type="button" class="btn btn-light "> {{--botón de campanita--}}
                                        <i class="fa text-secondary fa-bell pr-1 pl-1"> 
                                            @if ( session('num_notificaciones') )
                                                <i class="badge badge-secondary">{{ session('num_notificaciones') }} </i>
                                            @endif   
                                        </i>
                                    </button>
                                    {{-- <i class="badge badge-pill badge-primary">6</i> --}}
                                </a>
                                
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(60px, 40px, 0px);">
                                    @if ( session('num_notificaciones') == 0)
                                        <h6 tabindex="-1" class="dropdown-header text-secondary">Sin nuevos mensajes</h6>
                                    @else
                                        @foreach ($mensajes as $key => $dato)
                                                <form id="enviar_noti_{{$key}}" action="{{route('leerNotificacion', $dato->id )}}" method="POST" >
                                                @csrf    
                                                <h6 tabindex="-1" class="dropdown-header text-secondary">Remitente: {{ $dato->nombres }}</h6>
                                                <li class="notificacion dropdown-item" id="{{$key}}" title="Click para aceptar notificación">Mensaje: {{ $dato->mensaje }}<br>Fecha: {{ $dato->hora }}</li>
                                                <div tabindex="-1" class="dropdown-divider"></div>
                                            </form >
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <!-- Imagen de perfil -->
                            <img class="rounded-circle" src="{{asset("assets/$theme/images/avatars/1.png")}}" alt="" width="42">

                        </div>
                        <div class="widget-content-left  ml-3 header-user-info">
                            <div class="widget-heading">
                                {{ Auth::user()->nombres }}
                            </div>
                            <div class="widget-subheading">
                                    {{ Auth::user()->matricula }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>