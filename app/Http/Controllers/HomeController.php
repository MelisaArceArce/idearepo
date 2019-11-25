<?php

namespace App\Http\Controllers;

use App\Models\Interesados\Interesado;
use App\Models\Notificaciones\Notificacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Puesto;
use App\Models\Proyecto\nuevoProyecto;
use Illuminate\Support\Facades\DB;
use App\usuarios;
use Illuminate\Support\Facades\Input;
use SebastianBergmann\Environment\Console;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth');
        //hace uso del middleware authenticate para redireccionar si no existe sesion
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $proyectosAdmin=nuevoProyecto::where('matricula_Usuario','=', Auth::user()->matricula)->get();   
        $proyectos = nuevoProyecto::all();
        $proyectosColaborando=HomeController::colaborando(Auth::user()->matricula);

        $notificaciones = DB::table('notificaciones')
        ->join('usuarios','usuarios.matricula','=','notificaciones.matricula_Remitente')
        ->where([
            ['notificaciones.matricula_Usuario','=', Auth::user()->matricula],
            ['leido', '=', 0],
        ])
        ->select('notificaciones.id','matricula_Usuario','matricula_Remitente','mensaje','hora','leido','nombres')
        ->orderBy('hora')->get();

        $num_notificaciones = $notificaciones->count();
        /* dd($num_notificaciones); */

        session([
            'proyectosAdmin' => $proyectosAdmin,
            'proyectosColaborando' => $proyectosColaborando,
            'notificaciones' => $notificaciones,
            'num_notificaciones' => $num_notificaciones
        ]);
        
        

        return view('home',compact('proyectos'));
    }

    public function colaborando($matriculaUsuario){//funcion para extraer los proyectos donde colaboro 
        $proyectos_ColaborandoP=DB::table('proyectos')
        ->join('colaboradores','colaboradores.id_Proyecto','=','proyectos.id')
       ->where('colaboradores.matricula_Usuario','=',$matriculaUsuario)
        ->get();
        return $proyectos_ColaborandoP;
    }


    public function show($proyecto_id){
        $proyecto = nuevoProyecto::find($proyecto_id);
        $puestos = Puesto::all()->where('id_Proyecto', '=', $proyecto_id);
        $numeroPuestos = $puestos->count();
        $numeroVacantes = 0;
        foreach($puestos as $puesto){
            $numeroVacantes += $puesto->vacantes;
        }
        
        return response([
            'descrip_com' => $proyecto->descrip_Com,
            'numeroVacantes' => $numeroVacantes,
            'numeroPuestos' => $numeroPuestos,
            'puestos' => $puestos,
        ]);
    }

      
    public function eliminar($usuario)
    {
        $user = usuarios::find($usuario);
       $user -> delete();
       return redirect()->route('logout');
    }

    //Crear un colaborador para los proyectos
    protected function createInteresado($id_puesto)
    {   
         //Este metodo busca el id del proyecto 
         $proyect = DB::table('puestos')->where('id',$id_puesto)->first();
         //Aqui guarda todos los puestos
         $puesto= array(
             "id_Proyecto" => $proyect->id_Proyecto,
             "id" => $proyect->id,           
         );

        try{
            DB::transaction(function () use($puesto) {
                Interesado::create([
                    'matricula_Usuario' => Auth::user()->matricula,
                    'id_Proyecto' => $puesto['id_Proyecto'],
                    'id_Puesto'=> $puesto['id'],
                    'postulado' => '1'
                    ]);
                    
            });
        }
        catch (Exception $e) {
           /* return Response::json-(array(
            'error' => true,
            'data' => array()),
            500 );*/
            dd("error");
        }

        $proyectoOwner = DB::table('proyectos')->where('id',$puesto['id_Proyecto'])->first();
        $remitente= DB::table('usuarios')->where('matricula', Auth::user()->matricula)->first();
        $mensaje = "El usuario ".$remitente->nombres." quiere unirse al proyecto ".$proyectoOwner->nombre_Proy;
        //id, matricula_Usuario, matricula_Remitente(el que envia), mensaje, hora, leido, created_at, updated_at --notificaciones
        try{
            DB::transaction(function () use($proyectoOwner, $remitente, $mensaje) {
                Notificacion::create([
                    'matricula_Usuario' => $proyectoOwner->matricula_Usuario,
                    'matricula_Remitente' => $remitente->matricula,
                    'mensaje' => $mensaje,
                    'hora'=> date('Y-m-d H:i:s'), //"2014-10-25 20:00:00", 
                    'leido' => '0'
                    ]);
                    
            });

        }
        catch(Exception $e){
            dd("error");
        }


        return back()->with('success', 'User created successfully.');
            //return (redirect('/proyectos')->with('message','Se ha hecho algo') );

        //return back()->with('message', 'Su postulación se ha completado con éxito.');
        //return (redirect('/proyectos')->with('success','Se ha hecho algo') );
        //dd($id_puesto);
    }

}