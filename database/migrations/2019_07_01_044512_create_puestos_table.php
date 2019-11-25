<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); //primary key for this table
            $table->unsignedInteger('id_Proyecto'); //llave foranea para el proyecto 
            $table->foreign('id_Proyecto','fk_puestos_proyectos')->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tipo_Puesto',75); //Puesto que necesita
            $table->string('hab_Cono',750); //habilidades y conocimientos que necesita
            $table->tinyInteger('vacantes'); //vacantes que solicita
            $table->string('area_Puesto',45); //area en la que esta enfocada el puesto
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
        Schema::dropIfExists('puestos');
    }
}
