<?php

namespace App\Http\Controllers\Proyecto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Proyecto\nuevoProyecto;
use App\Proyecto;
use App\Puesto;
use Illuminate\Support\Facades\DB;
use App\usuarios;
use Illuminate\Support\Facades\Auth;

class nuevoProyectoController extends Controller
{
    //Usamos este middleware para que regrese a inicio en caso de no tener sesion iniciada
    public function __construct()
    {
        $this->middleware('auth');
        //hace uso del middleware authenticate para redireccionar si no existe sesion
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("nuevoProyecto.inicio");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        $request->validate([
            'nombre_Proy' => 'required|min:1|max:150',
            'fecha_Inicio' => 'required',
            'descrip_Breve' => 'required|max:500|min:25',
            'descrip_Com' => 'required|max:2500|min:50',
            'puestos.*.tipo_Puesto' => 'required|min:1|max:75',
            'puestos.*.hab_Cono' => 'required',
            'puestos.*.vacantes' => 'required|min:1',
        ],[
            'nombre_Proy.max'=>'El nombre del proyecto debe tener como maximo 150 caracteres.',
            'puestos.*.tipo_Puesto.max'=>'El nombre de los puestos debe tener como maximo 75 caracteres.',
            'descrip_Breve.max'=>'La descripción breve debe tener como maximo 500 caracteres.',
            'descrip_Breve.min'=>'La descripción breve debe tener como minimo 25 caracteres.',
            'descrip_Com.max'=>'La descripción completa debe tener como maximo 2500 caracteres.',
            'descrip_Com.min'=>'La descripción completa debe tener como minimo 50 caracteres.',
        ]);
        //dd();
        //Este metodo que aun es un prototipo solo busca el usuario que está creando el proyevto 
        //$user = DB::table('usuarios')->where('id', '1')->first();
        //Aqui guarda en la base
        DB::transaction(function () use($request) {
            Proyecto::create([
                'matricula_Usuario' => Auth::user()->matricula,
                'nombre_Proy' => $request['nombre_Proy'],
                'area_Enfocada' => $request['area_Enfocada'],
                'fecha_Inicio' => $request['fecha_Inicio'],
                'estado' => $request['estado'],
                'descrip_Breve' => $request['descrip_Breve'],
                'descrip_Com' => $request['descrip_Com'],
                'privado' => '0',
                ]);
                //Este metodo busca el id del proyecto con su nombre
                $proyect = DB::table('proyectos')->where('nombre_Proy', $request['nombre_Proy'])->first();
                //Aqui guarda todos los puestos
                foreach($request['puestos'] as $puesto)
                {
                Puesto::create([
                    'id_Proyecto' => $proyect->id,
                    'tipo_Puesto' => $puesto['tipo_Puesto'],
                    'hab_Cono' => $puesto['hab_Cono'],
                    'vacantes' => $puesto['vacantes'],
                    'area_Puesto' => $puesto['area_Puesto'],
                    ]);
                }
        });
            return (redirect('/proyectos')->with('message_alta','Tu proyecto ha sido creado exitosamente.') );
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function actualizar(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        //
    }
}
