<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matricula=201623636;
        for ($i=1;$i<3;$i++){
        DB::table('usuarios')->insert([
            'matricula' =>$matricula+$i ,
            'nombres' => Str::random(30),
            'apellPat' => Str::random(15),
            'apellMat' => Str::random(15),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'facultad' => 'Facultad de Ciencias de la Computacion',
            'areaCono'=>'Área de Ingenierías y Ciencias Exactas',
            'licenciatura' => Str::random(15),
            'tipoUsuario' => 1,
            'fechaNacimiento' => '1990-01-04',
            'genero'=>'M',
            'telefono'=>$i+1,
            'wa'=>$i*2,
            'fb'=>Str::random(5),
            'tw'=>Str::random(5),
            'tlgram'=>Str::random(5),
            'insta'=>Str::random(5),

        ]);
    
        }
    }
}