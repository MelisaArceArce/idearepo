@extends("template.registro")

@section('contenido')
    @section('titulo')
        
                <div class="page-title-heading">
                        <div class="" style="margin-bottom:0px; padding-top:10px;" > 
                            <img class="" style="width:20%; height: 20%; " src="/assets/template/images/logo3.png" alt="logo">
                        </div>
                    <div class="" style="color:orangered; font-size:40px">Registro
                        {{-- <div class="page-title-subheading">This is an example dashboard created usinguild-inelements and components.
                        </div> --}}
                    </div>
                </div>
                
               
      @include('includes.form-error')  
    @endsection

    @section('contenido')
 
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <p>Corrige los siguientes errores:</p>
        <ul>
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div class="row"> <!--main-card mb-3 card    -->
        <div class="col-md-12" style="margin-top:5px"> <!--card-body-->
            <form action="{{route('register')}}" method="POST" class="needs-validation"  novalidate>
                @csrf
                <div class="form-row justify-content-md-center">
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="matricula" class="lab">Matricula:</label>
                            <input name="matricula" id="matricula" value="{{ old('matricula') }}" type="text" class="form-control border-primary" maxlength="9" minlength=9 autocomplete="username" required>
                            <div class="invalid-feedback">
                                Por favor ingrese su matricula.
                            </div>
                            <div class="valid-feedback">
                                Excelente!
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-4">
                        <div class="position-relative form-group">
                            <label for="facultad" class="lab">Facultad:</label>
                            <select name="facultad" id="facultad" value="{{ old('facultad') }}" class="form-control border-primary" required>
                                <option value=""> Elige una opción </option>
                                    <optgroup label="Área de Cs. Naturales y de Salud"> 
                                        <option value="Facultad de Medicina Veterinaria y Zootecnia" @if (old('facultad')=="Facultad de Medicina Veterinaria y Zootecnia") {{'selected'}} @endif>Facultad de Medicina Veterinaria y Zootecnia</option> 
                                        <option value="Facultad de Ciencias Biológicas" @if (old('facultad')=="Facultad de Ciencias Biológicas") {{'selected'}} @endif>Facultad de Ciencias Biológicas</option> 
                                        <option value="Facultad de Ciencias Químicas" @if (old('facultad')=="Facultad de Ciencias Químicas") {{'selected'}} @endif>Facultad de Ciencias Químicas</option>
                                        <option value="Facultad de Enfermería" @if (old('facultad')=="Facultad de Enfermería") {{'selected'}} @endif>Facultad de Enfermería</option>
                                        <option value="Facultad de Estomatología" @if (old('facultad')=="Facultad de Estomatología") {{'selected'}} @endif>Facultad de Estomatología</option>
                                        <option value="Facultad de Ingeniería Agrohidráulica" @if (old('facultad')=="Facultad de Ingeniería Agrohidráulica") {{'selected'}} @endif>Facultad de Ingeniería Agrohidráulica</option>
                                        <option value="Facultad de Medicina" @if (old('facultad')=="Facultad de Medicina") {{'selected'}} @endif>Facultad de Medicina</option>
                                    </optgroup> 
                                    <optgroup label="Área de Económico-Administrativas"> 
                                        <option value="Facultad de Administración" @if (old('facultad')=="Facultad de Administración") {{'selected'}} @endif>Facultad de Administración</option> 
                                        <option value="Facultad de Ciencias de la Comunicación" @if (old('facultad')=="Facultad de Ciencias de la Comunicación") {{'selected'}} @endif>Facultad de Ciencias de la Comunicación</option> 
                                        <option value="Facultad de Contaduría Pública" @if (old('facultad')=="Facultad de Contaduría Pública") {{'selected'}} @endif>Facultad de Contaduría Pública</option>
                                        <option value="Facultad de Economía" @if (old('facultad')=="Facultad de Economía") {{'selected'}} @endif>Facultad de Economía</option>
                                    </optgroup> 
                                    <optgroup label="Área de Ingenierías y Ciencias Exactas"> 
                                        <option value="Facultad de Arquitectura" @if (old('facultad')=="Facultad de Arquitectura") {{'selected'}} @endif>Facultad de Arquitectura</option> 
                                        <option value="Facultad de Ciencias de la Computación" @if (old('facultad')=="Facultad de Ciencias de la Computación") {{'selected'}} @endif>Facultad de Ciencias de la Computación</option> 
                                        <option value="Facultad de Ciencias de la Electrónica" @if (old('facultad')=="Facultad de Ciencias de la Electrónica") {{'selected'}} @endif>Facultad de Ciencias de la Electrónica</option>
                                        <option value="Facultad de Ciencias Físico Matemáticas" @if (old('facultad')=="Facultad de Ciencias Físico Matemáticas") {{'selected'}} @endif>Facultad de Ciencias Físico Matemáticas</option>
                                        <option value="Facultad de Ingeniería" @if (old('facultad')=="Facultad de Ingeniería") {{'selected'}} @endif>Facultad de Ingeniería</option>
                                        <option value="Facultad de Ingeniería Química" @if (old('facultad')=="Facultad de Ingeniería Química") {{'selected'}} @endif>Facultad de Ingeniería Química</option>
                                    </optgroup> 
                                    <optgroup label="Área de Ciencias Sociales y Humanidades"> 
                                        <option value="Escuela de Artes" @if (old('facultad')=="Escuela de Artes") {{'selected'}} @endif>Escuela de Artes</option> 
                                        <option value="Escuela de Artes Plásticas y Audiovisuales" @if (old('facultad')=="Escuela de Artes Plásticas y Audiovisuales") {{'selected'}} @endif>Escuela de Artes Plásticas y Audiovisuales</option> 
                                        <option value="Facultad de Ciencias de la Comunicación" @if (old('facultad')=="Facultad de Ciencias de la Comunicación") {{'selected'}} @endif>Facultad de Ciencias de la Comunicación</option>
                                        <option value="Facultad de Cultura Física" @if (old('facultad')=="Facultad de Cultura Física") {{'selected'}} @endif>Facultad de Cultura Física</option>
                                        <option value="Facultad de Derecho y Ciencias Sociales" @if (old('facultad')=="Facultad de Derecho y Ciencias Sociales") {{'selected'}} @endif>Facultad de Derecho y Ciencias Sociales</option>
                                        <option value="Facultad de Filosofía y Letras" @if (old('facultad')=="Facultad de Filosofía y Letras") {{'selected'}} @endif>Facultad de Filosofía y Letras</option>
                                        <option value="Facultad de Lenguas" @if (old('facultad')=="Facultad de Lenguas") {{'selected'}} @endif>Facultad de Lenguas</option>
                                        <option value="Facultad de Psicología" @if (old('facultad')=="Facultad de Psicología") {{'selected'}} @endif>Facultad de Psicología</option>
                                    </optgroup> 
                            </select>
                            <div class="invalid-feedback">
                                Por favor ingrese su facultad.
                            </div>
                            <div class="valid-feedback">
                                Excelente!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="position-relative form-group">
                                <label for="nombres" class="lab">Nombre(s):</label>
                                <input id="nombres" type="text" class="form-control border-primary @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres" autofocus>
                                <div class="invalid-feedback">
                                    Por favor ingrese su nombre.
                                </div>
                                <div class="valid-feedback">
                                    Excelente!
                                </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                                <label for="apellPat" class="lab">Apellido Paterno:</label>
                                <input name="apellPat" id="apellPat" value="{{ old('apellPat') }}" type="text" autocomplete="off" class="form-control border-primary" required>
                                <div class="invalid-feedback">
                                    Por favor ingrese su apellido paterno.
                                </div>
                                <div class="valid-feedback">
                                    Excelente!
                                </div>
                        </div> 
                    </div>
                    <div class="col-md-3">
                        <div class="position-relative form-group">
                                <label for="apellMat" class="lab">Apellido Materno:</label>
                                <input name="apellMat" id="apellMat" autocomplete="off" value="{{ old('apellMat') }}" type="text" class="form-control border-primary" required>
                                <div class="invalid-feedback">
                                    Por favor ingrese su apellido materno.
                                </div>
                                <div class="valid-feedback">
                                    Excelente!
                                </div>
                        </div> 
                    </div>
                    <div class="col-md-2">
                        <div class="position-relative form-group">
                            <label for="genero" class="lab">Género:</label>
                            <select name="genero" id="genero" class="form-control border-primary" required>
                                <option value=""> Elige una opción</option>
                                <option value="M" @if (old('genero')=="M") {{'selected'}} @endif>Masculino</option> 
                                <option value="F" @if (old('genero')=="F") {{'selected'}} @endif>Femenino</option> 
                                <option value="O" @if (old('genero')=="O") {{'selected'}} @endif>Otro</option> 
                            </select>
                            <div class="invalid-feedback">
                                Por favor seleccione su genero.
                            </div>
                            <div class="valid-feedback">
                                Excelente!
                            </div>
                        </div>
                    </div>
                    {{--   <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" name="tipoUsuario" id="tipoUsuario">
                                <label class="custom-control-label" for="tipoUsuario">Docente</label>
                        </div>
                    --}}
                </div>

                <div class="form-row justify-content-md-center">
                    <div class="col-md-8 mb-5">
                        <div class="position-relative form-group">
                                <label for="email" class="email lab">Correo:</label>
                                <input id="email"  type="email" style="" class="form-control  border-primary @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">
                                <div class="invalid-feedback">
                                    Por favor ingrese su email.
                                </div>
                                <div class="valid-feedback">
                                    Excelente!
                                </div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="password" class="lab">Contraseña:</label>
                            <input id="password" type="password" style="" class="form-control  border-primary @error('password') is-invalid @enderror" minlength=8 name="password" required autocomplete="off">
                            <div class="invalid-feedback">
                                Por favor ingresa una contraseña de al menos 8 caracteres.
                            </div>
                            <div class="valid-feedback">
                                Excelente!
                            </div>
                        </div>
                        <div class="position-relative form-group">
                            <label for="password_confirmation" class="lab">Repetir contraseña:</label>
                            <input id="password-confirm" type="password" style="" class="form-control  border-primary" name="password_confirmation" minlength=8 required autocomplete="off">
                            <div class="invalid-feedback">
                                Ingrese de nuevo la contraseña.
                            </div>
                            <div class="valid-feedback">
                                Excelente!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center" style="margin-bottom:45px">
                        <button class="btn btn-primary btn-lg" style="width:100px;height:40px; padding:0" type="submit">Enviar</button>
                </div>
            </form>
            
        </div>
        
    </div>
    
    @endsection
@endsection