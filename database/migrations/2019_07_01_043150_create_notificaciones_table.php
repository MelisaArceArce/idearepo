<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); //primary key for this table
            $table->integer('matricula_Usuario'); //llave foranea para notificaciones
            $table->foreign('matricula_Usuario','fk_notificaciones_usuarios')->references('matricula')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('matricula_Remitente'); //llave foranea para notificaciones
            $table->foreign('matricula_Remitente','fk_notificaciones_usuariosRemi')->references('matricula')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->string('mensaje',255); //descripcion de la notificacion
            $table->dateTime('hora'); //tiempo del mensaje
            $table->boolean('leido'); //saber si el usuario ya leyo la notificacion
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
        Schema::dropIfExists('notificaciones');
    }
}
