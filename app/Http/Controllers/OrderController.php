<?php

namespace App\Http\Controllers;
use DB;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates['orders'] = Order::paginate(10);
        return view('order.order-index', $dates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session_start();
        $mensaje = "no";
        return view('order.order-create', compact('mensaje'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session_start();
        $user_name = DB::select('SELECT name FROM users WHERE name = ?', [$_POST['owner']]);
        
        $campos = [
            'owner'=>'required|string|max:100',
            'cvv'=>'required|integer|min:3',
            'cardNumber'=>'required|integer|min:12',
        ];

        $mensaje = [
            'owner.required' => 'El nombre es obligatorio',
            'cvv.required' =>'El cvv es obligatorio',
            'cardNumber.required' =>'El número de tarjeta es obligatorio',
            'cvv.min' =>'El cvv como mínimo tiene que tener 3 carácteres',
            'cardNumber.min' =>'El número de tarjeta como mínimo tiene que tener 12 carácteres',          
        ];

        $this->validate($request, $campos, $mensaje);

        $mensaje = "si";

        if ($user_name == null) {
            return view('order.order-create', compact('mensaje'));
        } else {
            $id_usuario = DB::select('SELECT id FROM users WHERE name = ?', [$_POST['owner']]);
            foreach ($id_usuario as $value) {
                $array[] = $value->id;
            }
            $id = $array[0];
            $precio = $_SESSION['precio_total'];
            $nombre_prendas = $_SESSION['nombre_prendas'];
            $cadena = "Prendas: ";
            foreach($nombre_prendas as $prenda){
                $cadena .= " " . $prenda . ",";
            }
            
            $date = date('m-d-Y H:i');
            
            DB::insert('INSERT INTO orders (user_id, total_price, garments, date) VALUES (?, ?, ?, ?)',[$id, $precio, $cadena, $date]);
            return view('order.order-exit')->with('mensaje', 'Pedido realizado correctamente');
        } 
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
