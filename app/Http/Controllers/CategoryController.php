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
        // Se obtinen todas las categorías
        $dates['categories'] = Category::paginate(10);
        // Se muestra la vista index con todas las categorías
        return view('category.index-category', $dates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Se muestra la vista de crear una nueva categoría 
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
        // Validación de campos
        $campos = [
            'category_name'=>'required|string|max:100',
            'description'=>'required|string|max:400',
            'picture_file'=>'max:10000|mimes:jpeg,png,jpg',
        ];
        // En caso de que los campos no estes bién, mostrará los siguientes mensajes
        $mensaje = [
            'category_name.required' => 'El nombre es obligatorio',
            'description.required' =>'La descripción es obligatoria',
            'picture_file.mimes' => 'La fotografía no cumple con la extensión requerida: jpeg, png o jpg',
        ];
        // Validación 
        $this->validate($request, $campos, $mensaje);

        //Obtiene todo los datos excepto el del control de seguridad (token)
        $category_dates = request()->except('_token');

        // Si tiene una imagen
        if ($request->hasFile('picture_file')) {
            // Mueve la imagen introducida a la carpeta public
            $category_dates['picture_file'] = $request->file('picture_file')->store('uploads','public');
        }

        //Inserta la categoría con sus datos en la base de datos
        Category::insert($category_dates);
        //Redirige a la vista de categorías con el siguiente mensaje
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
        // Obtiene una categoría a través del id que le llega del método
        $category = Category::findOrFail($id);
        // Devuelve la vista de creación con los datos de esa categoría
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
        // Validación de campos
        $campos = [
            'category_name'=>'required|string|max:100',
            'description'=>'required|string|max:400',
        ];

        // En caso de que los campos no esten bién, mostrará los siguientes mensajes
        $mensaje = [
            'category_name.required' => 'El nombre es obligatorio',
            'description.required' =>'La descripción es obligatoria',
        ];

        // Si se ha introducido una nueva imagen
        if ($request->hasFile('picture_file')) {
            // Se validará el campo de la imagen
            $campos = [
                'picture_file'=>'max:10000|mimes:jpeg,png,jpg',
            ];
            // Y sacará el siguiente mensaje si no cumple los requisitos
            $mensaje = [
                'picture_file.mimes' => 'La fotografía no cumple con la extensión requerida: jpeg, png o jpg',
            ];
        }
        // Validación
        $this->validate($request, $campos, $mensaje);
        // Obtiene todos los campos del formulario excepto el token que es el parámetro de seguridad y el del método que sirve para poder
        // diferencias los métodos 
        $category_dates = request()->except(['_token', '_method']);

        // Si introdujo una nueva imagen en el formulario
        if ($request->hasFile('picture_file')) {
            // Encontrará esa categoría con el id que le llega al método
            $category = Category::findOrFail($id);
            // Y eliminará la imagen que tenía anteriormente en la carpeta public
            Storage::delete('public/' . $category->picture_dile);
            // Y por último introducirá en la carpeta public la nueva imahen
            $category_dates['picture_file'] = $request->file('picture_file')->store('uploads','public');
        }

        // Posteriormente se actualizará la categoría con los datos del formulario
        Category::where('id','=',$id)->update($category_dates);
        // Se obtendrá la nueva categoría con el id introducido en el método
        $category = Category::findOrFail($id);
        // Y se redirigirá a la vista de las categorías con el siguiente mensaje
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
        // Se obtiene una categoría con el id pasado en el método
        $category = Category::findOrFail($id);
        // Si esa categoría tiene una imagen se eliminará de la carpeta public
        // Y posteriormente se eliminará la categoría de la base de datos
        if (Storage::delete('public/'.$category->picture_file)){
            Category::destroy($id);
        } else {
            Category::destroy($id);
        }
        // Por último redirigirá a la vista de listado de categorías con el siguiente mensaje
        return redirect('category')->with('mensaje', 'Categoría ' . $category->category_name . ' borrada correctamente');
    }

    public function garments()
    {
        //Método que devuelve las prendas que tiene una categoría
        return $this->hasMany(Garment::class);
    }
}
