<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Título de la página -->
    <title>HOME-{{ Auth::user()->name }}</title>
</head>
<!-- Cabecera y hoja de estilos asociada -->
@extends('parts.header_user')
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}"/> 
<body>
    <!-- Parte de las imagenes compuesta por un slider de imagenes y un div de presentación -->
    <section id="imagenes">
        <div id="agrupar_imagenes_home">
            <!-- Listado de imágenes -->
            <div id="portada_imagenes">
                <ul>
                <li><img src="{{ asset('photos/FONDOHOME1.jpg') }}"></li>
                <li><img src="{{ asset('photos/FONDOHOME2.jpg') }}"></li>
                <li><img src="{{ asset('photos/FONDOHOME3.jpg') }}"></li>
                <li><img src="{{ asset('photos/FONDOHOME4.jpg') }}"></li>
                <li><img src="{{ asset('photos/FONDOHOME1.jpg') }}"></li>
                </ul>
                <!-- Parte del loggin, compuesta por un título, slogan y el botón para empezar las compras-->
                <div id="bienvenida">
                    <h3 id="titulo">SPIRIT</h3>
                    <h4 id="slogan">Dress for Success</h4>
                    <h1 id="bienvenidatitulo">BIENVENID@ {{ Auth::user()->name }} </h1>
                    <p id="textocomenzar">Empezar a comprar</p>
                    <a id="enlaceempezar" href="{{ url('/user') }}">Empezar</a>
                </div>
            </div>
        </div>
    </section>
</body>
@extends('parts.footer')


