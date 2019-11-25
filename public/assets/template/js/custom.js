// Example starter JavaScript for disabling form submissions if there are invalid fields
//Funcion que valida los formularios en verde y rojo con textos abajo de los imputs
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

//Funcion que agrega y elimina un nuevo puesto en la parte de crear nuevo proyecto
$(document).ready(function(){
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('#removerPuesto').data('token') }
    });

    var contador = $("#puestosval").val();

    $('#nuevoPuesto').click(function(event){

        if(contador === undefined){
            contador = 1; 
        }

        $('.row-unico').append(
        '<div class="col-md-6" id="remover-'+ contador +'">'+
        '<div class="main-card mb-3 card">'+
                '<div class="card-body">'+
                    '<div class="tab-content">'+
                        '<div class="tab-pane active" id="tab_usuario1_nueva" role="tabpanel">'+
                            
                                '<input type="hidden" class="form-control" name="puestos[puesto-'+ contador +'][id]" required>'+
                                '<div class="form-row">'+
                                    '<div class="col-md-12 mb-3">'+
                                        '<label for="tipoPuesto">Nombre del puesto:</label>'+
                                        '<input type="text" class="form-control" name="puestos[puesto-'+ contador +'][tipo_Puesto]" id="tipoPuesto" placeholder="Ingresa el nombre aqui..." maxlength="75" value="" required>'+
                                        '<div class="invalid-feedback">'+
                                            'Por favor ingresa el nombre.'+
                                       ' </div>'+
                                        '<div class="valid-feedback">'+
                                            'Excelente!'+
                                        '</div>'+
                                    '</div>'+
                                    '<div class="col-md-12 mb-3">'+
                                        '<label for="habCono">Habilidades y conocimientos requeridos:</label>'+
                                        '<textarea type="text" class="form-control" name="puestos[puesto-'+ contador +'][hab_Cono]" id="habCono" placeholder="Escribe aquí..." value="" required></textarea>'+
                                        '<div class="invalid-feedback">'+
                                            'Por favor ingresa habilidades y conocimientos.'+
                                        '</div>'+
                                        '<div class="valid-feedback">'+
                                            'Excelente!'+
                                        '</div>'+                 
                                    '</div>'+
                                    '<div class="col-md-12 mb-3">'+
                                        '<label for="vacantes" class="">Número de vacantes:</label>'+
                                        '<input name="puestos[puesto-'+ contador +'][vacantes]" id="vacantes" value="1" min="1" type="number" class="form-control">'+
                                        '<div class="invalid-feedback">'+
                                            'Ingresa un número valido.'+
                                        '</div>'+
                                        '<div class="valid-feedback">'+
                                            'Excelente!'+
                                        '</div>'+           
                                    '</div>'+
                                    '<div class="col-md-12 mb-3">'+
                                        '<label for="areaPuesto" class="">Area a la que está enfocada el puesto:</label>'+
                                            '<select name="puestos[puesto-'+ contador +'][area_Puesto]" id="areaPuesto" class="form-control">'+
                                                '<option>Todas la áreas</option>'+
                                                '<option>Área de Ciencias Naturales y de Salud</option>'+
                                                '<option>Área de Ciencias Sociales y Humanidades</option>'+
                                                '<option>Área de Económico-Administrativas</option>'+
                                                '<option>Área de Ingenierías y Ciencias Exactas </option>'+
                                            '</select>'+
                                        '<div class="invalid-feedback">'+
                                            'Por favor ingresa el nombre.'+
                                        '</div>'+
                                        '<div class="valid-feedback">'+
                                            'Excelente!'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+        
                                           
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>'+
        '</div>'
       );
       contador++;
    });

    $('#removerPuesto').click(function(event){

        console.log("voy a eliminar el puesto:", contador);
        var id = $('#idPuesto'+(contador)).val();
        console.log("con el id", id);
        
        if(confirm("¿Desea eliminar el elemento?")){

                $.ajax(
                    {
                        url: "http://idea.test/administra/elimina/puesto/" + id,
                        type: "POST",
                        contentType: "json",
                        processData: false, 
                        data: {
                            'id' : id
                        },
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
                        }
                    }
                );

                
                $('#remover-'+(contador)).remove();
                contador--;  

        }else{
            return false
        }

        /*//var claseRemover = $('.remover').attr('id')
        contador--     
        //alert('#remover-'+ (contador))
         $( '#remover-'+ (contador)).remove();
        //.attr("id")
        //$("div").remove("#remover-"+contador--);
        //*/
        
    });

    
});





//Funcion que envia datos al menu lateral para mostrar detalles de los proyectos
$(document).ready(function(){

    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('#crearInteresado').data('token') }
    });
    
    $('.btn-open-options').click(function(event){
        //Activamos el overlay para oscurecer la parte de los proyectos
        $('.overlay').addClass('active');

    /*    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });*/

        //Obtenemos el id del boton    
        $id_obtenido = $(this).attr('id');
        
        //Este if es para evitar que el boton cerrar ejecute la peticion ajax al servidor
        //y solo cierre la vista lateral
        if($id_obtenido != 'cerrar'){
            
            //Creamos el httpRequest dependiendo del navegador
            var httpRequest = false;
            if(window.XMLHttpRequest){
                httpRequest = new XMLHttpRequest(); //Todos los navegadores modernos
            }else{
                httpRequest = new ActiveXObject("Microsoft.XMLHTTP"); //Internet Explorer
            }
            if (httpRequest == false){
                return false; // no se puedo crear el objeto
            }
            //obtenemos la url
            var url = document.getElementById('form-ajax').action;
            
            //ejecutamos la peticion que llega al serivor y lo procesa la ruta de laravel
            //sobre_nosotros   en  HomeController@show
            httpRequest.open('GET', url + '/' + $id_obtenido, true);
            httpRequest.send();
            
            httpRequest.onreadystatechange = function() {
                if (httpRequest.readyState == 4 && httpRequest.status == 200) {
                    // la peticion la recibio el servidor y el servidor retorno un codigo 200 (OK)   
                    
                    //Convertimos el json a arreglos en javascript
                    var content = JSON.parse(httpRequest.responseText);

                    //Enviamos los datos mediante la funcion .html de jquery
                    $("#descripcion_completa").html(content.descrip_com);
                    //Usamos la funcion autosize para que el textarea se ajuste al tamaño del texto
                    //https://www.jacklmoore.com/autosize/
                    autosize($('#descripcion_completa'));
                    $("#numero_vacantes").html(content.numeroVacantes);
                    
                    //Creamos un nuevo objeto que contiene los puestos
                    var puestos = content.puestos;
                    
                     
                    //Este es un For…In se usa para recorrer objetos
                    //https://codeburst.io/javascript-the-difference-between-foreach-and-for-in-992db038e4c2
                      for (let elem in puestos) {  
                        //console.log( puestos[elem].id ) ,"+ $puestos[elem].id+"
                        //" <input type='hidden' name='_token' value= '.csrf_token().' >"+
                        // '<form method="POST" action="/proyectos/crearI/{'+puestos[elem].id+ '}">' +
                        $("#puestos").append(
                            '<form method="GET"  action="/puestos/'+puestos[elem].id+'">' +
                            '<input type="hidden" name="_token" value="{{ csrf_toke() }}" id="toke"> '+
                            "<div class='card-header text-primary'>"+ puestos[elem].tipo_Puesto +"</div>" +
                            '<div class="mb-3 card card-body">' +
                            '<h5 class="card-title">'+  puestos[elem].area_Puesto +'</h5>' +
                            '<p>'+ puestos[elem].hab_Cono +'</p>' +
                            '<p>Vacantes:'+ puestos[elem].vacantes +'</p>'  +
                            '<button  class="btn btn-primary" id="crearInteresado" >¡Postularme!</button>' + 
                            '</div>' +
                            '</form>'+
                            '<hr></hr>' 
                        );
                    }
                    //onclick="accion('+ puestos[elem].id +')"
                }
            };
            //funcion que hace cuando das click a postular
          /*   $('.postular').click(function(){
                console.log($eve, $id_obtenido);
                });*/
        }else{
            //cerramos la ventana lateral y quitamos la clase overlay y el contenido de los pues
            //lo dejamos en blanco
            $('.overlay').removeClass('active');
            $("#puestos").html('');
            $("#descripcion_completa").html('...');
            autosize.destroy(  $('#descripcion_completa') );
        }
        
    });

    //funcion overlay para cerrar la ventana lateral y quitar el div que oscurece
    $('.overlay').on('click', function () {
        $('.overlay').removeClass('active');
        $('.ui-theme-settings').removeClass('settings-open');
        $("#puestos").html('');
        $("#descripcion_completa").html('...');
     
        autosize.destroy(  $('#descripcion_completa') );
    });

   /* $('.postular').click(function(e){
        console.log($eve);
        $.ajax({
            route: 'createColaborador',
            type: 'POST',
           // url: "http://idea.test/proyectos/{usuario}", //url: '/ruta/prueba/load',
            data: {
                id_puesto: $eve
           },
            dataType: 'JSON',
            success: function (){
               alert('todo bien');
           },
           error: function(){
               alert('Error');
           }
    
        });

    });*/
    $('#crearInteresado').click(function(event){

        console.log("interesado");
        

                $.ajax(
                    {
                        route: 'createColaborador',
                        type: 'POST',
                        contentType: "json",
                        processData: false, 
                        data: {
                            "_token": $("meta[name='csrf-token']").attr("content")
                        },
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
                        }
                    }
                );
            
    });
});


/*
function accion($eve){
   //alert($eve);
  
   console.log($eve);
    $.ajax({
         route: 'createColaborador',
         type: 'POST',
        // url: "http://idea.test/proyectos/{usuario}", //url: '/ruta/prueba/load',
         data: {
             id_puesto: $eve
        },
         dataType: 'JSON',

        statusCode:{
            404: function() {
                alert( "page not found" );
            }
        },
        
         success: function (){
            alert('todo bien');
        },
        error: function(){
            alert('Error');
        }
 
     });
   }*/


$(document).ready(function() {

    $("#btnCancelarAdm").on("click",function(){

        window.location.reload(true); 

    });


});
var id_usuario;