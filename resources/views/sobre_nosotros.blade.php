@extends('template.layoutlogoff')

@section('contenido')
    @section('titulo')
    <br>
    <div class="app-page-title justify-content-center">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                {{--<div class="page-title-icon">
                   <i class="pe-7s-light icon-gradient bg-sunny-morning">
                    </i>
                </div>--}}
                <div class="text-primary" style="font-size: 2.0em;"><strong>Sobre Nosotros</strong>
                    {{-- <div class="page-title-subheading">This is an example dashboard created usinguild-inelements and components.
                    </div> --}}
                </div>
            </div>
            
        </div>
    </div>      
    @endsection

    <div class="row justify-content-center">
            <div class="main-card mb-3 card">
                <a href="{{ route('inicio_sistema') }}" class="btn btn-outline-primary">Regresar</a>
            </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="main-card mb-3 card">
                <h3 class="card-title text-primary margen" style="font-size:1.7em;">El estudio</h3>
                {{--empieza la parte web--}}
                <div class="hidden1 margen2">
                    {{--empieza la parte de el estudio--}}
                    <div class="row no-gutters" style="margin-bottom:20px">
                        {{--Imagenes de estudio 404--}}
                        <div class="col-5 d-flex">
                            <div class="container  justify-content-center align-self-center">
                                <img src="{{URL::asset('assets/template/images/estudiologo.png')}}" alt="" width="" class="card-img">
                                {{--<img src="{{URL::asset('assets/template/images/404/es404cl.JPG')}}" alt="" width="100%" class="mx-auto d-block">--}}
                            </div>
                        </div>
                        {{--termina estudio 404--}}
                        {{--Conteiner de estudio 404--}}
                        <div class="col-7">
                            <div class="conteiner">
                                    <div class="card-body">
                                        Somos un equipo de trabajo formado en la Facultad de Ciencias de la Computación de la Benemérita Universidad Autónoma de Puebla comprometidos con la sociedad, en la búsqueda y construcción de soluciones a través del software.
                                    </div>
                                <div class="footer1" style="margin:10px;position:relative;bottom:5px;right:10px; ">
                                    <div class="card-footer justify-content-center">
                                        <a class="card-link" href="">Facebook</a>
                                        <a class="card-link" href="">Twitter</a>
                                        <a class="card-link" href="">Instagram</a>
                                    </div>
                                    <div class="card-footer justify-content-center">
                                        <a class="card-link">Correo: estudio404_@outlook.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--conteiner de estudio 404--}}
                    </div>
                    {{--termina la parte de estudio 404--}}
                    <h3 class="card-title text-primary" style="margin-top:50px;padding:15px;font-size:1.7em;">¿Por qué estudio404_?</h3>
                    {{--empieza la parte de porque estudio 404--}}
                    <div class="row no-gutters" style="margin-bottom:20px">
                            <div class="col-5">
                                <div class="conteiner">
                                        <div class="card-body">
                                            El nombre surgió por que nuestras primeras juntas como grupo eran en el salón 404 del edificio 4 de la Facultad de 
                                            Computación de la BUAP. Un dato curioso con ese número es que esta asociado a un error conocido dentro del desarrollo 
                                            WEB, el >>Error 404<< que se genera cuando una página de internet no es encontrada.
                                        </div>
                                </div>
                            </div>
                            <div class="col-7 l-flex">
                                    <div class="container  justify-content-center left-self-center">
                                        {{--<img src="{{URL::asset('assets/template/images/estudiologo.png')}}" alt="" width="" class="card-img">--}}
                                        <img src="{{URL::asset('assets/template/images/404/es404cl.JPG')}}" alt="" width="100%" class="mx-auto d-block">
                                    </div>
                            </div>
                    
                    </div>
                    {{--termina la parte de porque estudio 404--}}
                    {{--empieza la parte de mision y vision--}}
                     <div class="row no-gutters" style="margin-bottom:20px">
                        <div class="col-6">
                            <h3 class="card-title text-primary justify-content-center" style="margin-top:50px;padding:15px;font-size:1.7em;text-align:center">Misión</h3>
                            <div class="conteiner">
                                    <div class="card-body">
                                            Brindamos soluciones mediante la creación de software de calidad y el uso de nuevas tecnologías, reduciendo la brecha digital del usuario.
                                    </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <h3 class="card-title text-primary justify-content-center" style="margin-top:50px;padding:15px;font-size:1.7em;text-align:center">Visión</h3>
                            <div class="conteiner">
                                    <div class="card-body">
                                            Generar impacto social mediante el desarrollo de tecnologías innovadoras y asequibles.
                                    </div>
                            </div>
                        </div>
                    </div>
                    {{--termimna la parte de mision y vision--}}
                </div>
                {{--Termina version web--}}
                {{--empiea la parte movil--}}
                <div class="visible2">
                    <div style="margin:10%">
                        <div class="row justify-content-center">
                                <div class="container  justify-content-center align-self-center">
                                        <img src="{{URL::asset('assets/template/images/estudiologo.png')}}" alt="" width="" class="card-img">
                                </div>
                        </div>
                        <div class="row justify-content-center">
                                <div class="conteiner">
                                        <div class="card-body">
                                            Somos un equipo de trabajo formado en la Facultad de Ciencias de la Computación de la Benemérita Universidad Autónoma de Puebla comprometidos con la sociedad, en la búsqueda y construcción de soluciones a través del software.
                                        </div>
                                    <div class="footer1" style="margin:10px;position:relative;bottom:5px;right:10px; ">
                                        <div class="card-footer justify-content-center">
                                            <a class="card-link" href="">Facebook</a>
                                            <a class="card-link" href="">Twitter</a>
                                            <a class="card-link" href="">Instagram</a>
                                        </div>
                                        <div class="card-footer justify-content-center">
                                            <a class="card-link">Correo: estudio404_@outlook.com</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <h3 class="card-title text-primary" style="margin-top:50px;padding:15px;font-size:1.7em;">¿Por qué estudio404_?</h3>
                        <div class="row no-gutters" style="margin-bottom:10px">
                                <div class="container  justify-content-center left-self-center">
                                        {{--<img src="{{URL::asset('assets/template/images/estudiologo.png')}}" alt="" width="" class="card-img">--}}
                                        <img src="{{URL::asset('assets/template/images/404/es404cl.JPG')}}" alt="" width="100%" class="mx-auto d-block">
                                </div>
                        </div>
                        <div class="row no-gutters" style="margin-bottom:10px">
                                <div class="conteiner">
                                        <div class="card-body">
                                            El nombre surgió por que nuestras primeras juntas como grupo eran en el salón 404 del edificio 4 de la Facultad de 
                                            Computación de la BUAP. Un dato curioso con ese número es que esta asociado a un error conocido dentro del desarrollo 
                                            WEB, el >>Error 404<< que se genera cuando una página de internet no es encontrada.
                                        </div>
                                </div>
                        </div>
                        <h3 class="card-title text-primary justify-content-center" style="margin-top:50px;padding:15px;font-size:1.7em;text-align:center">Misión</h3>
                        <div class="row no-gutters" style="margin-bottom:10px">
                                <div class="card-body">
                                    Brindamos soluciones mediante la creación de software de calidad y el uso de nuevas tecnologías, reduciendo la brecha digital del usuario.
                                </div>
                        </div>
                        <h3 class="card-title text-primary justify-content-center" style="margin-top:50px;padding:15px;font-size:1.7em;text-align:center">Visión</h3>
                        <div class="row no-gutters" style="margin-bottom:10px">
                                <div class="card-body">
                                    Generar impacto social mediante el desarrollo de tecnologías innovadoras y asequibles.
                                </div>
                        </div>
                    </div>
                </div>
                {{--termina la parte movil--}}
                <h3 class="card-title text-primary margen2" style="padding:15px;font-size:1.7em;">Integrantes del equipo</h3>
                <div class="row justify-content-center" style="margin:10px">
                {{----}}
                    <div class="col-md-4">
                        <div class="main-card mb-3 card"style="border-style: hidden;">
                            <div class="card-body">
                                <h5 class="card-title">Gallegos Ruiz Jaime Ángel</h5>
                            </div>
                            <div class="container">
                                <img src="{{URL::asset('assets/template/images/404/jamyos.JPG')}}" alt="" width="60%" class="mx-auto d-block rounded-circle">
                            </div>
                            <div class="card-footer justify-content-center">
                                {{--<a class="card-link" href="">Facebook</a>--}}
                                <a class="card-link" href="https://twitter.com/Jamy_yomiOS">Twitter</a>
                                {{--<a class="card-link" href="">Instagram</a>--}}
                            </div>
                        </div>
                    </div>
                {{----}}
                    <div class="col-md-4">
                            <div class="main-card mb-3 card"style="border-style: hidden;">
                                <img src="" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">Gómez Rico Ulises Adrián</h5>
                                </div>
                                <div class="container">
                                    <img src="{{URL::asset('assets/template/images/404/adrianerx.JPG')}}" alt="" width="60%" class="mx-auto d-block rounded-circle">
                                </div>
                                <div class="card-footer justify-content-center">
                                    <a class="card-link" href="https://www.facebook.com/adriianerx">Facebook</a>
                                    <a class="card-link" href="https://twitter.com/AdRiANerX">Twitter</a>
                                </div>
                            </div>
                        </div>
                {{----}}
                    <div class="col-md-4">
                        <div class="main-card mb-3 card"style="border-style: hidden;">
                            <img src="" alt="">
                            <div class="card-body">
                                <h5 class="card-title">López Cadena Ángel Isidro</h5>
                            </div>
                            <div class="container">
                                <img src="{{URL::asset('assets/template/images/404/ahhhel.JPG')}}" alt="" width="60%" class="mx-auto d-block rounded-circle">
                            </div>
                            <div class="card-footer justify-content-center">
                                <a class="card-link" href="https://www.facebook.com/pezcadena">Facebook</a>
                                <a class="card-link" href="https://twitter.com/pezcadena">Twitter</a>
                                <a class="card-link" href="https://www.instagram.com/pezcadena/">Instagram</a>
                            </div>
                        </div>
                    </div>
                {{----}}
                </div>
                {{--/////// termina button--}}
                <div class="row justify-content-left" style="margin:10px">
                {{----}}
                        <div class="col-md-4">
                                <div class="main-card mb-3 card" style="border-style: hidden;">
                                    <img src="" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">Arce Arce Melisa</h5>
                                    </div>
                                    <div class="container">
                                        <img src="{{URL::asset('assets/template/images/404/meli.JPG')}}" alt="" width="60%" class="mx-auto d-block rounded-circle">
                                    </div>
                                    <div class="card-footer justify-content-center" >
                                        <a class="card-link" href="https://www.facebook.com/MelkoArce">Facebook</a>
                                        <a class="card-link" href="https://twitter.com/Melisa_a2">Twitter</a>
                                        <a class="card-link" href="https://www.instagram.com/melisa_arce.a/">Instagram</a>
                                    </div>
                                </div>
                        </div>
                {{----}}
                        <div class="col-md-4">
                            <div class="main-card mb-3 card" style="border-style: hidden;">
                                <img src="" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">Díaz Hernández Andrés Alejandro</h5>
                                </div>
                                <div class="container">
                                    <img src="{{URL::asset('assets/template/images/404/sxrdnx.JPG')}}" alt="" width="60%" class="mx-auto d-block rounded-circle">
                                </div>
                                <div class="card-footer justify-content-center ">
                                    <a class="card-link"  href="https://twitter.com/Mrknife21">Twitter</a>
                                    <a class="card-link"  href="https://www.instagram.com/elandy_alv/">Instagram</a>
                                </div>
                            </div>
                        </div>
                {{----}}
                </div>
                {{--termina la segunda parte--}}
            </div>
        </div>
        </div>
    </div>
    


@endsection