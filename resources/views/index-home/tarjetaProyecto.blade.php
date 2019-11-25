<div class="col-md-12">
    <div class="main-card mb-3 card" style="max-width:100%;">
        <div class="card-body">
            <div class="row">
                <div class="col-9 mb-2">                        
                    <h2 class="text-primary">{{$proyecto->nombre_Proy}}</h2>
                    <h5 class="card-title">{{$proyecto->area_Enfocada}}</h5>
                    <h5 class="card-title">{{$proyecto->estado}}</h5>
                </div>    
                <div class="col position-relative form-group">
                    <p class="float-right font-weight-bold text-secondary"> Creación: {{\Carbon\Carbon::parse($proyecto->created_at)->format('d/m/Y')}}</p>
                    <p class="float-right font-weight-bold text-secondary">Inicio: {{\Carbon\Carbon::parse($proyecto->fecha_Inicio)->format('d/m/Y')}}</p>
                </div>
                <div class="divider bg-primary"></div>
            </div>  
            <div class="texto">
                {{$proyecto->descrip_Breve}}      
            </div>
            <div class="divider"></div>
            <div class="card-body">
                <div class="hidden-xs-btn">
                        <form action="{{ route('detalles_proyecto','') }}" id="form-ajax">
                            <button type="button"  class="btn-open-options d-inline p-2 btn btn-primary float-left btn-sm" name="" id="{{ $proyecto->id }}">
                                Más Información
                            </button>
                        </form>
                </div>
                <div class="visible-xs-btn">
                        <form action="{{ route('detalles_proyecto','') }}" id="form-ajax">
                            <button type="button"  class="btn-open-options d-inline p-2 btn btn-primary float-left btn-sm" name="" id="{{ $proyecto->id }}">
                                <i class="fa fa-plus"></i>
                            </button>
                        </form> 
                </div>
                   {{-- Boton me interesa se agregara despues - Adrian Rico 
                    <div class="hidden-xs-btn" >
                        <button class="d-inline p-2 btn btn-primary float-right btn-sm">
                            Me interesa <i class="fa fa-heart"></i>
                        </button> 
                   </div> --}}
                   <div class="visible-xs-btn" >
                        <button class="d-inline p-2 btn btn-primary float-right btn-sm">
                             <i class="fa fa-heart"></i>
                        </button>  
                   </div>
            </div>
        </div>         
    </div>
</div>

<style>
    @media screen  and (max-width:400px) {
    .hidden-xs-btn {
    display: none;
    }
    }
    @media screen  and (min-width:400px){
    .visible-xs-btn{
        display: none;
    }
    }
</style>