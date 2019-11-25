<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\Int_;
use Illuminate\Support\Facades\Date;

class TareasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tareas')->insert([
            'matricula_Usuario' => 201623636,
            'id_Proyecto' => 1,
            'nombre_Tarea' => Str::random(35),
            'descri_Tarea' => Str::random(46),
            'fecha_Inicio' =>'2000-01-01',
            'fecha_Fin' =>'2000-01-04',
            'estado' =>'1',
        ]);
    }
}