<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteresadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interesados', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); //primary key for this table
            $table->integer('matricula_Usuario'); //llave foreanea a matricula de usuario
            $table->foreign('matricula_Usuario','fk_interesados_usuarios')->references('matricula')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('id_Proyecto'); //llave foranea al proyecto
            $table->foreign('id_Proyecto','fk_interesados_proyectos')->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('postulado'); //booleano para saber si se postulo el usuario
            $table->unsignedInteger('id_Puesto'); //llave forarea para el puesto que pidio
            $table->foreign('id_Puesto','fk_interesados_puestos')->references('id')->on('puestos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('interesados');
    }
}
