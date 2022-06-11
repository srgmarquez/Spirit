<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Título de la página -->
    <title>SPIRIT-CARRITO</title>
    <!-- Cabecera y hoja de estilos asociada -->
    @extends('parts.header_user')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Shopingcart/index-shoping.css') }}"/>  
</head>
<body>
     <!-- Menú de navegación para volver al listado  -->
    <nav>   
        <ul>
            <li><a href="{{url('user')}}">Volver al listado de categorías</a></li>
        </ul>
    </nav>
    <!-- -->
    <section id="agrupar">
        @if (Session::has('mensaje'))
            <p id="titulomensaje">{{Session::get('mensaje')}}</p>
        @endif
        <!-- Mensaje de si no hay prendas que comprar -->
        @if ($mensaje == "no-prenda")
            <p id="titulomensaje">No hay prendas que comprar</p>
        @endif
        <!-- Inicializar variable precio para calcular precio total-->
        @php
            $precio = 0;
        @endphp
        <!-- Título -->
        <h1>PRENDAS ELEGIDAS PARA COMPRAR</h1>
        <!-- Se inicializa un array de prendas-->
        @php
            $array_prendas = array();
        @endphp
        <!-- Se recorren todas las pendas compradas -->
        @foreach($prendas as $prenda)
            <!-- Se añaden esas prendas al array de prendas para posteriormente oder guardar ese array en una sesión 
                 ( Se utilizará para poder introducirlo en la bas e de datos )-->
            @php
                array_push($array_prendas, $prenda->garment_name);
                $_SESSION['nombre_prendas'] = $array_prendas;
            @endphp
            <!-- Información de las prendas -->
            <div id="agruparprendatitulo">{{$prenda->garment_name}}</div>
            <div id="agruparprendaresto">
                <div id="image" style="background-image: url('{{asset('storage').'/'.$prenda->picture_file}}')">
                </div>
                <div id="datos">
                    <div id="talla">Talla: {{$prenda->size}}</div>
                    <div id="precio">Precio: {{$prenda->price}}€ </div>
                    <!-- Se calcula el precio de la prenda anterior con la que siguiente hasta sacar el precio total -->
                    @php 
                        $precio = $precio + $prenda->price;
                    @endphp
                    <!-- Botón para eliminar una prenda del carrito -->
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
        <!-- APartado donde se ve el precio final de la compra -->
        <div id="preciofinal">
            El precio final de la compra es: <span class="negrita"> {{$precio}}€ </span>
            <!-- Se guarda el precio final en una sesión para poder utilizarlo después -->
            @php
                $_SESSION['precio_total'] = $precio;
            @endphp
        </div>
        <!-- Botón para poder comprar -->
        <a id="botoncomprar" href="{{url('order/create')}}">Comprar</a>
    </section>
</body>
<!-- Footer -->
@extends('parts.footer')


