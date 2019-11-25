<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencias', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); //primary key for this table
            $table->integer('matricula_Usuario'); //llave foreanea para matricula de usuario
            $table->foreign('matricula_Usuario','fk_experiencias_usuarios')->references('matricula')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nombre_Emp',100); //nombre de la empresa en que trabajo
            $table->string('puesto',50); //nombre del puesto en el que estuvo
            $table->date('fecha_Ini')->nullable(); //fecha que inicio el trabajo
            $table->date('fecha_Fin')->nullable(); //fecha que termino el trabajo 
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
        Schema::dropIfExists('experiencias');
    }
}
