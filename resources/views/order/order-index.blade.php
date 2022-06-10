<!DOCTYPE html>
<html lang="en">
<head>
    @extends('parts.header_admin')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Order/index-order.css') }}"/>   
</head>
<body style="background-image: url('{{ asset('photos/IMAGEN_ADMIN_FONDO.jpg')}}');">
    <nav>   
        <ul>
            <li><a href="#">Home Admin</a></li>
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
        </table>
    </div>
</body>