<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Garment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates['categories'] = Category::paginate(10);
        return view('category.index-category', $dates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = [
            'category_name'=>'required|string|max:100',
            'description'=>'required|string|max:400',
            'picture_file'=>'max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje = [
            'category_name.required' => 'El nombre es obligatorio',
            'description.required' =>'La descripción es obligatoria',
            'picture_file.mimes' => 'La fotografía no cumple con la extensión requerida: jpeg, png o jpg',
        ];

        $this->validate($request, $campos, $mensaje);

        //Obtiene todo los datos excepto el del control de seguridad (token)
        $category_dates = request()->except('_token');

        if ($request->hasFile('picture_file')) {
            $category_dates['picture_file'] = $request->file('picture_file')->store('uploads','public');
        }

        Category::insert($category_dates);
        return redirect('category')->with('mensaje', 'Categoría creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit-category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos = [
            'category_name'=>'required|string|max:100',
            'description'=>'required|string|max:400',
        ];

        $mensaje = [
            'category_name.required' => 'El nombre es obligatorio',
            'description.required' =>'La descripción es obligatoria',
        ];

        if ($request->hasFile('picture_file')) {
            $campos = [
                'picture_file'=>'max:10000|mimes:jpeg,png,jpg',
            ];

            $mensaje = [
                'picture_file.mimes' => 'La fotografía no cumple con la extensión requerida: jpeg, png o jpg',
            ];
        }

        $this->validate($request, $campos, $mensaje);

        $category_dates = request()->except(['_token', '_method']);

        if ($request->hasFile('picture_file')) {
            $category = Category::findOrFail($id);
            Storage::delete('public/' . $category->picture_dile);
            $category_dates['picture_file'] = $request->file('picture_file')->store('uploads','public');
        }

        Category::where('id','=',$id)->update($category_dates);
        $category = Category::findOrFail($id);

        return redirect('category')->with('mensaje', 'Categoría '. $category->category_name .' actualizada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if (Storage::delete('public/'.$category->picture_file)){
            Category::destroy($id);
        } else {
            Category::destroy($id);
        }
        return redirect('category')->with('mensaje', 'Categoría ' . $category->category_name . ' borrada correctamente');
    }

    public function garments()
    {
        return $this->hasMany(Garment::class);
    }
}
