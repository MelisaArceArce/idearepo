<?php

namespace App\Models\Interesados;

use Illuminate\Database\Eloquent\Model;

class Interesado extends Model
{
    protected $table = "interesados";
    protected $fillable = ['id','matricula_Usuario','id_Proyecto','postulado','id_Puesto'];
}
