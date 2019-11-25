<?php

namespace App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    protected $table = "experiencias";
    protected $fillable = [
        'id',
        'matricula_Usuario',
        'nombre_Emp',
        'puesto',
        'fecha_Ini',
        'fecha_Fin',
    ];
}
