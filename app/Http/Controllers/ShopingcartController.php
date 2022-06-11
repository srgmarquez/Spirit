<?php

namespace App\Http\Controllers;
use App\Models\Garment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopingcartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Se iniciar las sessiones
        session_start();
        // Se guarda en una variable los datos de la sesion de prendas
        $prendas = $_SESSION['prendas'];
        // Se inicializa una variable mensaje
        $mensaje = "";
        // Se devuelve  a la siguiente vista con el mensaje y las prendas
        return view('shopingcart.index-shoping', compact('prendas', 'mensaje'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //Se iniciar las sesiones
        session_start();
        // Se guarda en una variable los datos de la sesion de prendas
        $prendas = $_SESSION['prendas'];
        // Se obtiene una prenda, buscadola por el id
        $garment = Garment::findOrFail($id);
        // Se añade esa prenda al array de prendas
        array_push($prendas, $garment);
        // Se actualiza la sesión
        $_SESSION['prendas'] = $prendas;
        // Se devuelve a la vista con un mensaje
        return redirect('user')->with('mensaje', 'Prenda ' . $garment->garment_name . ' añadida al carrito');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Se iniciar las sesiones
        session_start();
        // Se obtiene una prenda, buscadola por el id
        $garment = Garment::findOrFail($id);
        // Se obtiene el array de prendas de la sesion de prendas
        $prendas = $_SESSION['prendas'];
        // Se recorre el array 
        foreach($prendas as $prenda){
            // Si el id de la prenda de la posición es igual que el id de la prenda que hemos obtenido por el id 
            // nos llega del método
            if($prenda->id == $garment->id) {
                //Eliminamos esa prenda del array de prendas
                $prendas = array_diff($prendas, array($prenda));
            }
        }
        // Se actualiza la sesión
        $_SESSION['prendas'] = $prendas;
        // Se obtiene el nuevo array
        $prendas = $_SESSION['prendas'];
        // Se inicializa la variable mensaje
        $mensaje = "";
        // Se devuelve a la vista con un mensaje y el nuevo array de prendas
        return view('shopingcart.index-shoping', compact('prendas', 'mensaje'));
    }
}
