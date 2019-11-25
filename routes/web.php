<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('/proyectos', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('index2','InicioController@index2');
Route::get('/proyectos/{usuario}/eliminar',[
        'uses'=> 'HomeController@eliminar',
        'as' => 'eliminar_usuario']); 



// Registration Routes...
if ($options['register'] ?? true) {
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');
}

// Password Reset Routes...
if ($options['reset'] ?? true ) {
    
    Route::resetPassword();

}
/*
Route::resetPassword();
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
*/

// Email Verification Routes...
if ($options['verify'] ?? false) {
    Route::emailVerification();
}

//Ruta para borrar una notificacion - Adrian Rico
Route::group(['namespace' => 'Notificaciones'], function () {
    Route::post('/{id}','notificacionController@leerNotificacion')->name('leerNotificacion');
    Route::get('/misnotificaciones/{matricula}','notificacionController@mis_notificaciones')->name('mis_notificaciones')->middleware('auth');
});


//Controlador que manda informacion de los proyectos creados y los muestra en home  ->middleware('verified')
Route::get('/proyectos', 'HomeController@index')->name('home') ;
Route::get('/proyectos/{proyecto_id}', 'HomeController@show')->name('detalles_proyecto');
Route::get('/puestos/{id_puesto}','HomeController@createInteresado')->name('createInteresado'); ///Melka

//Controlador de la pagina SobreNosotros
/*Route::get('/sobreNosotros', function () {
    return view('sobre_nosotros');
})->name('sobre_nosotros');*/
Route::view('/sobreNosotros', 'sobre_nosotros')->name('sobre_nosotros');;
Route::view('/feedback', 'feedback_form')->name('feedback');
Route::view('/chat','chat_index')->name('chat');

Route::post('/feedback/enviar', 'Mails@enviar')->name('enviafeedback');
//Controlador de la pagina de inicio
/* Route::get('/','InicioController@index')->name('inicio_sistema');
 */
Route::get('/', function () {
    return view('inicio');
})->name('inicio_sistema')->middleware('guest');
/* ////Login y registro
Route::group(['namespace' => 'Login'], function(){
    Route::get('/login','loginController@index')->name('login_sistema');
    Route::post('/login', 'loginController@authenticate')->name('verificar_login');
    Route::get('/registro','registroController@index')->name('registro');
    Route::post('/registro', 'registroController@guardar')->name('guardar_usuario');
}); */

//Grupo que controla la creacion de un nuevo proyecto
Route::group(['namespace' => 'Proyecto'], function () {
    Route::get('nuevoProyecto','nuevoProyectoController@index')->name('nuevo_proyecto')->middleware('auth');
    Route::post('/','nuevoProyectoController@guardar')->name('guardar_proyecto');
});

//Grupo que solo muestra una vista estática (por el momento) de la difusion de un evento
Route::get('/eventos', function () {
    return view('difusion.index');
})->name('facultad_Evento');


//Grupo que controla el perfil del usuario
Route::group(['namespace' => 'Config'], function () {
    Route::get('{matricula_usuario}','miPerfilController@index')->name('miPerfil_edit');//->middleware('auth');
    Route::post('{matricula_usuario}/personal','miPerfilController@update_personal')->name('perfil_personal');
    Route::post('{matricula_usuario}/profesional','miPerfilController@update_profesional')->name('perfil_profesional');
    Route::post('/elimina/experiencia/{id}','miPerfilController@destroy_experiencia')->name('eliminarexp');
    Route::post('/elimina/idioma/{id}','miPerfilController@destroy_idioma')->name('eliminaridiom');
    Route::post('/elimina/herramientas/{id}','miPerfilController@destroy_herramienta')->name('eliminarherramientas');
});

//Grupo que controla la administracion de un proyecto
Route::group(['prefix' => 'administra', 'namespace' => 'Proyecto'], function () {
    Route::get('{id_proyecto}/informacion','adminProyectoController@index')->name('admin_proyecto');
    Route::post('{id_proyecto}/{matricula_usuario}/informacion/proyecto','adminProyectoController@update_proy')->name('guardar_admin_proyecto');
    Route::post('{id_proyecto}/{matricula_usuario}/informacion/puestos','adminProyectoController@update_proy_puestos')->name('guardar_admin_proyecto_puestos');
    Route::post('/elimina/puesto/{id}','adminProyectoController@destroy_puesto')->name('eliminarpuesto');
    Route::get('{id_proyecto}/tareas','adminProyectoController@tareas')->name('tareas_proyecto');
    Route::post('{id_proyecto}/tareas/{matricula_usuario}','adminProyectoController@asignar_tarea')->name('asignar_tarea');
    Route::post('{id_proyecto}/tareas/{matricula_usuario}/{id_tarea}','adminProyectoController@update_tarea')->name('editTareas');
    Route::get('{id_proyecto}/colaboradores','adminProyectoController@colaboradores')->name('colaboradores_proyecto');
    Route::get('{id_proyecto}/postulados','adminProyectoController@postulados')->name('postulados_proyecto');
    Route::post('{id_proyecto}/postulados/{id_puesto}/{matricula}/{id_interesado}','adminProyectoController@aceptarVacante')->name('aceptar_vacante');
    Route::post('/{id_proyecto}/postulados/{id_interesado}/{matricula}','adminProyectoController@rechazar_vacante')->name('rechazar_vacante');
});
//Grupo de ruta de colabordor de proyectos
Route::group(['prefix' => 'colaborador', 'namespace' => 'Proyecto'], function (){  
    Route::get('{id_proyecto}/informacion','colaboradorProyectoController@index')->name('colaborador_proyecto');
    Route::get('{id_proyecto}/misTareas','colaboradorProyectoController@misTareas')->name('mis_Tareas');
    Route::get('{id_proyecto}/Colaboradores_Proyecto','colaboradorProyectoController@misColaboradores')->name('Colaboradores');
    Route::get('{id_proyecto}/EstadoTarea','colaboradorProyectoController@EstadoTarea_Act')->name('EstadoTarea');
});

Auth::routes(['verify'=> true]);