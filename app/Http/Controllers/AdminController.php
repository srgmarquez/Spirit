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
        $this->middleware('auth')->only('store');
    }

    public function index()
    {
        return view('admin.admin-login');
    }

    public function store(Request $request)
    {
        $gmail = $_POST['adminUserGmail'];
        $contraseña = $_POST['adminUserPassword'];
        if ($gmail == "sergio@gmail.com" && $contraseña == "sergii02") {
            $mensaje = "Administrador loggeado correctamente";
            return view('admin.admin-index');
        } else {
            return view('admin.admin-login')->with('mensaje','Datos del administrador introducidos incorrectos.');
        }        
    }
}