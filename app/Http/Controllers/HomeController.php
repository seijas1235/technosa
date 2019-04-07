<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function enviar(Request $request)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'mensaje'=>'required|string|min:50'
        ]);

        $forminput = [
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'mensaje' => $request->input('mensaje')
        ];

        /**
        * No olvides cambiar el correo aquí. 
        * Este es el correo donde vas a recibir 
        * los mensajes.
        **/
        Mail::to('gseijas@technovation.com.gt')->send(new Contacto($forminput));
         return redirect('welcome')->with('estado', '¡Mensaje enviado! Gracias por contactarnos.');
    }
}
