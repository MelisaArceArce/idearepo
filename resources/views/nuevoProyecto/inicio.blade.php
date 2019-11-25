@extends("template.layout")
@section('contenido')
    @section('titulo')
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
                        <i class="pe-7s-light icon-gradient bg-sunny-morning">
                        </i>
                    </div>
                    <div class="text-primary">Nuevo Proyecto
                        {{-- <div class="page-title-subheading">This is an example dashboard created usinguild-inelements and components.
                        </div> --}}
                    </div>
                </div>
                
            </div>
        </div>      
    @endsection
        
    
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h2 class="card-title text-primary">Proyecto</h2>
            <div class="row">
                <form class="needs-validation" action="{{route('guardar_proyecto')}}" method="POST" novalidate>
                    @csrf
                    <div class="col-md-12"> 
                        <div class="col-md-12 card">{{-- Inicio de proyecto --}}
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_usuario1_nueva" role="tabpanel">
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <div class="mb-3">
                                                    <label for="nombreProy">Nombre del proyecto:</label>
                                                    <input type="text" name="nombre_Proy" class="form-control" id="nombreProy" placeholder="Ingresa el nombre aqui..." maxlength="150" value="{{ old('nombre_Proy') }}" required>
                                                    <div class="invalid-feedback">
                                                        Por favor ingresa el nombre.
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Excelente!
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="areaEnfocada" class="">Area a la que está enfocada el proyecto:</label>
                                                        <select name="area_Enfocada" id="areaEnfocada" class="form-control">
                                                            <option>Todas la áreas</option>
                                                            <option>Área de Ciencias Naturales y de Salud</option>
                                                            <option>Área de Ciencias Sociales y Humanidades</option>
                                                            <option>Área de Económico-Administrativas</option>
                                                            <option>Área de Ingenierías y Ciencias Exactas </option>
                                                        </select>
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
                                                    <input type="date" name="fecha_Inicio" class="form-control" id="fechaInicio" placeholder="" value="" min="2000-01-01" max="2050-12-30" value="{{ old('fecha_Inicio') }}" required>
                                                    <div class="invalid-feedback">
                                                        Por favor ingresa una fecha correcta.
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Excelente!
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="estado" class="">Estado del proyecto:</label>
                                                        <select name="estado" id="estado" class="form-control">
                                                            <option>Sin estado</option>
                                                            <option>Activo </option>
                                                            <option>En espera</option>
                                                        </select>
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
                                                <textarea type="text" rows="4" name="descrip_Breve" class="form-control" id="descripBreve" placeholder="" value="{{ old('descrip_Breve') }}" required></textarea>
                                                <div class="invalid-feedback">
                                                    Por favor ingresa una descripción breve.
                                                </div>
                                                <div class="valid-feedback">
                                                    Excelente!
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="descripCom">Descripción Completa(mínimo 50, máximo 2500 caracteres)</label>
                                                <textarea type="text" rows="9" name="descrip_Com" class="form-control" id="descripCom" placeholder="" value="{{ old('descrip_Com') }}" required></textarea>
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
                            
                        </div> {{-- Fin de proyecto --}}

                        <li class="divider"></li>
                        <h2 class="card-title text-primary">Puestos</h2>

                        <div class="row row-unico">
                            <div class="col-md-6" id="id_UNICO"> {{-- Inicio de puesto fijo --}}
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="form-row">
                                                <div class="col-md-12 mb-3">
                                                    <label for="tipoPuesto">Nombre del puesto:</label>
                                                    <input type="text" class="form-control" name="puestos[puesto-0][tipo_Puesto]" id="tipoPuesto" placeholder="Ingresa el nombre aqui..." value="{{ old('puestos[puesto-0][tipo_Puesto]') }}" maxlength="75" required>
                                                    <div class="invalid-feedback">
                                                        Por favor ingresa el nombre.
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Excelente!
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="habCono">Habilidades y conocimientos requeridos:</label>
                                                    <textarea type="text" class="form-control" name="puestos[puesto-0][hab_Cono]" id="habCono" placeholder="Escribe aquí..." value="" required></textarea>
                                                    <div class="invalid-feedback">
                                                        Por favor ingresa habilidades y conocimientos.
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Excelente!
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="vacantes" class="">Número de vacantes:</label>
                                                    <input name="puestos[puesto-0][vacantes]" id="vacantes" value="1" min="1" type="number" class="form-control">
                                                    <div class="invalid-feedback">
                                                        Ingresa un número valido.
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Excelente!
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label for="areaPuesto" class="">Area a la que está enfocada el puesto:</label>
                                                        <select name="puestos[puesto-0][area_Puesto]" id="areaPuesto" class="form-control">
                                                            <option>Todas la áreas</option>
                                                            <option>Área de Ciencias Naturales y de Salud</option>
                                                            <option>Área de Ciencias Sociales y Humanidades</option>
                                                            <option>Área de Económico-Administrativas</option>
                                                            <option>Área de Ingenierías y Ciencias Exactas </option>
                                                        </select>
                                                    <div class="invalid-feedback">
                                                        Por favor ingresa el nombre.
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Excelente!
                                                    </div>
                                                </div>
                                            </div>        
                                        </div>
                                    </div>
                                </div>
                            </div> {{-- Fin de puesto fijo --}}

                            {{-- Aquí se agregan los puestos dinamicamente --}}
                        </div>
                    </div>
                    <div class="col-md-4 mb-2" >
                        <button class="btn btn-primary " id="nuevoPuesto" >Nuevo puesto</button> 
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary " id="removerPuesto" >Eliminar ultimo puesto agregado</button>
                    </div>
                    <br>
                    <br>
                    <div class="container mb-5">
                        <button class="btn btn-primary float-right" type="submit">Crear Proyecto!</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection
