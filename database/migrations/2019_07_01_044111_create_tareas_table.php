<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); //primary key for this table
            $table->integer('matricula_Usuario'); //llave foranea para la matricula de usuario
            $table->foreign('matricula_Usuario','fk_tareas_usuarios')->references('matricula')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('id_Proyecto'); //llave foranea para el proyecto 
            $table->foreign('id_Proyecto','fk_tareas_proyectos')->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombre_Tarea',100); //nombre de la tarea 
            $table->string('descri_Tarea',300); //descripcion de la tarea
            $table->date('fecha_Inicio'); //fecha que se creo la tarea
            $table->date('fecha_Fin'); //fecha que selecciona para el termino de la tarea
            $table->tinyInteger('estado');
            /*
            * Para el estado se asignaron cuatro valores
            * 0- Sin asignar (el usuario aun no la acepta)
            * 1- En proceso (el usuario la acepta)
            * 2- Pendiente/Dudas (el usuario tiene dudas en la tarea)
            * 3- Terminado (el usuario acabo la tarea)
            */
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas');
    }
}
