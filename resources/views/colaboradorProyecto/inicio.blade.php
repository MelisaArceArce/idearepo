@extends("template.layout")
@section('submenu_admin_proyecto')
    <ul class="header-menu nav">
        <li class="nav-item">
            <a href="{{route('colaborador_proyecto',$proyectoColInf->id)}}" class="nav-link">
            <i class="icono-grande fa fa-folder-open"> </i>
                Información
            </a>
        </li>
        <li class="btn-group nav-item">
            <a href="{{route('mis_Tareas',$proyectoColInf->id)}}" class="nav-link">
                <i class="icono-grande fa fa-tasks"></i>
                Tareas
            </a>
        </li>
        <li class="dropdown nav-item">
            <a href="{{route('Colaboradores',$proyectoColInf->id)}}" class="nav-link">
                <i class="icono-grande fa fa-users"></i>
                Colaboradores
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
                        <input name="matricula" id="matricula" placeholder="{{$Informacion_Ad[0]->matricula}}" class="form-control" disabled="">
                    </div>
                </div>
                <div class="col-md-6">
                        <label for="facultad" class="">Facultad:</label>
                        <input name="facultad" id="facultad" placeholder="{{$Informacion_Ad[0]->facultad}}" class="form-control" disabled="">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <div class="position-relative form-group">
                        <label for="nombre" class="">Nombre(s):</label>
                        <input name="facultad" id="facultad" placeholder="{{$Informacion_Ad[0]->nombres}}" class="form-control" disabled="">
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="apellidoPaterno" class="">Apellido Paterno:</label>
                            <input name="facultad" id="facultad" placeholder="{{$Informacion_Ad[0]->apellPat}} " class="form-control" disabled="">
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="apellidoMaterno" class="">Apellido Materno:</label>
                            <input name="facultad" id="facultad" placeholder="{{$Informacion_Ad[0]->apellMat}}" class="form-control" disabled="">
                        </div>
                </div>
                <div class="text-center">
                        <label>Contacto:</label>
                        <input class='form-control'  id='contacto'placeholder='{{$Informacion_Ad[0]->email}}' disabled>
                </div>

            </div>
            
            <hr>
            <h3 class="card-title text-primary">Datos del Proyecto</h3>
            <div class="divider bg-primary"></div>
            
            <div class="col-md-12 card">{{-- Inicio de proyecto --}}
                <form name="AdmProy">
                @csrf
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_usuario1_nueva" role="tabpanel">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="mb-3">
                                        <label for="nombreProy">Nombre del proyecto:
                                        </label>
                                        <input type="text" name="nombre_Proy" class="form-control" id="nombreProy" value="{{$proyectoColInf->nombre_Proy}}" disabled>
                                    </div>
                                    <div class="mb-3">
                                        <label for="areaEnfocada" class="">Area a la que está enfocada el proyecto:</label>
                                        <input name="area_Enfocada" id="area_Enfocada" value="{{$proyectoColInf->area_Enfocada}}" class="form-control" disabled="">    
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="mb-3">
                                        <label for="fechaInicio">Fecha de inicio del proyecto:</label>
                                        <input type="date" name="fecha_Inicio" class="form-control" id="fechaInicio" value="{{$proyectoColInf->fecha_Inicio}}" min="2000-01-01" max="2050-12-30" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="estado" class="">Estado del proyecto:</label>
                                        @if ($proyectoColInf->estado === "Sin estado") 
                                            <div class="custom-radio custom-control " ><input disabled='true' type="radio" id="sinEstado" name="estado" class="custom-control-input border-primary " value="Sin estado" checked><label class="custom-control-label" for="sinEstado">Sin estado</label></div>
                                        @else
                                            <div class="custom-radio custom-control " ><input disabled='true' type="radio" id="sinEstado" name="estado" class="custom-control-input border-primary " value="Sin estado"><label class="custom-control-label" for="sinEstado">Sin estado</label></div>
                                        @endif
                                        @if ($proyectoColInf->estado === "Activo")
                                            <div class="custom-radio custom-control " ><input disabled='true' type="radio" id="Activo" name="estado" class="custom-control-input border-primary  " value="Activo" checked><label class="custom-control-label" for="Activo">Activo</label></div>
                                        @else
                                            <div class="custom-radio custom-control " ><input disabled='true' type="radio" id="Activo" name="estado" class="custom-control-input border-primary " value="Activo"><label class="custom-control-label" for="Activo">Activo</label></div>
                                        @endif 
                                        @if ($proyectoColInf->estado === "En espera")
                                            <div class="custom-radio custom-control " ><input disabled='true' type="radio" id="enEspera" name="estado" class="custom-control-input border-primary " value="En espera" checked><label class="custom-control-label" for="enEspera">En espera</label></div>
                                        @else
                                            <div class="custom-radio custom-control " ><input disabled='true' type="radio" id="enEspera" name="estado" class="custom-control-input border-primary " value="En espera"><label class="custom-control-label" for="enEspera">En espera</label></div>
                                        @endif                                  
                                    </div>
                                </div>
                            
                                <div class="col-md-12 mb-3">
                                    <label for="descripBreve">Descripción Breve</label>
                                    <textarea type="text" rows="4" name="descrip_Breve" class="form-control" id="descripBreve" placeholder="{{$proyectoColInf->descrip_Breve}}" disabled></textarea>                                    
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="descripCom">Descripción Completa</label>
                                    <textarea type="text" rows="9" name="descrip_Com" class="form-control" id="descripCom" placeholder="{{$proyectoColInf->descrip_Com}}"  disabled></textarea>                                    
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                </form>        
            </div> 
    </div>
</div>
@endsection