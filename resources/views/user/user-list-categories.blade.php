<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Título de la página -->
    <title>SPIRIT-CATEGORÍAS</title>
    <!-- Cabecera y hoja de estilos asociada -->
    @extends('parts.header_user')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/User/user-list-categories.css') }}"/>  
</head>
<body>
    <!-- Mensaje de prenda añadida al carrito -->
    <div id="agrupar">
        @if (Session::has('mensaje'))
            <p id="titulomensaje">{{Session::get('mensaje')}}</p>
        @endif
        <!-- Título de las categorías -->
        <h1>CATEGORÍAS</h1>
        <!-- Array de categorías -->
        @foreach($categories as $category)
        <!-- div de apartado por cada categoría -->
        <div id="agruparcategoria">
            <!-- div fondo de cada categoría -->
            <div id="etiquetacategoria">
                <!-- parte de la imagen de la categoría -->
                <div id="parteimagen" style="background-image: url('{{asset('storage').'/'.$category->picture_file}}')">
                </div>
                <!-- datos de la categoría y botón para visualizar las prendas que contiene -->
                <div id="partetitulo">
                    <p id="titulo">{{$category->category_name}}</p>
                    <p id="descripcion">{{$category->description}}</p>
                    <a id="enlace" href="{{ url('/user/' . $category->id)}}">Entrar</a>                      
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>
<!-- Footer -->
@extends('parts.footer')