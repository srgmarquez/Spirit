<!DOCTYPE html>
<html lang="en">
<head>
    @extends('parts.header_admin')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Order/index-order.css') }}"/>   
</head>
<body style="background-image: url('{{ asset('photos/IMAGEN_ADMIN_FONDO.jpg')}}');">
    <nav>   
        <ul>
            <li><a href="{{url('index-admin')}}">Home Admin</a></li>
            <p class="intermedio">></p>
            <li><a href="#">Pedidos</a></li>
        </ul>
    </nav>
    <div id="agrupar">
        <div id="cabecerasection">
            <h1>Listado pedidos</h1>
        </div>
        <table id="tablaPedidos">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Precio total</th>
                    <th>Prendas</th>
                    <th>Fecha pedido</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $contador = 0;
                @endphp
                @foreach($orders as $order)
                <tr>
                    @php
                        $user_name = DB::select('SELECT name FROM users WHERE id = ?', [$order->user_id]);
                        foreach ($user_name as $value) {
                            $array[] = $value->name;
                        }
                        $name = $array[$contador];
                        $contador++;
                    @endphp
                    <td>{{ $name }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->garments }}</td>
                    <td>{{ $order->date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@extends('parts.footer')