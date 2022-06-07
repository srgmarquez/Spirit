<!DOCTYPE html>
<html lang="en">
<head>
    @extends('parts.header_user')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/User/user-list-categories.css') }}"/>  
</head>
<body>
    <div id="agrupar">
        <h1>CATEGORÍAS</h1>
        @foreach($categories as $category)
        <div id="agruparcategoria">
            <div id="etiquetacategoria">
                <div id="parteimagen" style="background-image: url('{{asset('storage').'/'.$category->picture_file}}')">
                </div>
                <div id="partetitulo">
                    <p id="titulo">{{$category->category_name}}</p>
                    <p id="descripcion">{{$category->description}}</p>
                    <a id="enlace" href="#">Entrar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</body>