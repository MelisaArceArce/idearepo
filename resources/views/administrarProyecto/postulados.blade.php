@extends("template.layout")
@section('submenu_admin_proyecto')
<ul class="header-menu nav">
    <li class="nav-item">
        <a href="{{route('admin_proyecto',$id_Proyecto->id)}}" class="nav-link">
           <i class="icono-grande fa fa-folder-open"> </i>
            Información
        </a>
    </li>
    <li class="btn-group nav-item">
        <a href="{{route('tareas_proyecto',$id_Proyecto->id)}}" class="nav-link">
            <i class="icono-grande fa fa-tasks"></i>
            Tareas
        </a>
    </li>
    <li class="dropdown nav-item">
        <a href="{{route('colaboradores_proyecto',$id_Proyecto->id)}}" class="nav-link">
            <i class="icono-grande fa fa-users"></i>
            Colaboradores
        </a>
    </li>
    <li class="dropdown nav-item">
        <a href="{{route('postulados_proyecto',$id_Proyecto->id)}}" class="nav-link">
            <i class="icono-grande fa fa-address-card"></i>
            Postulados
        </a>
    </li>
</ul>
@endsection

@section('titulo')
@if (session('message_aceptar_colaborador'))
    <div class="alert alert-success">
        <ul>
            <li>{{ session('message_aceptar_colaborador') }}</li>
        </ul>
    </div>
    <br>
    <br>
@endif
@if (session('message_rechazar_colaborador'))
    <div class="alert alert-success">
        <ul>
            <li>{{ session('message_rechazar_colaborador') }}</li>
        </ul>
    </div>
    <br>
    <br>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <br>
    <br>
@endif
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fa fa-address-card icon-gradient bg-sunny-morning">
                </i>
            </div>
            <div class="">Postulados
                {{-- <div class="page-title-subheading">This is an example dashboard created usinguild-inelements and components.
                </div> --}}
            </div>
        </div>
          
    </div>
</div>      
@endsection

@section('contenido')
<div class="row mb-4" {{$i=1}}>
    @foreach ($datos_interesados as $interesados)
    <div class="col-md-6">
        <div class="main-card mb-3 card p-3">
            <div class="card-body mb-0">
                <h5>{{$interesados->nombres}} {{$interesados->apellPat}} {{$interesados->apellMat}}</h5> 
            </div>
            <div class="divider bg-primary mt-0"></div>
            <div class="row justify-content-center">
                <div class="">
                <form class="" action="">
                    <button type="button" class="btn mb-2 btn-primary" data-toggle="modal" data-target=".modal-{{$i}}">Ver Ficha de Experiencia</button>
                </form>
                </div>
                <div class="w-100"></div>
                <div class="">
                <form class="" action="{{route('aceptar_vacante',['id_proyecto' => $interesados->id_Proyecto,'id_puesto' => $interesados->id_Puesto,'matricula' => $interesados->matricula,'id_interesado' => $interesados->id ])}}" method="POST" novalidate>
                    @csrf
                    <button type="submit" class="btn mb-2 mr-1 btn-success">Aceptar Vacante</button>
                </form>
                </div>
                <div class="">
                <form class="" action="{{route('rechazar_vacante',['id_proyecto' => $interesados->id_Proyecto,'id_interesado' => $interesados->id, 'matricula' => $interesados->matricula ])}}" method="POST" novalidate>
                    @csrf
                    <button type="submit" class="btn mb-2 btn-danger">Rechazar Vacante</button>
                </form>
                </div>
            </div>
        </div>
    </div {{$i++}}>
    @endforeach
</div>
@endsection

<!-- Large modal -->
<div {{$i=1}}>
@foreach ($datos_interesados as $interesados)
<div class="modal fade modal-{{$i}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body container">
                <div class="card">
                    <hr>
                    <div class="row justify-content-center">
                        <div class="col-xs-3">
                            <img width="200" class="rounded-circle" src="{{asset("assets/$theme/images/avatars/default.png")}}">
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row justify-content-center">
                            <h5 class="modal-title" id="exampleModalLongTitle">{{$interesados->nombres}} {{$interesados->apellPat}} {{$interesados->apellMat}}</h5>
                    </div>
                    <hr>
                </div>
                <div class="dropdown-divider"></div>
                <div class="card"> 
                    <div class="card-body">
                        <div class="col">
                            <h5 class="card-title text-primary">Puesto al que aplica</h5>
                            <ul id="Experiencia" class="nav flex-column">
                                <div class='experiencia'>
                                    <li class='nav-item-header nav-item'>Puesto:</li>
                                    <input type='text' placeholder="{{$interesados->tipo_Puesto}}" readonly class='form-control border-primary' style="background: white;">
                                    <li class='nav-item-header nav-item'>Área de Conocimientos:</li>
                                    <input type='text' placeholder="{{$interesados->area_Puesto}}" readonly class='form-control border-primary' style="background: white;">
                                    <li class='nav-item-header nav-item'>Habilidades y Conocimientos Requeridos:</li>
                                    <textarea type='text' rows="5" readonly class='form-control border-primary' style="background: white;">{{$interesados->hab_Cono}}</textarea>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="card"> 
                    <div class="card-body">
                        <div class="col">
                            <h5 class="card-title text-primary">Datos Profesionales</h5>
                            <ul id="Experiencia" class="nav flex-column">
                                <div class='experiencia'>
                                    <li class='nav-item-header nav-item'>Área de Conocimientos:</li>
                                    <input type='text' placeholder="{{$interesados->areaCono}}" readonly class='form-control border-primary' style="background: white;">
                                    <li class='nav-item-header nav-item'>Facultad:</li>
                                    <input type='text' placeholder="{{$interesados->facultad}}" readonly class='form-control border-primary' style="background: white;">
                                    <li class='nav-item-header nav-item'>Licenciatura:</li>
                                    <input type='text' placeholder="{{$interesados->licenciatura}}" readonly class='form-control border-primary' style="background: white;">
                                    <br>
                                    <h5 class="card-title">Habilidades y Aptitudes</h5>
                                    @foreach ($datos_habilidades as $key => $habilidades)
                                        @foreach ($habilidades as $key => $dato)
                                        @if ($interesados->matricula == $habilidades[$key]->matricula)
                                        
                                        @foreach ($habilidades[$key] as $key => $dato)
                                            @if ($dato == 1)
                                                <li class="nav-item-header nav-item">{{$key}}</li>
                                            @endif
                                            @if($key == 'auto_Descripcion'  )
                                            <li class="nav-item-header nav-item">Descripción:</li>
                                                @if ($dato == NULL)
                                                    <textarea type='text' rows="1" readonly class='form-control border-primary' style="background: white;">Sin descripción</textarea>
                                                @else
                                                    <textarea type='text' rows="5" readonly class='form-control border-primary' style="background: white;">{{$dato}}</textarea>
                                                @endif
                                            @endif
                                        @endforeach
                                        
                                        {{-- @else
                                            <input type='text' placeholder="Sin Habilidades y Aptitudes" readonly class='form-control border-primary' style="background: white;">
                                            @break --}}
                                        @endif
                                        @endforeach  
                                    @endforeach 
                                    {{-- <li class="nav-item-header nav-item">Capacidad de iniciativa</li>
                                    <li class="nav-item-header nav-item">Adaptibilidad</li>
                                    <li class="nav-item-header nav-item">Capacidad para resolver problemas</li>
                                    <li class='nav-item-header nav-item'>Complemento:</li>
                                    <textarea type='text' readonly class='form-control border-primary' style="background: white;">Esta sección es para saber mas sobre mi y contar algo que no esta en el documento. Aquí puedes poner todo lo que quieras y es de forma libre. Muchas veces no es necesarios pero ayuda a conocer un poco mas de ti, como eres y que haces. Algo importantes es saber porque quieres tener exito.</textarea> --}}
                                    <br>
                                    <h5 class="card-title">Experiencias Profesionales o Academicas</h5>
                                    @foreach ($datos_experiencias as $key => $experiencias)
                                        @foreach ($experiencias as $key => $dato)
                                        @if ($interesados->matricula == $experiencias[$key]->matricula)
                                            <li class='nav-item-header nav-item'>Lugar (Área o Empresa):</li>
                                            <input type='text' placeholder="{{$experiencias[$key]->nombre_Emp}}" readonly class='form-control border-primary' style="background: white;">
                                            <li class='nav-item-header nav-item'>Puesto de Experiencia:</li>
                                            <input type='text' placeholder="{{$experiencias[$key]->puesto}}" readonly class='form-control border-primary' style="background: white;">
                                            <li class='nav-item-header nav-item'>Fecha de inicio:</li>
                                            <input type='text' placeholder="{{$experiencias[$key]->fecha_Ini}}" readonly class='form-control border-primary' style="background: white;">
                                            <li class='nav-item-header nav-item'>Fecha de termino:</li>
                                            <input type='text' placeholder="{{$experiencias[$key]->fecha_Fin}}" readonly class='form-control border-primary' style="background: white;">
                                        @else
                                            <input type='text' placeholder="Sin Experiencias" readonly class='form-control border-primary' style="background: white;">
                                            @break
                                        @endif
                                        @endforeach  
                                    @endforeach 
                                    <br>
                                    <h5 class="card-title">Idiomas</h5>
                                    @foreach ($idiomas_interesados as $key => $idioma)
                                        @foreach ($idioma as $key => $dato)
                                        @if ($interesados->matricula == $idioma[$key]->matricula)
                                            <li class='nav-item-header nav-item'>Idioma:</li>
                                            <input type='text' placeholder="{{$idioma[$key]->idioma}}" readonly class='form-control border-primary' style="background: white;">
                                            <li class='nav-item-header nav-item'>Nivel:</li>
                                            <input type='text' placeholder="{{$idioma[$key]->lvl_idioma}}" readonly class='form-control border-primary' style="background: white;">
                                        @else
                                            <input type='text' placeholder="Sin Idiomas" readonly class='form-control border-primary' style="background: white;">
                                            @break
                                        @endif
                                        @endforeach  
                                    @endforeach
                                    <br>
                                    <h5 class="card-title">Herramientas Tecnológicas</h5>
                                    @foreach ($herramientas_interesados as $key => $herramienta)
                                        @foreach ($herramienta as $key => $dato)
                                        @if ($interesados->matricula == $herramienta[$key]->matricula)
                                            <li class='nav-item-header nav-item'>Herramienta:</li>
                                            <input type='text' placeholder="{{$herramienta[$key]->herramienta}}" readonly class='form-control border-primary' style="background: white;">
                                            <li class='nav-item-header nav-item'>Nivel:</li>
                                            <input type='text' placeholder="{{$herramienta[$key]->lvl_cono}}" readonly class='form-control border-primary' style="background: white;">
                                        @else
                                            <input type='text' placeholder="Sin Herramientas Tecnologicas" readonly class='form-control border-primary' style="background: white;">
                                            @break
                                        @endif
                                        @endforeach  
                                    @endforeach
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="card"> 
                    <div class="card-body">
                        <h5 class="card-title text-primary">Datos Personales de Contacto</h5>
                        <li class='nav-item-header nav-item'>Correo:</li>
                        <input type='text' placeholder="{{$interesados->email}}" readonly class='form-control border-primary' style="background: white;">
                        <li class='nav-item-header nav-item'>Facebook:</li>
                        <input type='text' placeholder="{{$interesados->fb}}" readonly class='form-control border-primary' style="background: white;">
                        <li class='nav-item-header nav-item'>Twitter:</li>
                        <input type='text' placeholder="{{$interesados->tw}}" readonly class='form-control border-primary' style="background: white;">
                        <li class='nav-item-header nav-item'>Instagram:</li>
                        <input type='text' placeholder="{{$interesados->insta}}" readonly class='form-control border-primary' style="background: white;">
                        <li class='nav-item-header nav-item'>Telegram:</li>
                        <input type='text' placeholder="{{$interesados->tlgram}}" readonly class='form-control border-primary' style="background: white;">
                    
                    </div>
                </div>
                <div class="dropdown-divider"></div>
            
                        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</div {{$i++}}>
@endforeach
