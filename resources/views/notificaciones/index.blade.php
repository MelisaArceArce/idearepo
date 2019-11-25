
@extends("template.layout")

@section('contenido')
    @section('titulo')
        <div class="app-page-title justify-content-center">
            <div class="page-title-iconperfil">
                <i class="fa fa-envelope icon-gradient bg-sunny-morning">
                </i>
            </div>
        </div>
    @endsection

    <div class="main-card mb-3 card">
        <div class="card-body">
            <ul class="list-group">
                @if ($leidas->count() < 1)
                <li class="list-group-item dropdown-item bg-primary">
                    <h5 class="list-group-item-heading text-white">Sin Notificaciones</h5>
                </li> 
                @endif
                @foreach ($leidas as $dato)
                <li class="list-group-item dropdown-item"><h5 class="list-group-item-heading text-primary">Mensaje de: {{$dato->nombre_Remitente}} </h5>
                    <p class="list-group-item-text">{{$dato->mensaje }}</p>
                    <p class="list-group-item-text">Fecha y Hora: {{$dato->hora}}</p>
                </li> 
                @endforeach
            </ul>
        </div>
    </div>

@endsection