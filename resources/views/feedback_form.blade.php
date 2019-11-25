@extends('template.layout')

@section('titulo')
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v4.0"></script>
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-light icon-gradient bg-sunny-morning">
                    </i>
                </div>
                <div class="text-primary">Mandanos tus comentarios
                    {{-- <div class="page-title-subheading">This is an example dashboard created usinguild-inelements and components.
                    </div> --}}
                </div>
            </div>
            
        </div>
    </div>      
    @endsection

@section('contenido')
<div class="row">
    <div class="col-4">
            <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="card-title">
                            Hablanos de lo que piensas por mensaje de facebook
                        </div>
                        {{-- <form action="{{route('enviafeedback')}}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="comentario">Si tienes alguna sugerencia o detectas algun problema comentanos.</label>
                                    <textarea rows="10" name="comentario" class="form-control" id="comentario" placeholder="" value="{{ old('nombre_Proy') }}" minlength="10" required></textarea>
                                    <div class="invalid-feedback">
                                        Por favor ingresa algo.
                                    </div>
                                    <div class="valid-feedback">
                                        Excelente!
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Enviar</button></p>
                        </form> --}}
                        <div class="fb-page" data-href="https://www.facebook.com/Estudio404_-104330180931041/" data-tabs="" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Estudio404_-104330180931041/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Estudio404_-104330180931041/">Estudio404_</a></blockquote></div>
                    </div>
                </div>
    </div>
    
</div>
    
@endsection