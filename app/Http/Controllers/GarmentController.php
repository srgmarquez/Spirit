<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Garment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GarmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Se obtinen todas las prendas
        $dates['garments'] = Garment::paginate(10);
        // Se muestra la vista index con todas las prendas
        return view('garment.index-garment', $dates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Se crea una nueva prenda
        $garment = new Garment();
        // Se obtienen todas las categorías, para poder mostrar todos sus nombres e elegir a que categoría
        //pertenecerá la prenda
        $categories = Category::all();
        // Y se redirigirá a la siguiente vista con la nueva prenda, y el listado de categorías
        return view('garment.create-garment', compact('garment','categories'));
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
            'garment_name'=>'required|string|max:100',
            'category_id'=>'required|integer',
            'description'=>'required|string|max:400',
            'price'=>'required',
            'size'=>'required|string|max:5',
            'picture_file'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];

        // En caso de que los campos no esten bién, mostrará los siguientes mensajes
        $mensaje = [
            'garment_name.required' => 'El campo nombre es obligatorio',
            'category_id.required' => 'El campo categoría es obligatoria',
            'description.required' =>'El campo descripción es obligatoria',
            'price.required' =>'El campo precio es obligatorio',
            'size.required' =>'El campo talla es obligatoria',
            'size.max' =>'El campo talla no debe superar los cinco carácteres',
            'picture_file.required' => 'El campo foto es obligatorio',
            'picture_file.mimes' => 'La fotografía no cumple con la extensión requerida: jpeg, png o jpg',
        ];
         // Validación
        $this->validate($request, $campos, $mensaje);
        // Obtiene todos los campos del formulario excepto el token que es el parámetro de seguridad
        $garments_dates = request()->except('_token');

        // Se mirá que se hallá subido una imagen
        if ($request->hasFile('picture_file')) {
            // Si es así, se redirigirá la imagen a la carpeta uploads
            $garments_dates['picture_file'] = $request->file('picture_file')->store('uploads','public');
        }
        // Se insertá la prenda con os parametros del formulario
        Garment::insert($garments_dates);
        // Y por último se redirige a la vista de prendas con el siguiente mensaje
        return redirect('garment')->with('mensaje', 'Prenda creada con éxito');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Garment  $garment
     * @return \Illuminate\Http\Response
     */
    public function show(Garment $garment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Garment  $garment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Se encuentra la prenda a través de id que le llega del método
        $garment = Garment::findOrFail($id);
        // Y devuleve una vista con los datos de esa prenda
        return view('garment.edit-garment', compact('garment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Garment  $garment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validación de campos
        $campos = [
            'garment_name'=>'required|string|max:100',
            'category_id'=>'required|integer',
            'description'=>'required|string|max:400',
            'price'=>'required',
            'size'=>'required|string|max:5',
        ];

        // En caso de que los campos no esten bién, mostrará los siguientes mensajes
        $mensaje = [
            'garment_name.required' => 'El campo nombre es obligatorio',
            'category_id.required' => 'El campo categoría es obligatoria',
            'description.required' =>'El campo descripción es obligatoria',
            'price.required' =>'El campo precio es obligatorio',
            'size.required' =>'El campo talla es obligatoria',
            'size.max' =>'El campo talla no debe superar los cinco carácteres',
        ];

        // Si se ha introducido una nueva foto
        if ($request->hasFile('picture_file')) {
            // Validación de la foto
            $campos = [
                'picture_file'=>'required|max:10000|mimes:jpeg,png,jpg',
            ];
            // En caso de que l campo no este bién, mostrará los siguientes mensajes
            $mensaje = [
                'picture_file.required' => 'El campo foto es obligatorio',
                'picture_file.mimes' => 'La fotografía no cumple con la extensión requerida: jpeg, png o jpg',
            ];
        }
        // Validación de todos los campos
        $this->validate($request, $campos, $mensaje);

        // Obtiene todos los campos del formulario excepto el token que es el parámetro de seguridad y el del método que sirve para poder
        // diferencias los métodos 
        $garment_dates = request()->except(['_token', '_method']);

        // Si se ha intoducido una imagen
        if ($request->hasFile('picture_file')) {
            // Busca la prenda através del id que se pasa al principio del método
            $garment = Garment::findOrFail($id);
            // Elimina la foto de esa prenda que esta en la carpeta public
            Storage::delete('public/' . $garment->picture_dile);
            // E introduce la nueva foto que ha sido elegida en el formulario
            $garment_dates['picture_file'] = $request->file('picture_file')->store('uploads','public');
        }

        // Aquí se actualizan los datos de la prenda
        Garment::where('id','=',$id)->update($garment_dates);
        // Se obtiene el id de la penda
        $garment = Garment::findOrFail($id);
        // Y redirige a la vista con los nuevos datos de esa prenda y con el mensaje
        return redirect('garment')->with('mensaje', 'Prenda '. $garment->garment_name .' actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Garment  $garment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Se obtiene una prenda a través del id que llega del método
        $garment = Garment::findOrFail($id);
        // En caso de que tenga imagen, se eliminará de la carpeta de imagenes 
        // y posteriormente se eliminará de la base de datos
        if (Storage::delete('public/'.$garment->picture_file)){
            Garment::destroy($id);
        } else {
            Garment::destroy($id);
        }
        // Posteriormente devolverá a la vista de antes con el mensaje de prenda eliminada.
        return redirect('garment')->with('mensaje', 'Prenda ' . $garment->garment_name . ' borrada correctamente');
    }

    public function category() 
    {
        //Método el cual devolverá la categoría a la que pertenece esa prenda
        return $this->belongsTo(Category::class);
    } 
       
}
