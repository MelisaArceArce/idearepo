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
@if (session('message_asignacion'))
    <div class="alert alert-success">
        <ul>
            <li>{{ session('message_asignacion') }}</li>
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
                <i class="fa fa-tasks icon-gradient bg-sunny-morning">
                </i>
            </div>
            <div class="">Administración de Tareas
                {{-- <div class="page-title-subheading">This is an example dashboard created usinguild-inelements and components.
                </div> --}}
            </div>
        </div>
          
    </div>
</div>      
@endsection
<div {{$i = 0}}></div>
@section('contenido')
<div class="main-card mb-3 card">
    <div class="card-body">
        <div class="row">
            
            @foreach ($datos_colaboradores as $colaborador)
            <form class="needs-validation col-md-12" action="{{route('asignar_tarea',['id_Proyecto' => $id_Proyecto,'matricula_usuario' => $colaborador->matricula_Usuario])}}" method="POST" novalidate>
                @csrf
                <div > {{-- Inicio de tarjeta --}}
                    <div class="main-card mb-3 card">
                        <div class="card-header">
                            <i class="header-icon lnr-license icon-gradientbg-plum-plate"> </i>{{ $colaborador->nombres }}
                            <div class="btn-actions-pane-right">
                                    <div role="group" class="btn-group-sm nav btn-group">
                                        <a data-toggle="tab" href="#tab_nueva{{$i}}" class="btn-shadow active btn btn-primary">Nueva tarea</a>
                                    <a data-toggle="tab" href="#tab_tareas{{$i}}" class="btn-shadow  btn btn-primary">Tareas asignadas</a>
                                    </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_nueva{{$i}}" role="tabpanel">
                                    <form class="needs-validation" novalidate>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="nombreTarea">Nombre de la tarea (Mínimo 15, máximo 100 caracteres)</label>
                                            <input type="text" minlength="15" class="form-control" name="nombre_Tarea" id="nombreTarea" placeholder="Ingresa el nombre de la tarea aquí..." value="{{ old('nombre_Tarea') }}" required>
                                                <div class="invalid-feedback">
                                                    Por favor ingresa el nombre.
                                                </div>
                                                <div class="valid-feedback">
                                                    Excelente!
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="descriTarea">Descripción de la tarea (Mínimo 15, máximo 300 caracteres)</label>
                                                <textarea type="text" minlength="15" class="form-control" name="descri_Tarea" id="descriTarea" placeholder="Describe lo que el usuario tiene que ralizar..." rows="5" required>{{ old('descri_Tarea') }}</textarea>
                                                <div class="invalid-feedback">
                                                    Por favor ingresa la descripción.
                                                </div>
                                                <div class="valid-feedback">
                                                    Excelente!
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="fechaInicio">Fecha de inicio</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="fecha_Inicio" id="fechaInicio"  aria-describedby="inputGroupPrepend" value="{{ old('fecha_Inicio') }}" required>
                                                    <div class="invalid-feedback">
                                                        Por favor ingresa la fecha de inicio.
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Excelente!
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="fechaFin">Fecha de entrega</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" name="fecha_Fin" id="fechaFin"  aria-describedby="inputGroupPrepend" value="{{ old('fecha_Fin') }}" required>
                                                    <div class="invalid-feedback">
                                                        Por favor ingresa la fecha de entrega.
                                                    </div>
                                                    <div class="valid-feedback">
                                                        Excelente!
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <button class="btn btn-primary" type="submit">Asignar tarea</button>
                                    </form>
                                            
                                </div>

                                <div class="tab-pane" id="tab_tareas{{$i}}" role="tabpanel">
                                    {{-- <div class="card-body"> --}}
                                        <div {{$j = 1}}></div>
                                        
                                            <table id="tabla_editable" class="card-body mb-0 table table-responsive table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nombre de Tarea</th>
                                                            <th>Descripción de Tarea</th>
                                                            <th>Estado</th>
                                                            <th>Fecha Inicio</th>
                                                            <th>Fecha Fin</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            @foreach ($tareas_colaboradores as $tarea)
                                                            @if ($tarea->matricula_Usuario == $colaborador->matricula_Usuario)
                                                            <form action="{{route('editTareas', ['id_Proyecto' => $id_Proyecto,'matricula_usuario' => $colaborador->matricula_Usuario,'id_tarea'=>$j])}}" method="POST">
                                                            @csrf
                                                                <tr>
                                                                    <th scope="row">{{ $j }}</th>
                                                                    <td>
                                                                        <textarea name="nombre_Tarea" rows="7" class="form-control border-danger nomTarea" disabled="">{{ $tarea->nombre_Tarea }}</textarea>                                            
                                                                    </td>
                                                                    <td>
                                                                        <textarea name="descri_Tarea" rows="7" class="form-control border-danger desTarea" disabled="">{{ $tarea->descri_Tarea }}</textarea>                                            
                                                                    </td>
                                                                    
                                                                        @if ($tarea->estado == 0)
                                                                            <td class="table-danger"> Sin Iniciar </td>
                                                                        @endif
                                                                        @if ($tarea->estado == 1)
                                                                            <td class="table-warning"> En Proceso </td>
                                                                        @endif
                                                                        @if ($tarea->estado == 2)
                                                                            <td class="table-success"> Terminado </td>
                                                                        @endif
                                                                    
                                                                    <td>
                                                                        <input style="width:120px"  type="date" name="fecha_Inicio" value="{{ $tarea->fecha_Inicio }}" class="form-control border-danger fechaIn" disabled="" min="1940-01-01" max="2041-12-30">
                                                                    </td>
                                                                    <td>
                                                                        <input style="width:120px"  type="date" name="fecha_Fin" value="{{ $tarea->fecha_Fin }}" class="form-control border-danger fechaFin" disabled="" min="1940-01-01" max="2041-12-30">
                                                                    </td>
                                                                    <td>
                                                                        {{-- <button id="eliminarTarea" type="button" class="btn-shadow p-1 btn btn-danger btn-sm">
                                                                                <i class="fa fa-fw" title="Eliminar tarea"></i>
                                                                        </button>
                                                                        <br> --}}
                                                                        <button type="button" class="btn-shadow p-1 btn btn-warning btn-sm editarTarea">
                                                                                <i class="fa fa-fw" {{-- aria-hidden="true" --}} title="Editar tarea"></i>
                                                                        </button>
                                                                        <br>
                                                                        <button  type="submit" class="btn-shadow p-1 btn btn-success btn-sm guardarTarea" disabled>
                                                                                <i class="fa fa-fw" {{-- aria-hidden="true" --}} title="Guardar Cambios"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </form>
                                                            <div {{$j++}}></div>
                                                            @endif
                                                        @endforeach
                                                        <div {{$j = 1}}></div>      
                                                    </tbody>
                                                </table>
                                        
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                        {{-- <div class="d-block text-right card-footer">
                        
                        </div> --}}
                    </div>

                </div> {{-- Fin de tarjeta --}}
            </form>
            <div {{$i++}}></div>
            @endforeach
  
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $(".editarTarea").on("click",function(){
            $(".nomTarea").prop('disabled',false);
            $(".desTarea").prop('disabled',false);
            $(".fechaIn").prop('disabled',false);
            $(".fechaFin").prop('disabled',false);
            $(".guardarTarea").prop('disabled',false);
            $(".editarTarea").on("click",function(){

                $(".nomTarea").prop('disabled',true);
                $(".desTarea").prop('disabled',true);
                $(".fechaIn").prop('disabled',true);
                $(".fechaFin").prop('disabled',true);
                $(".guardarTarea").prop('disabled',true);
            });

            /* if($("#fechaNacimiento").attr('value') === "vacio"){
                $("#fechaNacimiento").prop('disabled',false);
            }

            

            $("#btnGuadarPerso").prop('disabled',false);

            $("#btnCancelarPerso").on("click",function(){

                window.location.reload(true); 

            }).removeClass("disabled"); */

        });

    }
    )
</script>
@endsection

