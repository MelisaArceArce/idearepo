@extends("template.layout")

@section('contenido')
<div class="col-md-6">
    <div class="main-card mb-3 card">
            <div class="justify-content-center">
                    <div>
                            <h5 class="card-title text-center" ></h5>
                            <h5 class="card-title text-center">BENEMERITA UNIVERSIDAD AUTONOMA DE PUEBLA</h5>
                            <h5 class="card-title text-center" >"FERIA DE PROYECTOS"</h5>
                            <h5 class="card-title text-center">2019</h5>
                    </div>
            </div>                     
        <div class="divider bg-primary"></div>
        
        <div class="card-body">
            <div class="tab-content">
                <img class="d-block img-fluid" src="http://idea.test/assets/template/images/facultades/fepro.jpg">
            </div>
        </div>
        <div class="card-footer">
            <ul class="nav flex-row">
                <h5 class="card-title">Días: 12 y 13 de Septiembre</h5>
                <h5 class="card-title">Lugar: Centro de Convenciones CU BUAP</h5>
                <h5 class="card-title">Convocatoria: Abierta (a todo público universitario)</h5>
            </ul>
        </div>
        <div class="card-footer justify-content-center">
            <a class="card-link" href="http://www.fepro.org/">Enlace</a>
        </div>
    </div>
</div>

@endsection