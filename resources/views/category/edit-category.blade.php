<!DOCTYPE html>
<html lang="en">
<head>
    @extends('parts.header_admin')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Category/create-category.css') }}"/> 
</head>
<body style="background-image: url('{{ asset('photos/IMAGEN_ADMIN_FONDO.jpg')}}');">
    <nav>   
        <ul>
            <li><a href="#">Home Admin</a></li>
            <p class="intermedio">></p>
            <li><a href="{{url('category')}}">Listado categorías</a></li>
            <p class="intermedio">></p>
            <li><a href="#">Edición categoría</a></li>
        </ul>
    </nav>
    <section id="agrupar">
        <h1>Edición categoría: {{$category->category_name}}</h1>
        <form method="post" action="{{ url('/category/' . $category->id) }}" id="formulario_crear" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
            <div id="apartado_nombre">
                <div class="apartar_label">
                    <label>Nombre:</label>
                </div>
                <input id="campo_nombre" type="text" value="{{$category->category_name}}" name="category_name">
            </div>
            <div id="apartado_descripcion">
                <div class="apartar_label">
                    <label>Descripción:</label>
                </div>
                <textarea id="campo_descripcion" rows="4" cols="40" name="description">{{$category->description}}</textarea>
            </div>
            <div id="apartado_imagen">
                <div class="apartar_label">
                    <label>Imagen:</label>
                </div>
                <img id="imganterior" src="{{ asset('storage').'/'.$category->picture_file}}" width="100" alt="">
                <input id="campo_imagen" type="file" value="{{$category->picture_file}}" name="picture_file">
            </div>
            <button type="submit" class="botonformulario">Guardar</button>
        </form>
        <div id="imagen">
            <img id="img_categorias" src="{{ asset('photos/CATEGORÍAS_INDEX.jpg') }}">
        </div>
    </section>
</body>

