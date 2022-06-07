<!DOCTYPE html>
<html lang="en">
<head>
    <title>HOME-{{ Auth::user()->name }}</title>
</head>
@extends('parts.header_user')
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}"/> 
<body>
    <section id="imagenes">
        <div id="agrupar_imagenes_home">
            <div id="portada_imagenes">
                <ul>
                <li><img src="{{ asset('photos/FONDOHOME1.jpg') }}"></li>
                <li><img src="{{ asset('photos/FONDOHOME2.jpg') }}"></li>
                <li><img src="{{ asset('photos/FONDOHOME3.jpg') }}"></li>
                <li><img src="{{ asset('photos/FONDOHOME4.jpg') }}"></li>
                <li><img src="{{ asset('photos/FONDOHOME1.jpg') }}"></li>
                </ul>
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


