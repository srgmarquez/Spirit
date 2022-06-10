<!DOCTYPE html>
<html lang="en">
<head>
    @extends('parts.header_admin')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Admin/admin-index.css') }}"/>  
</head>
<body>
    <nav>
        <ol>
            <li><a href="#">Home Admin</a></li>
        </ol>
    </nav>
    <section id="agrupar">
        <h2>Secciones</h2>
        <div id="agrupar_prendas">
            <h4>Prendas</h4>
            <a class="dropdown-item" href="{{ url('garment') }}" 
                onclick="event.preventDefault();
                document.getElementById('garments-form').submit();">
                <img class="img_usuario" src="photos/PRENDAS_INDEX.jpg">
            </a>
            <form id="garments-form" action="{{  url('garment') }}" method="GET" class="d-none">
                 @csrf
            </form>
        </div>
        <div id="agrupar_categorias">
            <h4>Categorías</h4>
            <a class="dropdown-item" href="{{ url('category') }}" 
                onclick="event.preventDefault();
                document.getElementById('categories-form').submit();">
                <img class="img_usuario" src="photos/CATEGORÍAS_INDEX.jpg">
            </a>
            <form id="categories-form" action="{{  url('category') }}" method="GET" class="d-none">
                 @csrf
            </form>
        </div>
        <div id="agrupar_pedidos">
            <h4>Pedidos</h4>
            <a class="dropdown-item" href="{{ url('order') }}" 
                onclick="event.preventDefault();
                document.getElementById('orders-form').submit();">
                <img class="img_usuario" src="photos/PEDIDOS_INDEX.jpg">
            </a>
            <form id="garments-form" action="{{  url('order') }}" method="GET" class="d-none">
                 @csrf
            </form>
        </div>       
    </section>
</body>
@extends('parts.footer')

