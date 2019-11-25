<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabilidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habilidades', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id'); //primary key for this table
            $table->integer('matricula_Usuario'); //llave foreanea para matricula de usuario
            $table->foreign('matricula_Usuario','fk_habilidades_usuarios')->references('matricula')->on('usuarios')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('capacidad_de_iniciativa')->nullable();
            $table->boolean('adaptabilidad')->nullable();
            $table->boolean('resolver_problemas')->nullable();
            $table->boolean('trabajo_en_equipo')->nullable();
            $table->boolean('versatilidad')->nullable();
            $table->boolean('creatividad')->nullable();
            $table->boolean('liderazgo')->nullable();
            $table->boolean('seriedad')->nullable();
            $table->boolean('resolucion_de_problemas')->nullable();
            $table->boolean('pensamiento_critico')->nullable();
            $table->boolean('manejo_de_personas')->nullable();
            $table->boolean('coordinacion')->nullable();
            $table->boolean('inteligencia_emocional')->nullable();
            $table->boolean('juicio_decisiones')->nullable();
            $table->boolean('orientacion_de_servicio')->nullable();
            $table->boolean('negociacion')->nullable();
            $table->boolean('flexibilidad_cognitiva')->nullable();
            $table->string('auto_Descripcion',500)->nullable(); //descricpion del usuario
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
        Schema::dropIfExists('habilidades');
    }
}
