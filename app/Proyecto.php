<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = "proyectos";
    protected $fillable = ['matricula_Usuario','nombre_Proy','area_Enfocada','descrip_Breve','descrip_Com','fecha_Inicio','estado','privado'];
    /* protected $guarded = ['id']; */

   //PODRIAMOS ELIMINAR ESTAS LINEAS
    /*  public function Usuario()
    {
        return $this->belongsTo('App\usuarios', 'matricula_Usuario', 'matricula');
    } */
}
