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
        // Se obtienen todos los pedidos
        $dates['orders'] = Order::paginate(10);
        // Se lleva a la siguiente vista con los datos de todos los pedidos
        return view('order.order-index', $dates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Se inician las sesiones
        session_start();
        // Si la siguiente sesion ha sido inicializada
        // Lo que se quiere controlar aquí, es que al no haber prendas que comprar no te lleve a la página de introducir
        // datos bancarios
        if (!isset($_SESSION['nombre_prendas'])){
            // el mensaje se actualiza
            $mensaje = "no-prenda";
            // se obtienen las prendas, de la sesion de prendas
            $prendas = $_SESSION['prendas'];
            // LLeva a la siguiente vista con el mensaje y el array de prendas
            return view('shopingcart.index-shoping', compact('prendas', 'mensaje'));
        } else {
            // Aquí lo que se trata de hacer, es que si el mensaje es no, no hay problemas para llevar a la vista de intorducir datos bancarios
            $mensaje = "no";
            //Llevará a la siguiente vista con el mensaje
            return view('order.order-create', compact('mensaje'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Se inician las sesiones
        session_start();
        // Se realiza una consulta para obtener el nombre del usuario a través del campo que han rellenado en el formulario
        $user_name = DB::select('SELECT name FROM users WHERE name = ?', [$_POST['owner']]);
        
        // Validación de campos
        $campos = [
            'owner'=>'required|string|max:100',
            'cvv'=>'required|integer|min:3',
            'cardNumber'=>'required|integer|min:12',
        ];
        // En caso de que los campos no esten bién, mostrará los siguientes mensajes
        $mensaje = [
            'owner.required' => 'El nombre es obligatorio',
            'cvv.required' =>'El cvv es obligatorio',
            'cardNumber.required' =>'El número de tarjeta es obligatorio',
            'cvv.min' =>'El cvv como mínimo tiene que tener 3 carácteres',
            'cardNumber.min' =>'El número de tarjeta como mínimo tiene que tener 12 carácteres',          
        ];
        // Validación
        $this->validate($request, $campos, $mensaje);

        // Se pone por defecto el mensaje si, `para que si en la busqueda que hemos hecho
        // antes del usuario, sea nula, es decir que no encuentra ninguno usuario, muestre un mensaje en la vista
        $mensaje = "si";

        if ($user_name == null) {
            // Si es nula, devolverá a la vista con el mensaje de que el usuario no es correcto
            return view('order.order-create', compact('mensaje'));
        } else {
            // En cambio si encuentra un usuario, obtendra su id para poder introducirlo en la tabla de pedidos
            $id_usuario = DB::select('SELECT id FROM users WHERE name = ?', [$_POST['owner']]);
            // Habra de descodificar ese array de parejas clave valor
            foreach ($id_usuario as $value) {
                // obetenos el valor del id en un array
                $array[] = $value->id;
            }
            // Como ese array esseguro que solo tendra una posición ya que un usuario no tiene varios id, obtenemos la posición 0
            $id = $array[0];
            // Obtenemos el valor del precio total de la compra através de la sesion
            $precio = $_SESSION['precio_total'];
            // Y también obtenemos el array con todos los nombres de las prendas compradas
            $nombre_prendas = $_SESSION['nombre_prendas'];
            // Iniciamos la cadena que contrendrá los nombres de las prendas
            $cadena = "Prendas: ";
            //Recorremos el array de los nomrbes de las prendas
            foreach($nombre_prendas as $prenda){
                // Y vamos concatenando la cadena con los nombres de las prendas, para hacer un string con todas las prendas compradas
                $cadena .= " " . $prenda . ",";
            }
            // Se obtiene la fecha de ese momento en el que se realizó el pedido
            $date = date('m-d-Y H:i');
            // Y por último se inserta en la base de datos el pedido con todos sus datos obtenidos anteriormente
            DB::insert('INSERT INTO orders (user_id, total_price, garments, date) VALUES (?, ?, ?, ?)',[$id, $precio, $cadena, $date]);
            // Y nos redirigirá a la vista de exit con el mensaje.
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
