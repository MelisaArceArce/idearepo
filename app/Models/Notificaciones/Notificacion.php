<?php

namespace App\Models\Notificaciones;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    protected $table = "notificaciones";
    protected $fillable = ['id','matricula_Usuario','matricula_Remitente','mensaje','hora','leido'];
}
