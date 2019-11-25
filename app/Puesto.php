<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Proyecto\nuevoProyecto;

class Puesto extends Model
{
    protected $table = "puestos";
    //protected $guarded = ['id'];
    protected $fillable = ['id','id_Proyecto','tipo_Puesto','hab_Cono','vacantes','area_Puesto'];

    //PODRIASMOS ELIMINAR ESTAS LINEAS
    /* public function proyecto(){
        return $this->belongsTo(nuevoProyecto::class);
    } */
    
}

