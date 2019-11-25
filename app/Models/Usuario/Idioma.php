<?php

namespace App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    protected $table = "idiomas";
    protected $fillable = [
        'id',
        'matricula_Usuario',
        'idioma',
        'lvl_idioma',
    ];
}
