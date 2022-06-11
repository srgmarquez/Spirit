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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Se inician las sesiones
        session_start();
        //Se crea un array de prendas
        $prendas = []; 
        // Y se introduce en una sesión
        $_SESSION['prendas'] = $prendas;
        //Posteriormente se mostrará la vista home
        return view('home');
    }
}
