@extends('template.layout')
@section('contenido')
@if (session('message_alta'))
    <div class="alert alert-success">
        <ul>
            <li>{{ session('message_alta') }}</li>
        </ul>
    </div>
@endif
@foreach ($proyectos->reverse() as $proyecto)
    @include('index-home.tarjetaProyecto')
@endforeach    
@endsection