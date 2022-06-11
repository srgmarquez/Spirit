<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Título de la página -->
    <title>SPIRIT-PEDIDOS</title>
    <!-- Cabecera y hoja de estilos asociada -->
    @extends('parts.header_admin')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Order/index-order.css') }}"/>   
</head>
<!-- Imagen de fondo -->
<body style="background-image: url('{{ asset('photos/IMAGEN_ADMIN_FONDO.jpg')}}');">
    <!-- Menú d enavegación de miga de pan-->
    <nav>   
        <ul>
            <li><a href="{{url('index-admin')}}">Home Admin</a></li>
            <p class="intermedio">></p>
            <li><a href="#">Pedidos</a></li>
        </ul>
    </nav>
    <!-- Apartado listado de pedidos -->
    <div id="agrupar">
        <!-- Parte del titulo -->
        <div id="cabecerasection">
            <h1>Listado pedidos</h1>
        </div>
        <!-- Tabla que contiene información de los pedidos-->
        <table id="tablaPedidos">
            <th>
                <!-- Cabecera -->
                <tr>
                    <th>Usuario</th>
                    <th>Precio total</th>
                    <th>Prendas</th>
                    <th>Fecha pedido</th>
                </tr>
            </th>
            <tbody>
                <!-- Cuerpo de la tabla-->
                <!-- Se declará una variable contador -->
                @php
                    $contador = 0;
                @endphp
                <!-- Se recorre el array de todos los pedidos-->
                @foreach($orders as $order)
                <tr>
                    <!-- Aquí se realiza una consulta para obtener el nombre del usuario que ha hecho ese pedido-->
                    @php
                        $user_name = DB::select('SELECT name FROM users WHERE id = ?', [$order->user_id]);
                        <!-- La consulta devuelve un array json de valores por lo que hay que recorrerlo-->
                        foreach ($user_name as $value) {
                            <!-- Se guarda en un array normal el valor del campo nombre-->
                            $array[] = $value->name;
                        }
                        <!-- Como por cada pedido se irá añadiendo un nombre, utilizamos la variable contador para obtener el nombre de esa posición -->
                        $name = $array[$contador];
                        <!-- Sumamos uno al contador para luego utilizar el siguiente nombre-->
                        $contador++;
                    @endphp
                    <!-- Usamos el campo nombre recogido del array-->
                    <td>{{ $name }}</td>
                    <!-- Otros datos del pedido-->
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->garments }}</td>
                    <td>{{ $order->date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
<!-- Footer -->
@extends('parts.footer')