<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Garment;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Se inician las sesiones y se obienen todas las categorías 
        session_start();
        $dates['categories'] = Category::paginate();
        //Se redirige a la siguiente vista con los datos de las categorías 
        return view('user.user-list-categories', $dates); 
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
    public function store($id)
    {
        session_start();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Se inician las sesiones y se obienen tla categoría con el id que viene del método 
        session_start();
        $category = Category::findOrFail($id);
        // Se realiza una consulta en la cual se obtienes las prendas que las cuales el id de su categoría se igual al id de una de las categorías
        $garments['garments'] = DB::table('categories')
                         ->join('garments', 'garments.category_id', '=', 'categories.id')
                         ->where('categories.id', $category->id)
                         ->paginate(5);
        // Se devuelve a la siguiente vista , con la categoria y el listado de prendas
        return view('user.user-show-garments', compact('category'), $garments);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
