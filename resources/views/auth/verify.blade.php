@extends('layouts.appNew')

@section('contenido')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                <div class="container-header" style="align-content:center">
                    <div class="" style="color:orangered; font-size:30px">Verifica tu contraseña</div>
                    <hr style="background-color: red;">
                </div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un nuevo correo de verificación.') }}
                        </div>
                    @endif
                    {{ __('Antes de proceder, por favor verifique su correo.') }}
                    {{ __('Si no ha recibido ningun email') }}, <a href="{{ route('verification.resend') }}">{{ __('click aquí para solicitar otro') }}</a>.
                </div>
            </div>
            <div class="card-body" style="text-align: center; ">
                <br>
               Si no tiene acceso al correo registrado, puede eliminar su registro haciendo <a href="{{ route('eliminar_usuario',['id_usuario'=>Auth::user()->id])}}">{{ __('click aquí') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
