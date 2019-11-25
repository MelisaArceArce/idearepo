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
                <i class="fa fa-users icon-gradient bg-sunny-morning">
                </i>
            </div>
            <div class="">Colaboradores
                {{-- <div class="page-title-subheading">This is an example dashboard created usinguild-inelements and components.
                </div> --}}
            </div>
        </div>
          
    </div>
</div>      
@endsection
<div {{$i = 0}}></div>
@section('contenido')
<div class="row" {{$i=1}}>
    @foreach ($datos_colaboradores as $colaborador)
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="container">
                <h5 class="card-title "><img width="60" class="rounded-circle" src="{{asset("assets/$theme/images/avatars/1.png")}}"><p>  </p> {{ $colaborador->nombres }} {{$colaborador->apellPat}} {{$colaborador->apellMat}}</h5>
                </div>
                <div class="row collapse" id="collapse{{$i}}" style="">
                    <div class="col-md-6 mb-3 border border-primary border-top-0 border-left-0 border-right-0">
                        <label for="nombreTarea">Puesto:</label>
                        <label for="nombreTarea">{{ $colaborador->puesto_Dese }}</label>
                    </div>
                    <div class="col-md-6 mb-3 border border-primary border-top-0 border-left-0 border-right-0">
                        <label for="nombreTarea">Fecha de Ingreso:</label>
                        <label for="nombreTarea">{{ $colaborador->fecha_Ingreso }}</label>
                    </div>
                    <div class="col-md-6 mb-3 border border-primary border-top-0 border-left-0 border-right-0">
                        <label for="nombreTarea">Facultad:</label>
                        <label for="nombreTarea">{{ $colaborador->facultad }}</label>
                    </div>
                    <div class="col-md-6 mb-3 border border-primary border-top-0 border-left-0 border-right-0">
                        <label for="nombreTarea">Licenciatura:</label>
                        <label for="nombreTarea">{{ $colaborador->licenciatura }}</label>
                    </div>
                    <div class="col-md-6 mb-3 border border-primary border-top-0 border-left-0 border-right-0">
                        <label for="nombreTarea">Teléfono:</label>
                        <label for="nombreTarea">{{ $colaborador->telefono }}</label>
                    </div>
                    <div class="col-md-6 mb-3 border border-primary border-top-0 border-left-0 border-right-0">
                        <label for="nombreTarea">Facebook:</label>
                        <label for="nombreTarea">{{ $colaborador->fb }}</label>
                    </div>
                    <div class="col-md-6 mb-3 border border-primary border-top-0 border-left-0 border-right-0">
                        <label for="nombreTarea">Twitter:</label>
                        <label for="nombreTarea">{{ $colaborador->tw }}</label>
                    </div>
                    <div class="col-md-6 mb-3 border border-primary border-top-0 border-left-0 border-right-0">
                        <label for="nombreTarea">Telegram:</label>
                        <label for="nombreTarea">{{ $colaborador->tlgram }}</label>
                    </div>
                    <div class="col-md-6 mb-3 border border-primary border-top-0 border-left-0 border-right-0">
                        <label for="nombreTarea">Instagram:</label>
                        <label for="nombreTarea">{{ $colaborador->insta }}</label>
                    </div>
                    <div class="col-md-6 mb-3 border border-primary border-top-0 border-left-0 border-right-0">
                        <label for="nombreTarea">Correo:</label>
                        <label for="nombreTarea">{{ $colaborador->email }}</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" data-toggle="collapse" href="#collapse{{$i}}" class="btn btn-primary collapsed" aria-expanded="false">Más Información</button>
            </div>
        </div>
    </div {{$i++}}>
    @endforeach

</div>
@endsection
