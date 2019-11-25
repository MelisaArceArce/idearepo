<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdiomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('idiomas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); //primary key for this table
            $table->integer('matricula_Usuario'); //llave foreanea para matricula de usuario
            $table->foreign('matricula_Usuario','fk_idiomas_usuarios')->references('matricula')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->string('idioma',25); //idioma que maneja
            $table->string('lvl_idioma',11); //porcentaje que maneja del idioma
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
        Schema::dropIfExists('idiomas');
    }
}
