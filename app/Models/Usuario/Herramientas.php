<?php

namespace App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;

class Herramientas extends Model
{
    protected $table = "herramientas";
    protected $fillable = [
        'id',
        'matricula_Usuario',
        'herramienta',
        'lvl_cono',
    ];
}
