<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\usuarios;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/proyectos';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'matricula'=>['required','digits:9','unique:usuarios'],
            'nombres' => ['required','alpha_spaces', 'max:75'],
            'apellPat' => ['required','alpha_spaces', 'max:25'],
            'apellMat' => ['required','alpha_spaces', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'facultad' => ['required'],
            'genero' => ['required'],
        ],[
            'matricula.unique'=>'La matricula ya esta registrada.',
            'matricula.numeric'=>'La matricula debe ser solo numérica',
            'matricula.max'=>'La matricula debe tener 9 caracteres.',
            'matricula.min'=>'La matricula debe tener 9 caracteres.',
            'nombres.alpha_spaces'=>'En el campo de nombres solo se aceptan letras y espacios.',
            'apellPat.alpha_spaces'=>'En los campos de apellidos solo se aceptan letras y espacios.',
            'apellMat.alpha_spaces'=>'En los campos de apellidos solo se aceptan letras y espacios.',
            'email.unique'=>'El email ya esta registrado.',
            'password.confirmed'=>'Las contraseñas no coinciden.',
            'password.min'=>'La contraseña debe tener al menos 8 caracteres.'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */ 
    protected function create(array $data)
    {
        $resp = DB::transaction(function () use($data) {
            $respuesta = usuarios::create([
                'matricula' => $data['matricula'],
                'nombres' => $data['nombres'],
                'email' => $data['email'],
                'apellPat' => $data['apellPat'],
                'apellMat' => $data['apellMat'],
                'facultad' => $data['facultad'],
                'areaCono' => RegisterController::buscarArea($data['facultad']),
                'genero' => $data['genero'],
                'tipoUsuario' => 2,
                'password' => Hash::make($data['password']),
            ]);
            return $respuesta;
        });
            return $resp;
    }
   

    protected function buscarArea(string $data)
    {
        $areaNatSalud = array(
            "Facultad de Medicina Veterinaria y Zootecnia","Facultad de Ciencias Biológicas","Facultad de Ciencias Químicas",
            "Facultad de Enfermería", "Facultad de Estomatología","Facultad de Ingeniería Agrohidráulica",
            "Facultad de Medicina"
        );
        foreach ( $areaNatSalud as $valor)
        if (strcmp ($data , $valor ) == 0)  return 'Área de Cs. Naturales y de Salud'; 

        $areaEcAdm = array(
            "Facultad de Administración","Facultad de Ciencias de la Comunicación",
            "Facultad de Contaduría Pública", "Facultad de Economía"
        );
        foreach ( $areaEcAdm as $valor)
        if (strcmp ($data , $valor ) == 0)  return 'Área de Económico-Administrativas'; 
        $areaIng= array(
            "Facultad de Arquitectura","Facultad de Ciencias de la Computación","Facultad de Ciencias de la Electrónica","Facultad de Ciencias Físico Matemáticas",
            "Facultad de Ingeniería","Facultad de Ingeniería Química"
        );
        foreach ( $areaIng as $valor)
        if (strcmp ($data , $valor ) == 0)  return 'Área de Ingenierías y Ciencias Exactas'; 
        $arraySocHum= array(
            "Escuela de Artes","Escuela de Artes Plásticas y Audiovisuales","Facultad de Ciencias de la Comunicación",
            "Facultad de Cultura Física", "Facultad de Derecho y Ciencias Sociales", "Facultad de Filosofía y Letras",
            "Facultad de Lenguas", "Facultad de Psicología"
        );
        foreach ( $arraySocHum as $valor)
        if (strcmp ($data , $valor ) == 0)  return 'Área de Ciencias Sociales y Humanidades'; 

    }
}
