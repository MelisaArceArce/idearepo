<?php

namespace App\Http\Controllers\Proyecto;
use App\Models\Proyecto\prueba;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Proyecto\nuevoProyecto;
use App;
use App\Models\Proyecto\Tarea;
use App\usuarios;

class colaboradorProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_Proyecto)
    {
        $proyectoColInf=nuevoProyecto::findOrFail($id_Proyecto);
        $Informacion_Ad=usuarios::where('matricula','=',$proyectoColInf->matricula_Usuario)->get();
        return view('colaboradorProyecto.inicio',compact(
            'proyectoColInf',
            'Informacion_Ad'
        ));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function misTareas($idProyecto){
        $proyecto=nuevoProyecto::findOrFail($idProyecto);
        $misTareas = DB::table('tareas')
            ->where('id_Proyecto','=',$idProyecto)
            ->where('matricula_Usuario','=',Auth::user()->matricula)
            ->get();
        return view('colaboradorProyecto.misTareas',compact('proyecto','misTareas'));
    }

    public function misColaboradores($idProyecto){        
        $proyecto=nuevoProyecto::findOrFail($idProyecto);
        $misColaboradores = DB::table('colaboradores')
        ->join('usuarios','usuarios.matricula', '=', 'colaboradores.matricula_Usuario')
        ->where('id_Proyecto','=',$idProyecto)
        ->get();
        $key=$misColaboradores->search(function($colaborador){
            return $colaborador->matricula_Usuario==Auth::user()->matricula;
        });
        $misColaboradores->pull($key);        
        return view('colaboradorProyecto.colaboradoresProyecto',compact('proyecto','misColaboradores'));
    }

    public function EstadoTarea_Act( $id){        
        $tarea=Tarea::findOrFail($id);
        if ($tarea->estado==0){
            $tarea->estado++;
        }else{
            if($tarea->estado==1){
                $tarea->estado++;
            }
        }
        $tarea->save();
        return(redirect()->route('mis_Tareas',$tarea->id_Proyecto)->with('message','Asignación de tarea correcta.') );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
