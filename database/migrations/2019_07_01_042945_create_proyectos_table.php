<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); //primary key for this table
            $table->integer('matricula_Usuario')->default(0); //llave foreanea para matricula de usuario
            $table->foreign('matricula_Usuario','fk_proyectos_usuarios')->references('matricula')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombre_Proy', 150); //titulo del proyecto
            $table->string('area_Enfocada', 45); //area que esta enfocada el proyecto
            $table->string('descrip_Breve', 500); //descripcion breve del proyecto
            $table->string('descrip_Com', 2500); //descripcion completa del proyecto
            $table->date('fecha_Inicio')->nullable(); //fecha que se inicio el proyecto
            $table->string('estado', 15)->nullable(); //estado en el que se encuentra el proyecto esto es subjetivo al creador
            $table->boolean('privado')->nullable(); //si el proyecto es privado o no
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
        Schema::dropIfExists('proyectos');
    }
}
