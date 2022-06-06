<?php

namespace App\Http\Controllers;

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
        $dates['garments'] = Garment::paginate(10);
        return view('garment.index-garment', $dates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $garment = new Garment();
        $categories = Category::all();
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
        $campos = [
            'garment_name'=>'required|string|max:100',
            'category_id'=>'required|integer',
            'description'=>'required|string|max:400',
            'price'=>'required',
            'size'=>'required|string|max:5',
            'picture_file'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];

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

        $this->validate($request, $campos, $mensaje);

        $garments_dates = request()->except('_token');

        if ($request->hasFile('picture_file')) {
            $garments_dates['picture_file'] = $request->file('picture_file')->store('uploads','public');
        }

        Garment::insert($garments_dates);
        return redirect('garment');
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
        $garment = Garment::findOrFail($id);
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
        $campos = [
            'garment_name'=>'required|string|max:100',
            'category_id'=>'required|integer',
            'description'=>'required|string|max:400',
            'price'=>'required',
            'size'=>'required|string|max:5',
        ];

        $mensaje = [
            'garment_name.required' => 'El campo nombre es obligatorio',
            'category_id.required' => 'El campo categoría es obligatoria',
            'description.required' =>'El campo descripción es obligatoria',
            'price.required' =>'El campo precio es obligatorio',
            'size.required' =>'El campo talla es obligatoria',
            'size.max' =>'El campo talla no debe superar los cinco carácteres',
        ];

        if ($request->hasFile('picture_file')) {
            $campos = [
                'picture_file'=>'required|max:10000|mimes:jpeg,png,jpg',
            ];

            $mensaje = [
                'picture_file.required' => 'El campo foto es obligatorio',
                'picture_file.mimes' => 'La fotografía no cumple con la extensión requerida: jpeg, png o jpg',
            ];
        }
        $this->validate($request, $campos, $mensaje);

        $garment_dates = request()->except(['_token', '_method']);

        if ($request->hasFile('picture_file')) {
            $garment = Garment::findOrFail($id);
            Storage::delete('public/' . $garment->picture_dile);
            $garment_dates['picture_file'] = $request->file('picture_file')->store('uploads','public');
        }

        Garment::where('id','=',$id)->update($garment_dates);
        $garment = Garment::findOrFail($id);

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
        $garment = Garment::findOrFail($id);
        if (Storage::delete('public/'.$garment->picture_file)){
            Garment::destroy($id);
        } else {
            Garment::destroy($id);
        }
        return redirect('garment')->with('mensaje', 'Prenda ' . $garment->garment_name . ' borrada correctamente');
    }

    public function category() 
    {
        return $this->belongsTo(Category::class, 'category_id');
    } 
       
}
