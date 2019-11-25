<div class="app-sidebar sidebar-shadow scrollbar-container">
        <div class="app-header__logo">
            <div class="logo-src"></div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
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
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>    <div class="scrollbar-sidebar">
            <div class="app-sidebar__inner">
                <ul class="vertical-nav-menu">
                        <li>
                            <a href="{{route('home')}}" class="mm-active"> 
                                <i class="metismenu-icon pe-7s-home"></i>
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a href="{{route('nuevo_proyecto')}}" class="mm-active">
                                <i class="metismenu-icon pe-7s-light"></i>
                                Crea un proyecto
                            </a>
                        </li>                            
                        <li>
                            <a href="{{route('miPerfil_edit', ['matricula_usuario' => Auth::user()->matricula])}}" class="mm-active">
                                <i class="metismenu-icon pe-7s-user"></i>
                                Mi Perfil
                            </a>
                        </li>                   
                    <li class="app-sidebar__heading">Mis Proyectos</li>
                    <div class="float-rigth">
                        <li class="mm-">
                                <a  id="listaProyectos" href="#" aria-expanded="">
                                    <i class="metismenu-icon pe-7s-note2"></i>
                                        Administrando
                                    <i class="pe-7s-angle-down caret-left"></i>
                                </a>
                                @if ($proyectosAdmin = session('proyectosAdmin'))
                                <ul class="mm-collapse" id="$proyecto">
                                    @foreach ($proyectosAdmin as $proyectoAdm)        
                                        <li>
                                            <a href="{{route('admin_proyecto',$proyectoAdm->id)}}" class="mm-active" >
                                                <p class="overflow-ellipsis autosize">{{$proyectoAdm->nombre_Proy}}</p>
                                            </a>
                                        </li>
                                        @endforeach        
                                    </ul>
                               @endif
                               @if ($proyectosAdmin->isEmpty())
                               <ul class="mm-collapse" id="$proyectoAdBas">
                                    <li>
                                        <a href="" class="mm-active">
                                            <i class="metismenu-icon"></i> Sin proyectos
                                        </a>
                                    </li>
                               </ul>  
                                @endif

                            </li>
                        {{-- aqui empiesa colaborando--}}
                        <li class="mm-">
                            <a  id="listaProyectosCol" href="#" aria-expanded="">
                                <i class="metismenu-icon pe-7s-users"></i>
                                    Colaborando
                                <i class="pe-7s-angle-down caret-left"></i>
                            </a>
                            @if ($proyectosColaborando = session('proyectosColaborando'))
                            <ul class="mm-collapse" id="$proyectoCol">
                                @foreach ($proyectosColaborando as $proyectoCol)        
                                    <li>
                                        <a href="{{route('colaborador_proyecto',$proyectoCol->id_Proyecto)}}" class="mm-active">
                                            <i class="metismenu-icon -autosize" ></i> {{$proyectoCol->nombre_Proy}}
                                        </a>
                                    </li>
                                    @endforeach        
                                </ul>
                            @endif   
                            @if ($proyectosColaborando->isEmpty())
                            <ul class="mm-collapse" id="$proyectoColBa">
                                <li>
                                    <a href="" class="mm-active">
                                        <i class="overflow-ellipsis"></i> Sin proyectos
                                    </a>
                                </li>
                            </ul>                                   
                            @endif                                                       
                        </li>
                    </div>                        
                    <div class="dropdown-divider"></div>
                    <li>
                        <a href="{{route('mis_notificaciones',Auth::user()->matricula)}}">
                            <i class="metismenu-icon pe-7s-mail"></i>
                                 Mis Notificaciones
                        </a>
                    </li>
                    <li>
                        <a href="{{route('chat')}}">
                            <i class="metismenu-icon pe-7s-chat"></i>
                                 Chat
                        </a>
                    </li>
                    <li>
                        <a href="{{route('facultad_Evento')}}">
                            <i class="metismenu-icon pe-7s-speaker"></i>
                                 Convocatorias
                        </a>
                    </li>
                   
                    <li class=" dropdown">
                        <i class="metismenu-icon pe-7s-close-circle"></i>
                        <a class="dropdown-item rojosalir" href="salir"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Salir
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    <li>
                        <a href="{{route('sobre_nosotros')}}">
                            <i class="metismenu-icon pe-7s-info">
                            </i>Estudio 404
                        </a>
                    </li>
                    <li class="fixed-bottom">
                        <a>
                            <i class="metismenu-icon"></i>
                            Versión de prueba - Beta 1
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div> 

    <style>
    /*Para resalta el boton salir del sistema - Adrian Rico*/
    .rojosalir:hover{
        background: rgba(255, 0, 0, .3);
    }
    </style>