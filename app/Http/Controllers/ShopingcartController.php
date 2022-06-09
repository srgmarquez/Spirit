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
        session_start();
        $prendas = $_SESSION['prendas'];
        return view('shopingcart.index-shoping', compact('prendas'));
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
        session_start();
        $prendas = $_SESSION['prendas'];
        $garment = Garment::findOrFail($id);
        array_push($prendas, $garment);
        $_SESSION['prendas'] = $prendas;
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
        session_start();
        $garment = Garment::findOrFail($id);
        $prendas = $_SESSION['prendas'];
        foreach($prendas as $prenda){
            if($prenda->id == $garment->id) {
                $prendas = array_diff($prendas, array($prenda));
            }
        }
        $_SESSION['prendas'] = $prendas;
        $prendas = $_SESSION['prendas'];
        return view('shopingcart.index-shoping', compact('prendas'));
    }
}
