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
            <img class="img_usuario" src="photos/PRENDAS_INDEX.jpg">
        </div>
        <div id="agrupar_categorias">
            <h4>Categorías</h4>
            <img class="img_usuario" src="photos/CATEGORÍAS_INDEX.jpg">
        </div>
        <div id="agrupar_pedidos">
            <h4>Pedidos</h4>
            <img class="img_usuario" src="photos/PEDIDOS_INDEX.jpg">
        </div>       
    </section>
</body>