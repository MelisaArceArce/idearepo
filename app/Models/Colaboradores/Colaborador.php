<?php

namespace App\Models\Colaboradores;

use App\Models\Proyecto\nuevoProyecto;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    protected $table = "colaboradores";
    protected $fillable = ['id','matricula_Usuario','id_Proyecto','puesto_Dese','fecha_Ingreso','estado'];

    

}
