<?php

namespace App\Models\Proyecto;
use App;
use App\Models\Colaboradores\Colaborador;
use App\usuarios;
use Illuminate\Database\Eloquent\Model;

class nuevoProyecto extends Model
{
    protected $table = "proyectos";
    protected $fillable = ['id','matricula_Usuario','nombre_Proy', 'area_Enfocada','descrip_Breve','descrip_Com','fecha_Inicio','estado','privado'];
    /*public function Usuarios(){
        return $this->belongsTo(usuarios::class);
    }*/

    
}