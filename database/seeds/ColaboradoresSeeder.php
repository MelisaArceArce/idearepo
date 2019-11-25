<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ColaboradoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matricula=201623635;
        $idProyecto=1;
        for($i=1;$i<3;$i++){
            DB::table('colaboradores')->insert([
                'matricula_Usuario' =>$matricula+$i,
                'id_Proyecto' => $idProyecto,
                'puesto_Dese' => Str::random(100),
                'fecha_Ingreso' => '2016-01-23',
                'estado' =>1,
            ]);
        }
        
    }
}
