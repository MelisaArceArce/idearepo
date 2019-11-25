@extends("template.layout")
@section('submenu_admin_proyecto')
<ul class="header-menu nav">
    <li class="nav-item">
        <a href="{{route('colaborador_proyecto',$proyecto->id)}}" class="nav-link">
           <i class="icono-grande fa fa-folder-open"> </i>
            Información
        </a>
    </li>
    <li class="btn-group nav-item">
        <a href="{{route('mis_Tareas',$proyecto->id)}}" class="nav-link">
            <i class="icono-grande fa fa-tasks"></i>
            Tareas
        </a>
    </li>
    <li class="dropdown nav-item">
        <a href="{{route('Colaboradores',$proyecto->id)}}" class="nav-link">
            <i class="icono-grande fa fa-users"></i>
            Colaboradores
        </a>
    </li>
</ul>
@endsection

@section('contenido')
<div class="main-card mb-3 card">
    <div class="card-body">
        <div class="card-header">
            <i class="header-icon lnr-license icon-gradientbg-plum-plate"> </i>{{Auth::user()->nombres}} {{Auth::user()->apellPat}}
            <div class="btn-actions-pane-right">
                    <h6 class="text-primary">Mis tareas</h6>
            </div>
        </div>
    <div  class="tab-pane" id="tab_tareas" role="tabpanel">
        <div {{$i = 1}}></div>
        <table id="tabla_editable" class="card-body mb-0 table table-responsive table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Nombre de Tarea</th>
                <th>Descripción de Tarea</th>
                <th>Estado</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody>         
                @csrf
                @foreach ($misTareas as $tarea)                
                <tr>                    
                    <th scope="row">{{$i}}</th>
                    <td>{{$tarea->nombre_Tarea}}</td>
                    <td><pre> {{$tarea->descri_Tarea}}</pre></td>
                <div class="row-unin" id="{{$tarea->id}}">
                        @if ($tarea->estado == 0)                        
                        <td class="table-danger"> Sin Iniciar </td>
                        @endif
                        @if ($tarea->estado == 1)
                            <td class="table-warning"> En Proceso </td>
                        @endif
                        @if ($tarea->estado == 2)
                            <td class="table-success"> Terminado </td>
                        @endif                  
                    </div>
                        
                    
                    <td>{{ \Carbon\Carbon::parse($tarea->fecha_Inicio)->format('d/m/Y')}}</td>
                    <td>{{\Carbon\Carbon::parse($tarea->fecha_Fin)->format('d/m/Y')}}</td>
                    <td>
                        @if ($tarea->estado == 0)
                        <a class="mb-2 mr-2 btn btn-warning" href="{{route('EstadoTarea',$tarea->id)}}" role="button">Por hacer</a>
                        @endif
                        @if ($tarea->estado == 1)
                        <a class="mb-2 mr-2 btn btn-success" href="{{route('EstadoTarea',$tarea->id)}}" role="button">Terminar</a>
                        @endif                       
                </tr>
                <div {{$i++}}></div>
            @endforeach
            <div {{$i = 1}}></div>
        </tbody>
        </table>
    
    </div>
    </div>
</div>
@endsection