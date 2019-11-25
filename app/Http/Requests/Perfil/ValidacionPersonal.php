<?php

namespace App\Http\Requests\Perfil;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ValidacionPersonal extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        /*$usuario = usuarios::find($this->route('matricula_usuario'));

        return $usuario && $this->user()->can('update', $usuario);*/

        //Revisar, que tenga autorizacion para modificar, no solo que esté logeado
        return Auth::check();
 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'genero' => 'bail|required', 
            
        ];
    }

    public function messages()
    {
        return [
            'genero.required' => 'El género es requerido',
            
        ];
    } 

}
