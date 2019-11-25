<?php

namespace App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;

class Habilidades extends Model
{
    protected $table = "habilidades";
    protected $fillable = [
        'id',
        'matricula_Usuario',
        'capacidad_de_iniciativa',
        'adaptabilidad',
        'resolver_problemas',
        'trabajo_en_equipo',
        'versatilidad',
        'creatividad',
        'liderazgo',
        'seriedad',
        'resolucion_de_problemas',
        'pensamiento_critico',
        'manejo_de_personas',
        'coordinacion',
        'inteligencia_emocional',
        'juicio_decisiones',
        'orientacion_de_servicio',
        'negociacion',
        'flexibilidad_cognitiva',
        'auto_Descripcion',
    ];
}
