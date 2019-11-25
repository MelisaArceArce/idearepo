<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); //primary key for this table
            $table->integer('matricula')->unique(); //matricula unica del usuario
            $table->string('nombres',75); //nombre del usuario
            $table->string('apellPat',25); //apellido paterno del usuario
            $table->string('apellMat',25); //apellido materno del usuario
            $table->string('email')->unique(); //correo del usuario
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken(); //contraseña del usuario
            $table->string('facultad',50); //facultad a la que pertenece el usuario
            $table->string('areaCono',45)->nullable(); //area de conocimiento del usuario
            $table->string('licenciatura',50)->nullable(); //titulo o carrea en curso
            $table->tinyInteger('tipoUsuario')->nullable(); 
            /*
            *
            *Tipo de usuario 
            * 0 - docente
            * 1 - alumno
            *
            */
            $table->date('fechaNacimiento')->nullable(); //fecha de nacimiento 
            $table->string('genero',10); //LGBTTTIQ
            $table->string('telefono',11)->nullable(); //numero de telefono de contacto
            $table->boolean('wa',11)->nullable(); //si tiene WhatsApp
            $table->string('fb',50)->nullable(); //url de su perfil de Facebook
            $table->string('tw',50)->nullable(); //url de su perfil de Twitter
            $table->string('tlgram',20)->nullable(); //nickname de telegram
            $table->string('insta',50)->nullable(); //url de su perfil de Instagram
            $table->string('fotoPerfil',100)->nullable(); //ruta de la foto de perfil del usuario
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
        Schema::dropIfExists('usuarios');
    }
}
