<!DOCTYPE html>
<html lang="en">
<head>
    <title>SPIRIT-CARRITO</title>
    @extends('parts.header_user')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Shopingcart/index-shoping.css') }}"/>  
</head>
<body>
    <nav>   
        <ul>
            <li><a href="{{url('user')}}">Volver al listado de categorías</a></li>
        </ul>
    </nav>
    <div id="agrupar">
        @if (Session::has('mensaje'))
            <p id="titulomensaje">{{Session::get('mensaje')}}</p>
        @endif
        @if ($mensaje == "no-prenda")
            <p id="titulomensaje">No hay prendas que comprar</p>
        @endif
        @php
            $precio = 0;
        @endphp
        <h1>PRENDAS ELEGIDAS PARA COMPRAR</h1>
        @php
            $array_prendas = array();
        @endphp
        @foreach($prendas as $prenda)
            @php
                array_push($array_prendas, $prenda->garment_name);
                $_SESSION['nombre_prendas'] = $array_prendas;
            @endphp
            <div id="agruparprendatitulo">{{$prenda->garment_name}}</div>
            <div id="agruparprendaresto">
                <div id="image" style="background-image: url('{{asset('storage').'/'.$prenda->picture_file}}')">
                </div>
                <div id="datos">
                    <div id="talla">Talla: {{$prenda->size}}</div>
                    <div id="precio">Precio: {{$prenda->price}}€ </div>
                    @php 
                        $precio = $precio + $prenda->price;
                    @endphp
                    <div id="apartadoboton">
                        <form action="{{url('/shoping/' . $prenda->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <button id="enlace" type="submit">Eliminar prenda</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
        <div id="preciofinal">
            El precio final de la compra es: <span class="negrita"> {{$precio}}€ </span>
            @php
                $_SESSION['precio_total'] = $precio;
            @endphp
        </div>
        <a id="botoncomprar" href="{{url('order/create')}}">Comprar</a>
    </div>
</body>
@extends('parts.footer')


