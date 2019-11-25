<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColaboradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); //primary key for this table
            $table->integer('matricula_Usuario'); //llave foreanea para matricula de usuario
            $table->foreign('matricula_Usuario','fk_colaboradores_usuarios')->references('matricula')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('id_Proyecto'); //llave foranea al proyecto
            $table->foreign('id_Proyecto','fk_colaboradores_proyectos')->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('puesto_Dese'); //Puesto que desempeña
            $table->date('fecha_Ingreso'); //fecha de inicio en que se unio al proyecto
            $table->boolean('estado'); //estado que indica si esta activo o no
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
        Schema::dropIfExists('colaboradores');
    }
}
