<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // Aquí se indica el middlware auth solo se utiliza en el método store
        $this->middleware('auth')->only('store');
    }

    public function index()
    {
        //Redirige a la siguiente vista
        return view('admin.admin-login');
    }

    public function store(Request $request)
    {
        // Se obtienen los datos del formulario
        $gmail = $_POST['adminUserGmail'];
        $contraseña = $_POST['adminUserPassword'];
        // Y se comprueban los con los del administrador
        if ($gmail == "sergio@gmail.com" && $contraseña == "sergii02") {
            // Si son correctos saldrá el siguiente mensaje y redirigirá a la siguiente vista
            $mensaje = "Administrador loggeado correctamente";
            return view('admin.admin-index');
        } else {
            // Sino saldrá el mensaje y volverá a la vista del login del administrador
            return view('admin.admin-login')->with('mensaje','Datos del administrador introducidos incorrectos.');
        }        
    }
}