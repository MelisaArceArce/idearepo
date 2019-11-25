@extends("template.layout")

@section('submenu_admin_proyecto')
    <ul class="header-menu nav" id="nav">
        <li class="nav-item">
            <a href="{{route('admin_proyecto',$proyectosAdmin->id)}}" class="nav-link">
            <i class="icono-grande fa fa-folder-open"> </i>
                Información
            </a>
        </li>
        <li class="btn-group nav-item">
            <a href="{{route('tareas_proyecto',$proyectosAdmin->id)}}" class="nav-link">
                <i class="icono-grande fa fa-tasks"></i>
                Tareas
            </a>
        </li>
        <li class="dropdown nav-item">
            <a href="{{route('colaboradores_proyecto',$proyectosAdmin->id)}}" class="nav-link">
                <i class="icono-grande fa fa-users"></i>
                Colaboradores
            </a>
        </li>
        <li class="dropdown nav-item">
            <a href="{{route('postulados_proyecto',$proyectosAdmin->id)}}" class="nav-link">
                <i class="icono-grande fa fa-address-card"></i>
                Postulados
            </a>
        </li>

    </ul>
@endsection

@section('titulo')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="fa fa-folder-open icon-gradient bg-sunny-morning">
                    </i>
                </div>
                <div class="">Información del Proyecto
                </div>
            </div>
            
        </div>
    </div>      
@endsection

@section('contenido')
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h3 class="card-title text-primary">Datos del administrador</h3>
            <div class="divider bg-primary"></div>
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="position-relative form-group" >
                            <label for="matricula" class="">Matricula:</label>
                            <input name="matricula" id="matricula" placeholder="{{ Auth::user()->matricula }}" class="form-control" disabled="">
                        </div>
                    </div>
                    <div class="col-md-6">
                            <label for="facultad" class="">Facultad:</label>
                            <input name="facultad" id="facultad" placeholder="{{ Auth::user()->facultad }}" class="form-control" disabled="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="nombre" class="">Nombre(s):</label>
                            <input name="facultad" id="facultad" placeholder="{{ Auth::user()->nombres }}" class="form-control" disabled="">
                        </div>
                    </div>
                    <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="apellidoPaterno" class="">Apellido Paterno:</label>
                                <input name="facultad" id="facultad" placeholder="{{ Auth::user()->apellPat }}" class="form-control" disabled="">
                            </div>
                    </div>
                    <div class="col-md-4">
                            <div class="position-relative form-group">
                                <label for="apellidoMaterno" class="">Apellido Materno:</label>
                                <input name="facultad" id="facultad" placeholder="{{ Auth::user()->apellMat }}" class="form-control" disabled="">
                            </div>
                    </div>
                </div>
                
                <hr>
                <h3 class="card-title text-primary">Datos del Proyecto</h3>
                <div class="divider bg-primary"></div>
                
                {{-- Inicio de proyecto --}}
                    <form name="AdmProy" action="{{route( 'guardar_admin_proyecto', ['id_proyecto' => $proyectosAdmin->id,'matricula_usuario' => Auth::user()->matricula] )}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_usuario1_nueva" role="tabpanel">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <div class="mb-3">
                                            <label for="nombreProy">Nombre del proyecto:</label>
                                            <input type="text" name="nombre_Proy" class="form-control" id="nombreProy" placeholder="Ingresa el nombre aqui..." maxlength="150" value="{{ $proyectosAdmin->nombre_Proy }}">
                                            <div class="invalid-feedback">
                                                Por favor ingresa el nombre.
                                            </div>
                                            <div class="valid-feedback">
                                                Excelente!
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="areaEnfocada" class="">Area a la que está enfocada el proyecto:</label>
                                            <input name="area_Enfocada" id="area_Enfocada" value="{{ $proyectosAdmin->area_Enfocada  }}" class="form-control">
                                            <div class="invalid-feedback">
                                                Por favor ingresa el nombre.
                                            </div>
                                            <div class="valid-feedback">
                                                Excelente!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <div class="mb-3">
                                            <label for="fechaInicio">Fecha de inicio del proyecto:</label>
                                            <input type="date" name="fecha_Inicio" class="form-control" id="fechaInicio" value="{{ $proyectosAdmin->fecha_Inicio  }}" min="2000-01-01" max="2050-12-30" required>
                                            <div class="invalid-feedback">
                                                Por favor ingresa una fecha correcta.
                                            </div>
                                            <div class="valid-feedback">
                                                Excelente!
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="estado" class="">Estado del proyecto:</label>
                                            @if ($proyectosAdmin->estado === "Sin estado")
                                                <div class="custom-radio custom-control"><input type="radio" id="sinEstado" name="estado" class="custom-control-input border-primary" value="Sin estado" checked><label class="custom-control-label" for="sinEstado">Sin estado</label></div>
                                            @else
                                                <div class="custom-radio custom-control"><input type="radio" id="sinEstado" name="estado" class="custom-control-input border-primary" value="Sin estado"><label class="custom-control-label" for="sinEstado">Sin estado</label></div>
                                            @endif
                                            @if ($proyectosAdmin->estado === "Activo")
                                                <div class="custom-radio custom-control"><input type="radio" id="Activo" name="estado" class="custom-control-input border-primary" value="Activo" checked><label class="custom-control-label" for="Activo">Activo</label></div>
                                            @else
                                                <div class="custom-radio custom-control"><input type="radio" id="Activo" name="estado" class="custom-control-input border-primary" value="Activo"><label class="custom-control-label" for="Activo">Activo</label></div>
                                            @endif 
                                            @if ($proyectosAdmin->estado === "En espera")
                                                <div class="custom-radio custom-control"><input type="radio" id="enEspera" name="estado" class="custom-control-input border-primary" value="En espera" checked><label class="custom-control-label" for="enEspera">En espera</label></div>
                                            @else
                                                <div class="custom-radio custom-control"><input type="radio" id="enEspera" name="estado" class="custom-control-input border-primary" value="En espera"><label class="custom-control-label" for="enEspera">En espera</label></div>
                                            @endif
                                            <div class="invalid-feedback">
                                                Por favor ingresa el estado.
                                            </div>
                                            <div class="valid-feedback">
                                                Excelente!
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="col-md-12 mb-3">
                                        <label for="descripBreve">Descripción Breve(mínimo 25, máximo 500 caracteres)</label>
                                        <textarea type="text" rows="4" name="descrip_Breve" class="form-control" id="descripBreve" placeholder="" >{{ $proyectosAdmin->descrip_Breve  }}</textarea>
                                        <div class="invalid-feedback">
                                            Por favor ingresa una descripción breve.
                                        </div>
                                        <div class="valid-feedback">
                                            Excelente!
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="descripCom">Descripción Completa(mínimo 50, máximo 2500 caracteres)</label>
                                        <textarea type="text" rows="9" name="descrip_Com" class="form-control" id="descripCom" placeholder="" >{{ $proyectosAdmin->descrip_Com  }}</textarea>
                                        <div class="invalid-feedback">
                                            Por favor ingresa una descripción completa.
                                        </div>
                                        <div class="valid-feedback">
                                            Excelente!
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-12 mb-3">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="privado" id="privado">
                                            <label class="custom-control-label" for="privado">Privado</label>
                                        </div>
                                        <p>Recuerda que si tu proyecto es privado no podra aparecer en la busqueda de proyecto, y solo sera activo mediante invitacion</p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="btnCancelarAdm" class="btn-pill btn btn-outline-secondary btn-sm">Cancelar</div>
                        <button id="btnGuadarProy" class="btn-pill btn btn-outline-success btn-sm" type="submit">Guardar</button>
                    </div>
                    </form>        
                {{-- Fin de proyecto --}}

                <hr>
                <h3 class="card-title text-primary">Puestos</h3>
                <div class="divider bg-primary"></div>

                    {{-- Inicio de proyecto --}}
                        <form name="PAdmProy" action="{{route( 'guardar_admin_proyecto_puestos', ['id_proyecto' => $proyectosAdmin->id,'matricula_usuario' => Auth::user()->matricula] )}}" method="POST">
                        @csrf
                        <div class="card-body">
                                    <div class="row row-unico">
                                        @foreach ($puestos as $puesto)

                                        
                                            <div class="col-md-6" id="remover-{{$loop->iteration}}">
                                                <div class="main-card mb-3 card">
                                                    <div class="card-body">
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="tab_usuario1_nueva" role="tabpanel">

                                                            <input type="hidden" class="form-control" name="puestos[puesto-{{$loop->index}}][id]" id="idPuesto{{$loop->iteration}}" value="{{ $puesto->id }}" required>
                                                            <div class="form-row">
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="tipoPuesto">Nombre del puesto:</label>
                                                                        <input type="text" class="form-control" name="puestos[puesto-{{$loop->index}}][tipo_Puesto]" id="tipoPuesto" value="{{ $puesto->tipo_Puesto }}" maxlength="75"  required>
                                                                    <div class="invalid-feedback">
                                                                        Por favor ingresa el nombre.
                                                                    </div>
                                                                    <div class="valid-feedback">
                                                                        Excelente!
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="habCono">Habilidades y conocimientos requeridos:</label>
                                                                        <textarea type="text" class="form-control" name="puestos[puesto-{{$loop->index}}][hab_Cono]" id="habCono" required>{{ $puesto->hab_Cono }}</textarea>
                                                                    <div class="invalid-feedback">
                                                                        Por favor ingresa habilidades y conocimientos.
                                                                    </div>
                                                                    <div class="valid-feedback">
                                                                        Excelente!
                                                                    </div>                 
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="vacantes" class="">Número de vacantes:</label>
                                                                        <input name="puestos[puesto-{{$loop->index}}][vacantes]" id="vacantes" value="{{ $puesto->vacantes }}" min="1" type="number" class="form-control">
                                                                    <div class="invalid-feedback">
                                                                        Ingresa un número valido.
                                                                    </div>
                                                                    <div class="valid-feedback">
                                                                        Excelente!
                                                                    </div>          
                                                                </div>
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="areaPuesto" class="">Area a la que está enfocada el puesto:</label>
                                                                    <input name="puestos[puesto-{{$loop->index}}][area_Puesto]" id="area_Puesto" value="{{ $puesto->area_Puesto  }}" type="text" min="1" class="form-control border-primary">
                                                                    <div class="invalid-feedback">
                                                                        'Por favor ingresa el nombre.
                                                                    </div>
                                                                    <div class="valid-feedback">
                                                                        'Excelente!
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        </div>
                                            
                                        @endforeach
                                    </div>
                                    <div class="row">

                                    
                                    <div class="col-md-2 mb-2">
                                        <input type="hidden" id='puestosval' name='puestosval' value="{{count($puestos)}}">
                                        <button class="btn btn-primary" id="nuevoPuesto" >Nuevo puesto</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="btn btn-primary" data-token="{{ csrf_token() }}" id="removerPuesto" >Eliminar ultimo puesto agregado</div>
                                    </div>
                                    </div>
                        </div>
                        <div class="text-center mb-3">
                            <div id="btnCancelarAdm" class="btn-pill btn btn-outline-secondary btn-sm">Cancelar</div>
                            <button id="btnGuadarProy" class="btn-pill btn btn-outline-success btn-sm" type="submit">Guardar</button>
                        </div>
                        </form>        
                    {{-- Fin de proyecto --}}

        </div>
    </div>
@endsection
