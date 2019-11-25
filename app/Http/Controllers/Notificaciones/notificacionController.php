<?php

namespace App\Http\Controllers\Notificaciones;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notificaciones\Notificacion;
use App\usuarios;
use Illuminate\Support\Facades\DB;

class notificacionController extends Controller
{
    public function leerNotificacion($id)
    {
        DB::transaction(function () use($id){
            Notificacion::where('id','=', $id)->update(['leido' => 1]);
        });
       
        return redirect(redirect()->getUrlGenerator()->previous());
    }

    public function mis_notificaciones($matricula)
    {
        $leidas = DB::table('notificaciones')->where([
            ['matricula_Usuario', '=', $matricula],
            ['leido', '=', 1]
        ])
        ->select('id','matricula_Usuario','matricula_Remitente','mensaje','hora')
        ->get();
            
          
        
        foreach ($leidas as $key => $datos) {
            /* dump ($datos->matricula_Usuario); */
            $nombre = DB::table('usuarios')->where('matricula','=', $datos->matricula_Remitente)
            ->select('nombres')
            ->get();
            /* dd($nombre[$key]->nombres); */
            $leidas[$key]->nombre_Remitente = $nombre[0]->nombres;
        }

        /* dd($leidas); */

        return view('notificaciones.index',compact('leidas'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
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
