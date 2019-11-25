<?php

namespace App\Http\Controllers;

use App\Mail\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Mails extends Controller
{
    public function enviar(Request $request)
    {
        //dd(request()->all());
        
        //dd($mensaje);
        Mail::to('lopez@gmail.com')->send(new Feedback($request->input()));
        return (redirect('/proyectos')->with('message_alta','Tu mensaje se ha enviado correctamente. ¡Gracias!') );
    }
}
