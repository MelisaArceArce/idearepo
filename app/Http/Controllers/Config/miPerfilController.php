<?php

namespace App\Http\Controllers\Config;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\usuarios;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario\Experiencia;
use App\Models\Usuario\Idioma;
use App\Models\Usuario\Herramientas;
use App\Models\Usuario\Habilidades;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Perfil\ValidacionPersonal;

class miPerfilController extends Controller 
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
    public function index($matricula)
    {

        //dd(Auth::user()->fechaNacimiento);
        /* Verificamos si el usuario tiene datos asociados a su matricula en las tablas */
        $experiencias = Experiencia::where('matricula_Usuario','=', $matricula)->get();
        $herramientas = Herramientas::where('matricula_Usuario','=', $matricula)->get();
        $idiomas = Idioma::where('matricula_Usuario','=', $matricula)->get();
        $habilidades = Habilidades::where('matricula_Usuario','=', $matricula)->get();

        //ASi accedemos a los datos del objeto de tipo model
        /* $experiencias[0]->nombre_Emp; */
        //dd($experiencias->all(),$herramientas->all(),$idiomas->all(),$habilidades->all());
        //dd($habilidades->all());

       
        return view('configuracion.miperfil',compact(
                'experiencias',
                'herramientas',
                'idiomas',
                'habilidades'  
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_personal(Request $request)
    {
        //dd($request);
        /*$request->validate([
            'genero' => 'bail|required',
        ]);*/
        $usuario = usuarios::findOrFail(Auth::user()->id);
        $usuario->fill($request->all());
        $usuario->save();

        return redirect()->route('miPerfil_edit',Auth::user()->matricula);

    }

    public function update_profesional(Request $request)
    {

        //dd($request->all());
        if($request->input('licenciatura') != null){
            $usuario = usuarios::where('matricula', '=', Auth::user()->matricula)->first();
            $usuario->licenciatura = $request->input('licenciatura');
            $usuario->save();
        }
        

        DB::table('habilidades')->updateOrInsert(

            ['matricula_Usuario' => Auth::user()->matricula],

            ['capacidad_de_iniciativa' => $request['capacidad_de_iniciativa'],
            'adaptabilidad' => $request['adaptabilidad'],
            'resolver_problemas' => $request['resolver_problemas'],
            'trabajo_en_equipo' => $request['trabajo_en_equipo'],
            'versatilidad' => $request['versatilidad'],
            'creatividad' => $request['creatividad'],
            'liderazgo' => $request['liderazgo'],
            'seriedad' => $request['seriedad'],
            'resolucion_de_problemas' => $request['resolucion_de_problemas'],
            'pensamiento_critico' => $request['pensamiento_critico'],
            'manejo_de_personas' => $request['manejo_de_personas'],
            'coordinacion' => $request['coordinacion'],
            'inteligencia_emocional' => $request['inteligencia_emocional'],
            'juicio_decisiones' => $request['juicio_decisiones'],
            'orientacion_de_servicio' => $request['orientacion_de_servicio'],
            'negociacion' => $request['negociacion'],
            'flexibilidad_cognitiva' => $request['flexibilidad_cognitiva'],
            'auto_Descripcion' => $request['auto_Descripcion']]

        );

        if($request['experiencias']!=null){

            foreach($request['experiencias'] as $experiencia){
            
                DB::table('experiencias')->updateOrInsert(

                    ['matricula_Usuario' => Auth::user()->matricula,'nombre_Emp' => $experiencia['nombre_Emp']],
    
                    ['puesto' => $experiencia['puesto'],
                    'fecha_Ini' => $experiencia['fecha_Ini'],
                    'fecha_Fin' => $experiencia['fecha_Fin']]
    
                );

            }

        }
        

        if($request['idioma']!=null){

            foreach($request['idioma'] as $idioma){

                DB::table('idiomas')->updateOrInsert(
    
                    ['matricula_Usuario' => Auth::user()->matricula,'idioma' => $idioma['idioma']],
        
                    ['lvl_idioma' => $idioma['lvl_idioma']]
        
                );
    
            }

        }

        if($request['herramienta']!=null){

            foreach($request['herramienta'] as $herramienta){

                DB::table('herramientas')->updateOrInsert(
    
                    ['matricula_Usuario' => Auth::user()->matricula,'herramienta' => $herramienta['herramienta']],
        
                    ['lvl_cono' => $herramienta['lvl_cono']]
        
                );
    
            }

        }

        return redirect()->route('miPerfil_edit',Auth::user()->matricula); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_experiencia(Request $request)
    {
        if($request->ajax()) {
            Experiencia::find($request->id)->delete();
         }
    }

    public function destroy_idioma(Request $request) 
    {
        if($request->ajax()) {
            Idioma::find($request->id)->delete();
        }
    }

    public function destroy_herramienta(Request $request) 
    {
        if($request->ajax()) {
            Herramientas::find($request->id)->delete();
        }
    }

}
