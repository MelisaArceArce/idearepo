
@extends("template.layout")

@section('contenido')
    @section('titulo')
        <div class="app-page-title justify-content-center">
            <div class="page-title-iconperfil">
                <i class="fa fa-user-circle icon-gradient bg-sunny-morning">
                </i>
            </div>
        </div>
    @endsection
<div class="col-md-12">
    <div class="main-card mb-3 card">
        <form name="datosPersonales" action="{{route('perfil_personal', ['matricula_usuario' => Auth::user()->matricula])}}" onsubmit="return celular()" method="POST">
        @csrf
        <div class="card-body">
            <div class="card-header text-center bg-transparent border-primary text-secondary">
                <div class="col">
                    <h5>Datos Personales</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <ul class="nav flex-row">
                        <ul class="nav flex-column col-2">
                            <li class="nav-item-header nav-item">Matricula:</li>
                            <input placeholder="{{ Auth::user()->matricula }}" class="form-control border-danger" disabled="">
                        </ul>
                        <ul class="nav flex-column col-2">
                            <li class="nav-item-header nav-item">Nombre(s):</li>
                            <input placeholder="{{ Auth::user()->nombres }}" class="form-control border-danger" disabled="">
                        </ul>
                        <ul class="nav flex-column col-2">
                            <li class="nav-item-header nav-item">Apellido Paterno:</li>
                            <input placeholder="{{ Auth::user()->apellPat }}" class="form-control border-danger" disabled="">
                        </ul>
                        <ul class="nav flex-column col-2">
                            <li class="nav-item-header nav-item">Apellido Materno:</li>
                            <input placeholder="{{ Auth::user()->apellMat }}" class="form-control border-danger" disabled="">
                        </ul>
                        <ul class="nav flex-column col-2">
                            <li class="nav-item-header nav-item">Genero:</li>
                            <input  name="genero" id="genero"  placeholder="{{Auth::user()->genero}}" class="form-control border-danger" disabled="">
                        </ul>
                        
                    </ul>
                    <li class="divider"></li>
                    <ul class="nav flex-row">
                        <ul class="nav flex-column col-md-4">
                            <li class="nav-item-header nav-item">Correo Electronico:</li>
                            <input placeholder="{{ Auth::user()->email }}" class="form-control border-danger" disabled="">
                        </ul>
                        <ul class="nav flex-column col-md-3">
                            <li class="nav-item-header nav-item">Fecha de Nacimiento:</li>
                            <input type="date" name="fechaNacimiento" id="fechaNacimiento" value="{{ old('vacio', Auth::user()->fechaNacimiento ?? 'vacio') }}" class="form-control border-danger" disabled="" min="1940-01-01" max="2001-12-30">
                        </ul>
                    </ul>
                    <li class="divider"></li>
                    <ul class="nav flex-row">
                        <ul class="nav flex-column col-md-2">
                            <li class="nav-item-header nav-item">Celular:</li>
                            <input type="text" name="telefono" id="telefono" value="{{ old(' ',Auth::user()->telefono ?? '') }}" class="form-control border-danger" maxlength="10" disabled="">
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item-header nav-item">WhatsApp:</li>
                            <div class="custom-control custom-switch">
                                <input type="hidden" name='wa' value="0">
                                @if ((Auth::user()->wa)==1)
                                    <input id="wa" type="checkbox" class="custom-control-input" name="wa" disabled="" value="1" checked>
                                @else
                                    <input id="wa" type="checkbox" class="custom-control-input" name="wa" disabled="" value="1">
                                @endif   
                                <label class="custom-control-label" for="wa"></label>
                            </div>
                        </ul>
                        <ul class="nav flex-column col-md-3">
                            <li class="nav-item-header nav-item">Telegram (Nickname):</li>
                            <input type="text" name="tlgram" id="tlgram" placeholder="@" value="{{ old(' ',Auth::user()->tlgram ?? '') }}" class="form-control border-danger" disabled="">
                        </ul>
                    </ul>
                    <li class="divider"></li>
                    <ul class="nav flex-row">
                        <ul class="nav flex-row">
                            <li class="nav-item-header nav-item">Twitter:</li>
                            <input type="text" name="tw" id="tw" placeholder="@" value="{{ old('',Auth::user()->tw ?? '') }}" class="form-control border-danger" disabled="">
                        </ul>
                        <ul class="nav flex-row">    
                            <li class="nav-item-header nav-item">Facebook:</li>
                            <input type="text" name="fb" id="fb" value="{{ old(' ',Auth::user()->fb ?? '') }}" class="form-control border-danger" disabled="">
                        </ul>
                        <ul class="nav flex-row">    
                            <li class="nav-item-header nav-item">Instagram:</li>
                            <input type="text" name="insta" id="insta" value="{{ old(' ',Auth::user()->insta ?? '') }}" class="form-control border-danger" disabled="">
                        </ul>
                    </ul>
                </div>
            </div>
            <li class="divider"></li>
            <div class="text-center">
                <div id="btnEditaPerso" class="btn-pill btn btn-outline-primary btn-sm">Editar</div>
                <div id="btnCancelarPerso" class="btn-pill btn btn-outline-secondary btn-sm">Cancelar</div>
                <button id="btnGuadarPerso" class="btn-pill btn btn-outline-success btn-sm" type="submit" disabled="">Guardar</button>
            </div>
        </div>
        </form>
    </div>
</div>

<div class="main-card mb-3 card">
    <form id="datosProfesionales" name="datosProfesionales" action="{{route('perfil_profesional', ['matricula_usuario' => Auth::user()->matricula])}}" onsubmit="return idiomas()" method="POST" class="needs-validation"  novalidate>
    @csrf
    <div class="card-body">
        <div class="card-header text-center bg-transparent border-primary text-secondary">
            <div class="col">
                <h5>Datos Profesionales</h5>
            </div>
        </div>
        <div class="row">
                <div class="col">
                    <ul class="nav flex-row">
                        <ul class="nav flex-column col-md-4">
                            <li class="nav-item-header nav-item">Facultad:</li>
                            <input placeholder="{{ Auth::user()->facultad }}" class="form-control border-danger" disabled="">
                        </ul> 
                        <ul class="nav flex-column col-md-4">
                            <li class="nav-item-header nav-item">Area:</li>
                            <input id="AREA" value="{{ Auth::user()->areaCono }}" class="form-control border-danger" disabled="">
                        </ul>
                        <ul class="nav flex-column col-md-4">   
                            <li class="nav-item-header nav-item">Licenciatura:</li>
                            <select id='licenciatura' name='licenciatura' class='form-control border-primary' data-valueLic="{{ old('vacio', Auth::user()->licenciatura ?? 'vacio') }}" disabled="">
                                @if (!empty(Auth::user()->licenciatura))
                                    <option>{{ Auth::user()->licenciatura }}</option>
                                @endif
                            </select>
                        </ul>
                    </ul>
                    <li class="divider"></li>
                    <ul class="nav flex-row">
                        <div class="col">
                            <li class="card-title text-primary">Habilidades y Aptitudes</li>
                            <ul class="nav flex-column">
                                <table id="tablaHabilades">
                                   
                                    <tbody>
                                        <tr>
                                            
                                            <th scope="row"></th>
        
                                            <td><td>
                                                <input type="hidden" name='capacidad_de_iniciativa' value="0">
                                                @if (empty($habilidades[0]->capacidad_de_iniciativa))
                                                    <input id='capacidad_de_iniciativa' name='capacidad_de_iniciativa' class="habilidadestab" type="checkbox"  value="1" disabled="" >
                                                @else
                                                    <input id='capacidad_de_iniciativa' name='capacidad_de_iniciativa' class="habilidadestab" type="checkbox" value="1" disabled="" checked>
                                                @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">Capacidad de iniciativa</li></td>
        
                                            <td><td>
                                                <input type="hidden" name='adaptabilidad' value="0">
                                                @if (empty($habilidades[0]->adaptabilidad))
                                                    <input id='adaptabilidad' name='adaptabilidad' class="habilidadestab" type="checkbox"  value="1" disabled="">
                                                @else
                                                    <input id='adaptabilidad' name='adaptabilidad' class="habilidadestab" type="checkbox" value="1" disabled="" checked>
                                                @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">Adaptibilidad</li></td>
        
                                            <td><td>
                                                <input type="hidden" name='resolver_problemas' value="0">
                                                @if (empty($habilidades[0]->resolver_problemas))
                                                    <input id='resolver_problemas' name='resolver_problemas' class="habilidadestab" type="checkbox"  value="1" disabled="">
                                                @else
                                                    <input id='resolver_problemas' name='resolver_problemas' class="habilidadestab" type="checkbox" value="1" disabled="" checked>
                                                @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">Capacidad para resolver problemas</li></td>
        
                                            <td><td>
                                                <input type="hidden" name='trabajo_en_equipo' value="0">
                                                @if (empty($habilidades[0]->trabajo_en_equipo))
                                                    <input id='trabajo_en_equipo' name='trabajo_en_equipo' class="habilidadestab" type="checkbox"  value="1" disabled="">
                                                @else
                                                    <input id='trabajo_en_equipo' name='trabajo_en_equipo' class="habilidadestab" type="checkbox" value="1" disabled="" checked>
                                                @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">Trabajo en equipo</li></td>
                                            
                                            <td><td>
                                                <input type="hidden" name='versatilidad' value="0">
                                                @if (empty($habilidades[0]->versatilidad))
                                                    <input id='versatilidad' name='versatilidad' class="habilidadestab" type="checkbox"  value="1" disabled="">
                                                @else
                                                    <input id='versatilidad' name='versatilidad' class="habilidadestab" type="checkbox" value="1" disabled="" checked>
                                                @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">Versatibilidad</li></td>
        
                                            <td><td>
                                                <input type="hidden" name='creatividad' value="0">
                                                @if (empty($habilidades[0]->creatividad))
                                                    <input id='creatividad' name='creatividad' class="habilidadestab" type="checkbox"  value="1" disabled="">
                                                @else
                                                    <input id='creatividad' name='creatividad' class="habilidadestab" type="checkbox" value="1" disabled="" checked>
                                                @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">Creatividad</li></td>
        
                                        <tr>
        
                                            <th scope="row"></th>
        
                                            <td><td>
                                                <input type="hidden" name='liderazgo' value="0">
                                                @if (empty($habilidades[0]->liderazgo))
                                                    <input id='liderazgo' name='liderazgo' class="habilidadestab" type="checkbox"  value="1" disabled="">
                                                @else
                                                    <input id='liderazgo' name='liderazgo' class="habilidadestab" type="checkbox" value="1" disabled="" checked>
                                                 @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">Liderazgo</li></td>
        
                                            <td><td>
                                                <input type="hidden" name='seriedad' value="0">
                                                @if (empty($habilidades[0]->seriedad))
                                                    <input id='seriedad' name='seriedad' class="habilidadestab" type="checkbox"  value="1" disabled="">
                                                @else
                                                    <input id='seriedad' name='seriedad' class="habilidadestab" type="checkbox" value="1" disabled="" checked>
                                                @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">Seriedad</li></td>
        
                                            <td><td>
                                                <input type="hidden" name='resolucion_de_problemas' value="0">
                                                @if (empty($habilidades[0]->resolucion_de_problemas))
                                                    <input id='resolucion_de_problemas' name='resolucion_de_problemas' class="habilidadestab" type="checkbox"  value="1" disabled="">
                                                @else
                                                    <input id='resolucion_de_problemas' name='resolucion_de_problemas' class="habilidadestab" type="checkbox" value="1" disabled="" checked>
                                                @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">Resolucion de problemas complejos</li></td>
        
                                            <td><td>
                                                <input type="hidden" name='pensamiento_critico' value="0">
                                                @if (empty($habilidades[0]->pensamiento_critico))
                                                    <input id='pensamiento_critico' name='pensamiento_critico' class="habilidadestab" type="checkbox"  value="1" disabled="">
                                                @else
                                                    <input id='pensamiento_critico' name='pensamiento_critico' class="habilidadestab" type="checkbox"  value="1" disabled="" checked>
                                                @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">Pensamiento critico</li></td>
        
                                            <td><td>
                                                <input type="hidden" name='manejo_de_personas' value="0">
                                                @if (empty($habilidades[0]->manejo_de_personas))
                                                    <input id='manejo_de_personas' name='manejo_de_personas' class="habilidadestab" type="checkbox"  value="1" disabled="">
                                                @else
                                                    <input id='manejo_de_personas' name='manejo_de_personas' class="habilidadestab" type="checkbox" value="1" disabled="" checked>
                                                @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">El manejo de personas</li></td>
        
                                            <td><td>
                                                <input type="hidden" name='coordinacion' value="0">
                                                @if (empty($habilidades[0]->coordinacion))
                                                    <input id='coordinacion' name='coordinacion' class="habilidadestab" type="checkbox"  value="1" disabled="">
                                                @else
                                                    <input id='coordinacion' name='coordinacion' class="habilidadestab" type="checkbox" value="1" disabled="" checked>
                                                @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">Coordinacion con los demas</li></td>
        
                                        </tr>
                                    
                                        <tr>
        
                                            <th scope="row"></th>
        
                                            <td><td>
                                                <input type="hidden" name='inteligencia_emocional' value="0">
                                                @if (empty($habilidades[0]->inteligencia_emocional))
                                                    <input id='inteligencia_emocional' name='inteligencia_emocional' class="habilidadestab" type="checkbox"  value="1" disabled="">
                                                @else
                                                    <input id='inteligencia_emocional' name='inteligencia_emocional' class="habilidadestab" type="checkbox" value="1" disabled="" checked>
                                                @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">Inteligencia emocional</li></td>
        
                                            <td><td>
                                                <input type="hidden" name='juicio_decisiones' value="0">
                                                @if (empty($habilidades[0]->juicio_decisiones))
                                                    <input id='juicio_decisiones' name='juicio_decisiones' class="habilidadestab" type="checkbox"  value="1" disabled="">
                                                @else
                                                    <input id='juicio_decisiones' name='juicio_decisiones' class="habilidadestab" type="checkbox" value="1" disabled="" checked>
                                                @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">Juicio y toma de decisiones</li></td>
        
                                            <td><td>
                                                <input type="hidden" name='orientacion_de_servicio' value="0">
                                                @if (empty($habilidades[0]->orientacion_de_servicio))
                                                    <input id='orientacion_de_servicio' name='orientacion_de_servicio' class="habilidadestab" type="checkbox"  value="1" disabled="">
                                                @else
                                                    <input id='orientacion_de_servicio' name='orientacion_de_servicio' class="habilidadestab" type="checkbox" value="1" disabled="" checked>
                                                @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">Orientacion de servicio</li></td>
        
                                            <td><td>
                                                <input type="hidden" name='negociacion' value="0">
                                                @if (empty($habilidades[0]->negociacion))
                                                    <input id='negociacion' name='negociacion' class="habilidadestab" type="checkbox"  value="1" disabled="">
                                                @else
                                                    <input id='negociacion' name='negociacion' class="habilidadestab" type="checkbox" value="1" disabled="" checked>
                                                @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">Negociacion</li></td>
        
                                            <td><td>
                                                <input type="hidden" name='flexibilidad_cognitiva' value="0">
                                                @if (empty($habilidades[0]->flexibilidad_cognitiva))
                                                    <input id='flexibilidad_cognitiva' name='flexibilidad_cognitiva' class="habilidadestab" type="checkbox"  value="1" disabled="">
                                                @else
                                                    <input id='flexibilidad_cognitiva' name='flexibilidad_cognitiva' class="habilidadestab" type="checkbox" value="1" disabled="" checked>
                                                @endif
                                            </td></td>
                                            <td><li class="nav-item-header nav-item">Flexibilidad cognitiva</li></td>
        
                                        </tr>
                                    </tbody>
                                </table>
                            </ul>
                        </div>                       
                    </ul>
                    <li class="divider"></li>
                    <ul class="nav flex-row">
                        <div class="col">
                            <li class="card-title text-primary">Complemento</li>
                            <ul class="nav flex-column">
                                <div class="position-relative form-group">
                                <textarea name="auto_Descripcion" id="auto_Descripcion" placeholder="Si crees que te falto comentar algo, porfavor escribelo aqui..."  class="form-control border-danger" disabled="" >@if (!(empty($habilidades[0]->auto_Descripcion))){{ $habilidades[0]->auto_Descripcion }}@endif</textarea>
                                </div>
                            </ul>
                        </div>
                    </ul>    
                    <li class="divider"></li>
                    <ul class="nav flex-row">
                        <div class="col">
                            <li class="card-title text-primary">Experiencia Profesional / Académica</li>
                                <ul id="Experiencia" class="nav flex-column">
                                    @if (($experiencias)=="[]")
                                        <li>Te recomendamos agregar experiencias a tu perfil.</li> 
                                        <li class='divider'></li>
                                    @else
                                    @foreach ($experiencias as $experiencia)
                                            <div class='experiencia'><input class="expdel" type='checkbox' data-idexp="{{$experiencia->id}}" disabled="">
                                            <li class='nav-item-header nav-item'>Lugar (Area o Empresa):</li>
                                            <input id='nombre_Emp' name='experiencias[exp{{$loop->index}}][nombre_Emp]' type='text' class='form-control border-primary' value="{{$experiencia->nombre_Emp}}" required >
                                            <li class='nav-item-header nav-item'>Puesto de experiencia:</li>
                                            <input id='puesto' name='experiencias[exp{{$loop->index}}][puesto]' type='text' class='form-control border-primary' value="{{$experiencia->puesto}}" required>
                                            <li class='nav-item-header nav-item'>Fecha que inicio:</li>
                                            <input type='date' class='form-control border-primary' id='fecha_Ini' name='experiencias[exp{{$loop->index}}][fecha_Ini]' value="{{$experiencia->fecha_Ini}}">
                                            <li class='nav-item-header nav-item'>Fecha que termino:</li>
                                            <input type='date' class='form-control border-primary' id='fecha_Fin' name='experiencias[exp{{$loop->index}}][fecha_Fin]' value="{{$experiencia->fecha_Fin}}">
                                            <li class='divider'></li>
                                            </div>
                                    @endforeach
                                        <input type="hidden" id='experienciasval' name='experienciasval' value="{{count($experiencias)}}">
                                    @endif
                                </ul>
                            <div id="btnExp" class="btn-pill btn btn-outline-primary btn-sm">Agregar</div>
                            <div id="delRegExp" data-token="{{ csrf_token() }}" class="btn-pill btn btn-outline-danger btn-sm">Borrar experiencia(s) seleccionado(s)</div>
                        </div>
                        <div class="col">
                            <li class="card-title text-primary">Idioma</li>
                            <ul id="Idioma" class="nav flex-column">
                                @if (($idiomas)=="[]")
                                    <li>Te recomendamos agregar idiomas a tu perfil.</li>
                                    <li class='divider'></li>
                                @else
                                    @foreach ($idiomas as $idioma)
                                        <div class='idioma'><input type='checkbox' class="idiomdel" data-ididiom="{{$idioma->id}}" disabled="">
                                        <li class='nav-item-header nav-item'>Idioma:</li>
                                        <select id='idioma' name='idioma[idiom{{$loop->index}}][idioma]' class='idiomaselec form-control border-primary' >
                                            @if ($idioma->idioma === 'Ingles')
                                                <option selected>Ingles</option>
                                                <option>Frances</option>
                                                <option>Italiano</option>
                                                <option>Portugues</option>
                                                <option>Aleman</option>
                                                <option>Ruso</option>
                                                <option>Japones</option>
                                                <option>Mandarin</option>
                                            @endif
                                            @if ($idioma->idioma === 'Frances')
                                                <option>Ingles</option>
                                                <option selected>Frances</option>
                                                <option>Italiano</option>
                                                <option>Portugues</option>
                                                <option>Aleman</option>
                                                <option>Ruso</option>
                                                <option>Japones</option>
                                                <option>Mandarin</option>
                                            @endif
                                            @if ($idioma->idioma === 'Italiano')
                                                <option>Ingles</option>
                                                <option>Frances</option>
                                                <option selected>Italiano</option>
                                                <option>Portugues</option>
                                                <option>Aleman</option>
                                                <option>Ruso</option>
                                                <option>Japones</option>
                                                <option>Mandarin</option>
                                            @endif
                                            @if ($idioma->idioma === 'Portugues')
                                                <option>Ingles</option>
                                                <option>Frances</option>
                                                <option>Italiano</option>
                                                <option selected>Portugues</option>
                                                <option>Aleman</option>
                                                <option>Ruso</option>
                                                <option>Japones</option>
                                                <option>Mandarin</option>
                                            @endif
                                            @if ($idioma->idioma === 'Aleman')
                                                <option>Ingles</option>
                                                <option>Frances</option>
                                                <option>Italiano</option>
                                                <option>Portugues</option>
                                                <option selected>Aleman</option>
                                                <option>Ruso</option>
                                                <option>Japones</option>
                                                <option>Mandarin</option>
                                            @endif
                                            @if ($idioma->idioma === 'Ruso')
                                                <option>Ingles</option>
                                                <option>Frances</option>
                                                <option>Italiano</option>
                                                <option>Portugues</option>
                                                <option>Aleman</option>
                                                <option selected>Ruso</option>
                                                <option>Japones</option>
                                                <option>Mandarin</option>
                                            @endif
                                            @if ($idioma->idioma === 'Japones')
                                                <option>Ingles</option>
                                                <option>Frances</option>
                                                <option>Italiano</option>
                                                <option>Portugues</option>
                                                <option>Aleman</option>
                                                <option>Ruso</option>
                                                <option selected>Japones</option>
                                                <option>Mandarin</option>
                                            @endif
                                            @if ($idioma->idioma === 'Mandarin')
                                                <option>Ingles</option>
                                                <option>Frances</option>
                                                <option>Italiano</option>
                                                <option>Portugues</option>
                                                <option>Aleman</option>
                                                <option>Ruso</option>
                                                <option>Japones</option>
                                                <option selected>Mandarin</option>
                                            @endif
                                        </select>
                                        <li class='nav-item-header nav-item'>Nivel:</li>
                                        <select name='idioma[idiom{{$loop->index}}][lvl_idioma]' id='lvl_idioma' class='form-control border-primary' >
                                            @if ($idioma->lvl_idioma === 'Basico')
                                                <option selected>Basico</option>
                                                <option>Intermedio</option>
                                                <option>Avanzado</option>
                                            @endif
                                            @if ($idioma->lvl_idioma === 'Intermedio')
                                                <option>Basico</option>
                                                <option selected>Intermedio</option>
                                                <option>Avanzado</option>
                                            @endif
                                            @if ($idioma->lvl_idioma === 'Avanzado')
                                                <option>Basico</option>
                                                <option>Intermedio</option>
                                                <option selected>Avanzado</option>
                                            @endif
                                        </select>
                                        <li class='divider'></li>
                                        </div>
                                    @endforeach
                                        <input type="hidden" id='idiomasval' name='idiomasval' value="{{count($idiomas)}}">
                                @endif
                            </ul>
                            <div id="btnIdiom" class="btn-pill btn btn-outline-primary btn-sm">Agregar</div>
                            <div id="delRegIdiom" class="btn-pill btn btn-outline-danger btn-sm">Borrar idioma(s) seleccionado(s)</div>
                        </div>
                        <div class="col">
                            <li class="card-title text-primary">Herramientas Tecnologicas</li>
                            <ul id="Herramienta" class="nav flex-column">
                                @if (($herramientas)=="[]")
                                    <h6>Te recomendamos agregar herramientas a tu perfil, las mas comunes son:</h6> 
                                    <ol>
                                        <li>Office (Microsoft o Libre)</li>   
                                        <li>Trello y Asana</li>   
                                        <li>Google Drive y Dropbox</li>   
                                        <li>Adobe y CorelDraw</li>   
                                        <li>Outlook y Gmail</li>   
                                    </ol>
                                    <li class='divider'></li>
                                @else
                                    @foreach ($herramientas as $herramienta)    
                                        <ul id="Herramienta" class="nav flex-column">
                                            <div class='herramientas'><input type='checkbox' class="herradel" data-idherra="{{$herramienta->id}}" disabled="">
                                            <input type="hidden" id='herramientasid' name='herramientasid' data-idexp="{{$herramienta->id}}">
                                            <li class='nav-item-header nav-item'>Herramienta:</li>
                                            <input name='herramienta[herra{{$loop->index}}][herramienta]' id='herramienta' type='text' class='form-control border-primary' value="{{$herramienta->herramienta}}" required>
                                            <li class='nav-item-header nav-item'>Nivel:</li>
                                            <select name='herramienta[herra{{$loop->index}}][lvl_cono]' id='lvl_cono' type='text' class='form-control border-primary'>
                                                @if ($herramienta->lvl_cono === 'Basico')
                                                    <option selected>Basico</option>
                                                    <option>Intermedio</option>
                                                    <option>Avanzado</option>
                                                @endif
                                                @if ($herramienta->lvl_cono === 'Intermedio')
                                                    <option>Basico</option>
                                                    <option selected>Intermedio</option>
                                                    <option>Avanzado</option>
                                                @endif
                                                @if ($herramienta->lvl_cono === 'Avanzado')
                                                    <option>Basico</option>
                                                    <option>Intermedio</option>
                                                    <option selected>Avanzado</option>
                                                @endif
                                            </select>
                                            <li class='divider'></li>
                                            </div>
                                        </ul>
                                    @endforeach
                                        <input type="hidden" id='herramientasval' name='herramientasval' value="{{count($herramientas)}}">
                                @endif
                            </ul>
                            <div id="btnHerra" class="btn-pill btn btn-outline-primary btn-sm">Agregar</div>
                            <div id="delRegHerra" class="btn-pill btn btn-outline-danger btn-sm">Borrar herramienta(s) seleccionado(s)</div>
                        </div>                            
                    </ul>
            </div>
        </div>
        <li class="divider"></li>
        <div class="text-center">
            <div id="btnEditaProfe" class="btn-pill btn btn-outline-primary btn-sm">Editar</div>
            <div id="btnCancelarProfe" class="btn-pill btn btn-outline-secondary btn-sm">Cancelar</div>
            <button id="btnGuadarProfe" class="btn-pill btn btn-outline-success btn-sm" type="submit" disabled="">Guardar</button>
        </div>
    </form>
    </div>
</div>
@endsection