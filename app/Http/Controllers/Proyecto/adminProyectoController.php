<?php

namespace App\Http\Controllers\Proyecto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Colaboradores\Colaborador;
use App\Models\Interesados\Interesado;
use App\Models\Notificaciones\Notificacion;
use App\Models\Proyecto\nuevoProyecto;
use App\Models\Proyecto\Tarea;
use App\Puesto;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class adminProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        /* $datas = Rol::orderBy('id')->get(); */
        /* return view('admin.rol.index', compact('datas')); */
        $proyectosAdmin=nuevoProyecto::findOrFail($id);
        $puestos = Puesto::where('id_Proyecto','=', $id)->get();

            
        return view('administrarProyecto.inicio',compact(
            'proyectosAdmin',
            'puestos'
        ));
    }

    public function tareas($id)
    {
        $id_Proyecto=nuevoProyecto::findOrFail($id); 
        
        $datos_colaboradores = DB::table('colaboradores')
            ->join('usuarios','usuarios.matricula', '=', 'colaboradores.matricula_Usuario')
            ->where('id_Proyecto','=',$id)
            ->select('nombres','matricula_Usuario')
            ->get();

        $tareas_colaboradores = DB::table('tareas')
            ->join('usuarios','usuarios.matricula', '=', 'tareas.matricula_Usuario')
            ->where('id_Proyecto','=',$id)
            ->select('nombre_Tarea','descri_Tarea','fecha_Inicio','fecha_Fin','estado','matricula_Usuario')
            ->get();

        
        return view('administrarProyecto.tareas',compact('id_Proyecto','datos_colaboradores','tareas_colaboradores'));
    }

    public function update_tarea($id_Proyecto,Request $request, $matricula_usuario,$id_tarea)
    {
        //dd($id_tarea);
            $t = Tarea::findOrFail($id_tarea);
            $t->fill($request->all());
            $t->save();


        
        return (redirect()->route('tareas_proyecto',['id_proyecto'=>$id_Proyecto])->with('message_asignacion','Actulización de tarea correcta.') );
    }

    public function asignar_tarea($id_Proyecto,Request $request,$matricula_usuario)
    {
        $request->validate([
            'nombre_Tarea' => 'required|alpha_spaces|min:15|max:100',
            'descri_Tarea' => 'required|min:15|max:300',
            'fecha_Inicio' => 'required|date',
            'fecha_Fin' => 'required|date|after_or_equal:fecha_Inicio',
            
        ],[
            'nombre_Tarea.max'=>'El nombre de la tarea debe tener como máximo 100 caracteres.',
            'descri_Tarea.max'=>'La descripción de la tarea debe tener como máximo 300 caracteres.',
            'nombre_Tarea.min'=>'El nombre de la tarea debe tener como mínimo 15 caracteres.',
            'nombre_Tarea.alpha_spaces'=>'El nombre de la tarea solo debe contener letras.',
            'descri_Tarea.min'=>'La descripción de la tarea debe tener como mínimo 15 caracteres.',
            'fecha_Fin.after_or_equal'=>'La fecha de entrega debe ser mayor o igual a la de inicio.',
            
        ]);

        
        DB::transaction(function () use($request,$matricula_usuario,$id_Proyecto) {
            Tarea::create([
                'matricula_Usuario' => $matricula_usuario,
                'id_Proyecto' => $id_Proyecto,
                'nombre_Tarea' => $request['nombre_Tarea'],
                'descri_Tarea' => $request['descri_Tarea'],
                'fecha_Inicio' => $request['fecha_Inicio'],
                'fecha_Fin' => $request['fecha_Fin'],
                'estado' => 0,
                ]);
                
        });
        return redirect()->route('tareas_proyecto',['id_proyecto'=>$id_Proyecto])->with('message_asignacion','Asignación de tarea correcta.');

    }

    public function colaboradores($id)
    {
        $id_Proyecto=nuevoProyecto::findOrFail($id);
        $datos_colaboradores = DB::table('colaboradores')
            ->join('usuarios','usuarios.matricula', '=', 'colaboradores.matricula_Usuario')
            ->where('id_Proyecto','=',$id)
            ->get();
        
        return view('administrarProyecto.colaboradores',compact('id_Proyecto','datos_colaboradores'));

    }

    public function postulados($id)
    {
        $id_Proyecto=nuevoProyecto::findOrFail($id);
        $datos_interesados = DB::table('interesados')
        ->join('usuarios','usuarios.matricula', '=', 'interesados.matricula_Usuario')
        ->join('puestos','interesados.id_Puesto', '=', 'puestos.id')
        ->where([
                ['interesados.id_Proyecto', '=', $id],
                ['interesados.postulado', '=', '1'],
            ])
            ->select('interesados.id','matricula','interesados.id_Proyecto','id_Puesto','nombres','apellPat','apellMat','email','facultad','areaCono','licenciatura','wa','fb','tw','tlgram','insta','fotoPerfil','tipo_Puesto','hab_Cono','area_Puesto')
            ->get();
       
        //Busqueda de idiomas - Adrian Rico
        foreach ($datos_interesados as $key => $dato) {
            $idiomas_interesados[$key] = DB::table('usuarios')
            ->join('idiomas','usuarios.matricula', '=', 'idiomas.matricula_Usuario') 
            ->where('usuarios.matricula','=',$dato->matricula)
            ->select('matricula','idioma','lvl_idioma')
            ->get();
        }

        //Busqueda de herramientas - Adrian Rico
        foreach ($datos_interesados as $key => $dato) {
            $herramientas_interesados[$key] = DB::table('usuarios')
            ->join('herramientas','usuarios.matricula', '=', 'herramientas.matricula_Usuario') 
            ->where('usuarios.matricula','=',$dato->matricula)
            ->select('matricula','herramienta','lvl_cono')
            ->get();
        }

        //Busqueda de experiencias - Adrian Rico
        foreach ($datos_interesados as $key => $dato) {
            $datos_experiencias[$key] = DB::table('usuarios')
            ->join('experiencias','usuarios.matricula', '=', 'experiencias.matricula_Usuario') 
            ->where('usuarios.matricula','=',$dato->matricula)
            ->select('matricula','nombre_Emp','puesto','fecha_Ini','fecha_Fin')
            ->get();
        }

        //Busqueda de habilidades y aptitudes - Adrian Rico
        foreach ($datos_interesados as $key => $dato) {
            $datos_habilidades[$key] = DB::table('usuarios')
            ->join('habilidades','usuarios.matricula', '=', 'habilidades.matricula_Usuario') 
            ->where('usuarios.matricula','=',$dato->matricula)
            ->select('matricula','capacidad_de_iniciativa','adaptabilidad','resolver_problemas','trabajo_en_equipo','versatilidad','creatividad','liderazgo','seriedad','resolucion_de_problemas','pensamiento_critico','manejo_de_personas','coordinacion','inteligencia_emocional','juicio_decisiones','orientacion_de_servicio','negociacion','flexibilidad_cognitiva','auto_Descripcion')
            ->get();
        }

        

        /* dd($datos_interesados); */

        return view('administrarProyecto.postulados',compact('id_Proyecto','datos_interesados','idiomas_interesados','herramientas_interesados','datos_experiencias','datos_habilidades'));
    }

    public function aceptarVacante($id_proyecto,$id_puesto,$matricula_usuario,$id_interesado)
    {
        $Proyecto = nuevoProyecto::findOrFail($id_proyecto);

        DB::transaction(function () use($id_proyecto,$id_puesto,$matricula_usuario,$id_interesado,$Proyecto){

            $puesto = Puesto::find($id_puesto);
            $puesto->vacantes = $puesto->vacantes - 1;
            if ($puesto->vacantes == 0) {
                $puesto->delete();
            }else{
                $puesto->save();
            }
            $fecha_ahora = Carbon::now();
                    
            Colaborador::create([
                'id_Proyecto' => $id_proyecto,
                'matricula_Usuario' => $matricula_usuario,
                'puesto_Dese' => $puesto->tipo_Puesto,
                'fecha_Ingreso' => $fecha_ahora,
                'estado' => 0
            ]);

            Notificacion::create([
                'matricula_Usuario' => $matricula_usuario,
                'matricula_Remitente' => Auth::user()->matricula,
                'mensaje' => 'Has sido aceptado al proyecto "'. $Proyecto->nombre_Proy .'".',
                'hora' => $fecha_ahora,
                'leido' => 0
            ]);

            Interesado::destroy($id_interesado);
            
        });

        

        return redirect()->route('postulados_proyecto', $Proyecto)->with('message_aceptar_colaborador','Candidato aceptado correctamente, ahora es tu colaborador.');
    }

    public function rechazar_vacante($id_Proyecto,$id_interesado,$matricula_usuario)
    {
        $Proyecto=nuevoProyecto::findOrFail($id_Proyecto);

        DB::transaction(function () use($id_interesado,$matricula_usuario,$Proyecto){

            $fecha_ahora = Carbon::now();

            Notificacion::create([
                'matricula_Usuario' => $matricula_usuario,
                'matricula_Remitente' => Auth::user()->matricula,
                'mensaje' => 'Lamentablemente no has sido aceptado al proyecto "'. $Proyecto->nombre_Proy .'".',
                'hora' => $fecha_ahora,
                'leido' => 0
            ]);

            Interesado::destroy($id_interesado);

        });

        return redirect()->route('postulados_proyecto',$id_Proyecto)->with('message_rechazar_colaborador','Candidato rechazado correctamente.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_proy($id,Request  $request)
    {

        //dd($id);;
        DB::table('proyectos')->updateOrInsert(

            ['id' => $id,'matricula_Usuario' => Auth::user()->matricula],

            ['nombre_Proy' => $request['nombre_Proy'],
            'area_Enfocada' => $request['area_Enfocada'],
            'descrip_Breve' => $request['descrip_Breve'],
            'descrip_Com' => $request['descrip_Com'],
            'fecha_Inicio' => $request['fecha_Inicio'],
            'estado' => $request['estado'],
            'privado' => $request['privado']]

        );

        return redirect()->route('admin_proyecto', $id);

    }

    public function update_proy_puestos($id,Request  $request)
    {

        if($request['puestos']!=null){

            foreach($request['puestos'] as $puesto){
            
                DB::table('puestos')->updateOrInsert(

                    ['id' => $puesto['id'],'id_Proyecto' => $id], 
    
                    ['tipo_Puesto' => $puesto['tipo_Puesto'],
                    'hab_Cono' => $puesto['hab_Cono'],
                    'vacantes' => $puesto['vacantes'],
                    'area_Puesto' => $puesto['area_Puesto']]
    
                );

            }

        }

        return redirect()->route('admin_proyecto', $id);

    }

    public function update_tareas(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_puesto(Request $request)
    {
        if($request->ajax()) {
            Puesto::find($request->id)->delete();
         }
    }
}
