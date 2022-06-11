<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Título de la página -->
    <title>SPIRIT-{{$category->category_name}}</title>
    <!-- Cabecera y hoja de estilos asociada -->
    @extends('parts.header_user')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/User/user-show-garments.css') }}"/>  
</head>
<body>
    <!-- Menú de navegación -->
    <nav>
        <ul>
            <li><a href="{{url('user')}}">Volver al listado de categorías</a></li>
        </ul>
    </nav>
    <!-- Comienzo de la sectión donde estarán todas las prendas -->
    <section id="agrupar">
        <!-- Título -->
        <h1>Categoría {{$category->category_name}}</h1>
        <!-- Aquí se encuentra el array de prendas -->
        @foreach ($garments as $garment)
        <div id="agrupargarment">
            <div id="etiquetagarment">
                <!-- Parte de la imagen de la prenda -->
                <div id="parteimagen" style="background-image: url('{{asset('storage').'/'.$garment->picture_file}}')">                                                               
                </div>
                <!-- Información de la prenda nombre, descripción...-->
                <div id="partetitulo">
                    <h2 id="name">{{$garment->garment_name}}</h2>
                    <p id="description">{{$garment->description}}</p>
                    <p id="size">Talla: {{$garment->size}}</p>
                    <p id="price">{{$garment->price}}€</p>
                    <!-- Botón para poder añadir esa prenda al carrito -->
                    <form id="comprar-form" action="{{ url('/shoping/'. $garment->id) }}" method="POST" class="d-none">
                        @csrf
                        {{ method_field('PATCH') }}
                        <button id="enlace" type="submit">Comprar</button> 
                    </form>                     
                </div>
            </div>
        </div>
        @endforeach
    </section>
</body>
<!-- Footer -->
@extends('parts.footer')


