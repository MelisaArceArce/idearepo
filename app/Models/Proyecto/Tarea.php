<?php

namespace App\Models\Proyecto;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = "tareas";
    protected $fillable = ['id','matricula_Usuario','id_Proyecto', 'nombre_Tarea','descri_Tarea','fecha_Inicio','fecha_Fin','estado'];
}
