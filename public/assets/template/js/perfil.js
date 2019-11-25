$(document).ready(function() {
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('#delRegExp').data('token') }
    });

    $("#btnExp").off("click").addClass("disabled");
    $("#btnIdiom").off("click").addClass("disabled");  
    $("#btnHerra").off("click").addClass("disabled");  

    $("#delRegExp").off("click").addClass("disabled");  
    $("#delRegIdiom").off("click").addClass("disabled");  
    $("#delRegHerra").off("click").addClass("disabled"); 

    $("#btnCancelarPerso").off("click").addClass("disabled");  
    $("#btnCancelarProfe").off("click").addClass("disabled");   

    $("#btnEditaPerso").on("click",function(){

        $("#telefono").prop('disabled',false);
        $("#wa").prop('disabled',false);
        $("#tlgram").prop('disabled',false);
        $("#tw").prop('disabled',false);
        $("#fb").prop('disabled',false);
        $("#insta").prop('disabled',false);

        if($("#fechaNacimiento").attr('value') === "vacio"){
            $("#fechaNacimiento").prop('disabled',false);
        }

        $(this).addClass("disabled");

        $("#btnGuadarPerso").prop('disabled',false);

        $("#btnCancelarPerso").on("click",function(){

            window.location.reload(true); 

        }).removeClass("disabled");

    });

    $("#btnEditaProfe").on("click",function(){

        $("#auto_Descripcion").prop('disabled',false);
        $("#btnGuadarProfe").prop('disabled',false);
        $(this).addClass("disabled");    

        var contaExp = $("#experienciasval").val();

        if(contaExp === undefined){
            contaExp = 0;
        }else{
            contaExp++;    
            $(".expdel").each(function(){
                $(this).prop('disabled',false);
            })
        }

        $("#btnExp").on("click",function(){

            var newExp = $("<div class='experiencia'><input type='checkbox' class='expdel' data-idexp='null'></input>"+
                            "<li class='nav-item-header nav-item'>Lugar (Area o Empresa):</li>"+
                            "<input id='nombre_Emp' name='experiencias[exp"+contaExp+"][nombre_Emp]' type='text' class='form-control border-primary' required>"+
                            "<li class='nav-item-header nav-item'>Puesto de experiencia:</li>"+
                            "<input id='puesto' name='experiencias[exp"+contaExp+"][puesto]' type='text' class='form-control border-primary' required>"+
                            "<li class='nav-item-header nav-item'>Fecha que inicio:</li>"+
                            "<input type='date' class='form-control border-primary' id='fecha_Ini' name='experiencias[exp"+contaExp+"][fecha_Ini]'>"+
                            "<li class='nav-item-header nav-item'>Fecha que termino:</li>"+
                            "<input type='date' class='form-control border-primary' id='fecha_Fin' name='experiencias[exp"+contaExp+"][fecha_Fin]'>"+
                            "<li class='divider'></li>"+
                            "</div>");
            $("#Experiencia").append(newExp);
            contaExp++;
        }).removeClass("disabled");

        var contaIdiom = $("#idiomasval").val();

        if(contaIdiom === undefined){
            contaIdiom = 0;
        }else{
            contaIdiom++;
            $(".idiomdel").each(function(){
                $(this).prop('disabled',false);
            })
        }


        $("#btnIdiom").on("click",function(){
            var newIdiom = $(" "+
                            "<div class='idioma'><input type='checkbox' class='idiomdel' data-ididiom='null'>"+
                                "<li class='nav-item-header nav-item'>Idioma:</li>"+
                                "<select id='idioma' name='idioma[idiom"+contaIdiom+"][idioma]' class='idiomaselec form-control border-primary'>"+
                                    "<option>Ingles</option>"+
                                    "<option>Frances</option>"+
                                    "<option>Italiano</option>"+
                                    "<option>Portugues</option>"+
                                    "<option>Aleman</option>"+
                                    "<option>Ruso</option>"+
                                    "<option>Japones</option>"+
                                    "<option>Mandarin</option>"+
                                "</select>"+
                                "<li class='nav-item-header nav-item'>Nivel:</li>"+
                                "<select name='idioma[idiom"+contaIdiom+"][lvl_idioma]' id='lvl_idioma' class='form-control border-primary'>"+
                                    "<option>Basico</option>"+
                                    "<option>Intermedio</option>"+
                                    "<option>Avanzado</option>"+
                                "</select>"+
                                "<li class='divider'></li>"+
                            "</div>");
            $("#Idioma").append(newIdiom);
            contaIdiom++;
            if(contaIdiom >= 9){
                $("#btnIdiom").off("click").addClass("disabled"); 
            }
        }).removeClass("disabled");

        var contaHerra = $("#herramientasval").val();

        if(contaHerra === undefined){
            contaHerra = 0;
        }else{
            contaHerra++;
            $(".herradel").each(function(){
                $(this).prop('disabled',false);
            })
        }

        $("#btnHerra").on("click",function(){

            var newIdiom = $(" "+
                        "<div class='herramientas'><input type='checkbox' class='herradel' data-idherra='null'>"+
                            "<li class='nav-item-header nav-item'>Herramienta:</li>"+
                            "<input name='herramienta[herra"+contaHerra+"][herramienta]' id='herramienta' type='text' class='form-control border-primary' required>"+
                            "<li class='nav-item-header nav-item'>Nivel:</li>"+
                            "<select name='herramienta[herra"+contaHerra+"][lvl_cono]' id='lvl_cono' type='text' class='form-control border-primary'>"+
                                    "<option>Basico</option>"+
                                    "<option>Intermedio</option>"+
                                    "<option>Avanzado</option>"+
                            "</select>"+
                            "<li class='divider'></li>"+
                        "</div>");
            $("#Herramienta").append(newIdiom);
            contaHerra++;
        }).removeClass("disabled");

        var id = [];
        $("#delRegExp").on("click",function(){
            var i = 0;
            $(".expdel:checked").each(function(){

                if(confirm("¿Desea eliminar el/los elemento(s) seleccionado(s)?")){

                    if(($(this).data('idexp')) != null){

                        id.push($(this).data('idexp'));
                        $.ajax(
                            {
                                url: "http://idea.test/elimina/experiencia/" + id[i],
                                type: "POST",
                                /* contentType:"json",
                                processData: false, */
                                data: {
                                    'id' : id[i]
                                }/*
                                //ESTO ES PARA DEPURAR EL CODIGO
                                statusCode: {
                                    404: function() {
                                        alert( "page not found" );
                                    }
                                },
                                success: function (){
                                    alert('todo bien');
                                },
                                error: function(){
                                    alert('Error');
                                }*/
                            }
                        );
    
                    }
                    
                var curReg = $(this).parent('.experiencia');
                curReg.remove();
                i++;


                }else{
                    return false
                }
                
            });
        }).removeClass("disabled");

        $("#delRegIdiom").on("click",function(){
            var i = 0;
            $(".idiomdel:checked").each(function(){

                if(confirm("¿Desea eliminar el/los elemento(s) seleccionado(s)?")){

                    if(($(this).data('ididiom')) != null){

                        id.push($(this).data('ididiom'));
                        $.ajax(
                            {
                                url: "http://idea.test/elimina/idioma/" + id[i],
                                type: "POST",
                                /* contentType: "json",
                                processData: false, */
                                data: {
                                    'id' : id[i],
                                }/* ,
                                //ESTO ES PARA DEPURAR EL CODIGO
                                statusCode: {
                                    404: function() {
                                        alert( "page not found" );
                                    }
                                },
                                success: function (){
                                    alert('todo bien');
                                    console.log();
                                },
                                error: function(){
                                    alert('Error');
                                } */
                            }
                        );
    
                    }        
    
                var curReg = $(this).parent('.idioma');
                curReg.remove();
                i++;

                }else{
                    return false
                }

            });
        }).removeClass("disabled");

        $("#delRegHerra").on("click",function(){
            var i = 0;
            $(".herradel:checked").each(function(){

                if(confirm("¿Desea eliminar el/los elemento(s) seleccionado(s)?")){

                    if(($(this).data('idherra')) != null){

                        id.push($(this).data('idherra'));
                        $.ajax(
                            {
                                url: "http://idea.test/elimina/herramientas/"+ id[i],
                                type: "POST",
                                /* contentType: "json",
                                processData: false, */
                                data: {
                                    'id' : id[i],
                                }/* ,
                                //ESTO ES PARA DEPURAR EL CODIGO
                                statusCode: {
                                    404: function() {
                                        alert( "page not found" );
                                    }
                                },
                                success: function (){
                                    alert('todo bien');
                                },
                                error: function(){
                                    alert('Error');
                                } */
                            }
                        );
                    }
        
                var curReg = $(this).parent('.herramientas');
                curReg.remove();
                i++;

                }else{
                    return false
                }

            });
        }).removeClass("disabled");

        var checaLic = $("#licenciatura").attr('data-valueLic');

        if(checaLic === "vacio"){
           
            $("#licenciatura").prop('disabled',false);

        } 
 
        if(($("#AREA").val())==="Área de Cs. Naturales y de Salud"){

            var lic = $(" "+
                            "<option>Licenciatura en Biologia</option>"+
                            "<option>Licenciatura en Biomedicina</option>"+
                            "<option>Licenciatura en Biotecnología</option>"+
                            "<option>Licenciatura en Ciencia Forense</option>"+
                            "<option>Licenciatura en Enfermeria</option>"+
                            "<option>Licenciatura en Estomatologia</option>"+
                            "<option>Licenciatura en Farmacia</option>"+
                            "<option>Licenciatura en Fisioterapia</option>"+
                            "<option>Ingenieria Agrohidraulica</option>"+
                            "<option>Ingenieria Agronomica y Zootecnia</option>"+
                            "<option>Licenciatura en Medicina</option>"+
                            "<option>Licenciatura en Medicina General y Comunitaria</option>"+
                            "<option>Licenciatura en Medicina Veterinaria y Zootecnia</option>"+
                            "<option>Licenciatura en Nutricion Clinica</option>"+
                            "<option>Profesional Asociado en Imagenologia</option>"+
                            "<option>Profesional Asociado en Urgencias Medicas</option>"+
                            "<option>Licenciatura en Quimica</option>"+
                            "<option>Licenciatura en Quimico Farmacobiologo</option>"+
                            "<option>Ingenieria Agroforestal</option>"
                        );
            $("#licenciatura").append(lic);
        
        }else if(($("#AREA").val())==="Área de Económico-Administrativas"){

            var lic = $(" "+
                            "<option>Licenciatura en Administracion de Empresas</option>"+
                            "<option>Licenciatura en Administracion Publica y Gestion para el Desarrollo</option>"+
                            "<option>Licenciatura en Administracion Turistica</option>"+
                            "<option>Licenciatura en Administracion y Direccion de Pequeñas y Medianas Empresas</option>"+
                            "<option>Licenciatura en Comercio Internacional</option>"+
                            "<option>Licenciatura en Contaduria Publica</option>"+
                            "<option>Licenciatura en Direccion Financiera</option>"+
                            "<option>Licenciatura en Economia</option>"+
                            "<option>Licenciatura en Finanzas</option>"+
                            "<option>Licenciatura en Gastronomia</option>"+
                            "<option>Licenciatura en Mercadotecnia y Medios Digitales</option>"+
                            "<option>Licenciatura en Negocios Internacionales</option>"+
                            "<option>Licenciatura en Gestion Territorial e Identidad Biocultural</option>"
                        );
            $("#licenciatura").append(lic);

        }else if(($("#AREA").val())==="Área de Ingenierías y Ciencias Exactas"){
            
            var lic = $(" "+
                            "<option>Licenciatura en Actuaria</option>"+
                            "<option>Licenciatura en Arquitectura</option>"+
                            "<option>Licenciatura en Ciencias de la Computacion</option>"+
                            "<option>Licenciatura en Diseño Grafico</option>"+
                            "<option>Licenciatura en Ciencias de la Electronica</option>"+
                            "<option>Licenciatura en Fisica</option>"+
                            "<option>Licenciatura en Fisica Aplicada</option>"+
                            "<option>Licenciatura en Gestion de Ciudades Inteligentes y Transiciones Tecnologicas</option>"+
                            "<option>Ingenieria Ambiental</option>"+
                            "<option>Ingenieria Civil</option>"+
                            "<option>Ingenieria en Alimentos</option>"+
                            "<option>Ingenieria en Ciencias de la Computacion</option>"+
                            "<option>Ingenieria en Energias Renovables</option>"+
                            "<option>Ingenieria en Materiales</option>"+
                            "<option>Ingenieria en Mecatronica</option>"+
                            "<option>Ingenieria en Sistemas Automotrices</option>"+
                            "<option>Ingenieria en Tecnologias de la Informacion</option>"+
                            "<option>Ingenieria Geofisica</option>"+
                            "<option>Ingenieria Industrial</option>"+
                            "<option>Ingenieria Mecanica y Electrica</option>"+
                            "<option>Ingenieria Quimica</option>"+
                            "<option>Ingenieria Textil</option>"+
                            "<option>Ingenieria Topografica y Geodesica</option>"+
                            "<option>Licenciatura en Matematicas</option>"+
                            "<option>Licenciatura en Matematicas Aplicadas</option>"+
                            "<option>Licenciatura en Urbanismo y Diseño Ambiental</option>"+
                            "<option>Ingenieria Agroindustrial</option>"+
                            "<option>Ingenieria en Procesos y Gestion Industrial</option>"+
                            "<option>Ingenieria en Automatizacion y Autotronica</option>"+
                            "<option>Ingenieria en Sistemas y Tecnologias de Informacion Industrial</option>"+
                            "<option>Tecnico Superior en Innovacion del Mantenimiento Industrial</option>"
                        );
            $("#licenciatura").append(lic);

        }else if(($("#AREA").val())==="Área de Ciencias Sociales y Humanidades"){

            var lic = $(" "+
                            "<option>Licenciatura en Antropologia Social</option>"+
                            "<option>Licenciatura en Arte Digital</option>"+
                            "<option>Licenciatura en Arte Dramatico</option>"+
                            "<option>Licenciatura en Artes Plasticas</option>"+
                            "<option>Licenciatura en Ciencias Politicas</option>"+
                            "<option>Licenciatura en Cinematografia</option>"+
                            "<option>Licenciatura en Comunicacion</option>"+
                            "<option>Licenciatura en Consultoria Juridica</option>"+
                            "<option>Licenciatura en Criminologia</option>"+
                            "<option>Licenciatura en Cultura Fisica</option>"+
                            "<option>Licenciatura en Danza</option>"+
                            "<option>Licenciatura en Derecho</option>"+
                            "<option>Licenciatura en la Enseñanza del Frances</option>"+
                            "<option>Licenciatura en la Enseñanza del Ingles</option>"+
                            "<option>Licenciatura en Etnocoreologia</option>"+
                            "<option>Licenciatura en Filosofia</option>"+
                            "<option>Licenciatura en Historia</option>"+
                            "<option>Licenciatura en Lingüistica y Literatura Hispanica</option>"+
                            "<option>Licenciatura en Musica</option>"+
                            "<option>Licenciatura en Procesos Educativos</option>"+
                            "<option>Licenciatura en Psicologia</option>"+
                            "<option>Licenciatura en Readaptacion y Activacion Fisica</option>"+
                            "<option>Licenciatura en Relaciones Internacionales</option>"+
                            "<option>Licenciatura en Sociologia</option>"
                        );
            $("#licenciatura").append(lic);

        } 

        $("#btnCancelarProfe").on("click",function(){

            window.location.reload(true); 

        }).removeClass("disabled");   

        $(".habilidadestab").each(function(){
            $(this).prop('disabled',false);
        }

    )});  

    $(".notificacion").on("click",function(){
        $numero = $(this).attr('id');
        $("#enviar_noti_"+$numero).submit();

    });
});

function celular(){
    var x = document.forms["datosPersonales"]["telefono"].value;
    
    if (isNaN(x)){
        alert("Solo se aceptan numeros");
        document.datosPersonales.telefono.focus();
        return false;
    }

    if (((x.length) >= 1) && ((x.length) < 10)){
        alert("Porfavor revise su numero");
        document.datosPersonales.telefono.focus();
        return false;
    }else if(((x.length) > 10)){
        alert("Porfavor revise su numero");
        document.datosPersonales.telefono.focus();
        return false;

    }

}

function idiomas(){ 

    var flag = 0;
    var inputArray = [];
    $(".idiomaselec").each(function(){
        var o = $(this);
        var oValue = o.val();
        inputArray.push(oValue);

        var compara = inputArray[(inputArray.length-1)];
    
        for(var i=0; i<(inputArray.length-1) ;i++){
            if(compara===inputArray[i]){
                console.log("Son iguales", i,compara);
                $(this).focus();
                flag = 1;
                break;
            }else{
                console.log("no son iguales", i);
                flag = 0;
            }    
        }
        
    });

    if(flag===1){
        alert("No puede tener el mismo idioma"); 
        return false;
    }
    //alert(inputArray); 
    
    //para pruebas para campos select
    /*var inputArray = [];
    $(".idiomaselec").each(function(){
        var o = $(this);
        var oValue = o.val();
        inputArray.push(oValue);
    });
    alert(inputArray);*/

    //para pruebas para campos no select
    //var inputArray = [];
    /*$(".idioma").each(function(){
        var o = $(this);
        var oType;
        if(o.is("input")){ 
            oType = "input"; 
        }
            var oID = oType+o.attr("id");
            var oValue = o.val();
            inputArray.push(oID+'='+oValue);
        });
    alert(inputArray);*/
    
}
