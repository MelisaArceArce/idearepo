<div class="ui-theme-settings" >  
                <div class="theme-settings__inner">
                    <div class="scrollbar-container">
                        <div class="theme-settings__options-wrapper">
                            <h3 class="themeoptions-heading fixed-top">
                                <div>
                                    Más Información
                                </div>
                                <button type="button" class="btn btn btn-primary btn-open-options ml-auto" id="cerrar">
                                    Cerrar
                                </button>
                            </h3>
                            {{-- Esta parte esta repetida para que el menu de arriba pueda quedar fijo --}}
                                <h3 class="themeoptions-heading">
                                    <div>
                                        Más Información
                                    </div>
                                    <button type="button" class="btn btn btn-primary btn-open-options ml-auto" id="cerrar">
                                        Cerrar
                                    </button>
                                </h3>
                            {{--  --}}
                            <h4 class="themeoptions-heading">Descripción Completa</h4>
                            <textarea class="form-control" id="descripcion_completa"  readonly></textarea>
                            <h3 class="themeoptions-heading">Vacantes totales: &nbsp;&nbsp;&nbsp; <apan id="numero_vacantes">  </apan></h3>
                            <h3 class="themeoptions-heading">Puestos</h3>
                            <div class="p-3" id="puestos"></div>
                        </div>
                    </div>
                </div>
</div>

<style>
        @media screen  and (max-width:420px) {
        
            .ui-theme-settings {
                
                display: normal;
            }
            .pc{
                display:none;
            }
            .ui-theme-settings.settings-open {
                width:101%;

            }
            .scrollbar-container{
                width:101%;
            }
            .ui-theme-settings .theme-settings__inner {
            width: 100%;
            }
            
        }

        @media screen  and (min-width:420px){
            .visible-xs-btn{
                display: none;
            }
            .ui-theme-settings {
                
                display: normal;
            }
            .device{
                display: none;
            }
        
        }  
}
</style>