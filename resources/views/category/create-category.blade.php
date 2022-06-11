<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Título de la página -->
    <title>SPIRIT-CRATECATEGORIA</title>
    <!-- Cabecera y hoja de estilos asociada -->
    @extends('parts.header_admin')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Category/create-category.css') }}"/> 
</head>
<!-- Imagen de fondo -->
<body style="background-image: url('{{ asset('photos/IMAGEN_ADMIN_FONDO.jpg')}}');">
    <!-- Menú d enavegación de miga de pan-->
    <nav>   
        <ul>
            <li><a href="{{url('index-admin')}}">Home Admin</a></li>
            <p class="intermedio">></p>
            <li><a href="{{url('category')}}">Listado categorías</a></li>
            <p class="intermedio">></p>
            <li><a href="#">Nueva categoría</a></li>
        </ul>
    </nav>
     <!-- Apartado de creación de categorías -->
    <section id="agrupar">
        <!-- Título -->
        <h1>Crear nueva categoría</h1>
        <!-- Si hay errores a la hora de rellenar el formulario, los mostrará -->
        @if (count($errors)>0)
            <!-- Mensaje por defecto-->
            <p id="tituloerrores">Hay errores en el formulario</p>
             <!-- Listado de errores -->
            <div id="mensaje" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li id="errores">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Formulario de creación de una prenda -->
        <form method="post" action="{{ url('/category') }}" id="formulario_crear" enctype="multipart/form-data">
        @csrf
            <div id="apartado_nombre">
                <div class="apartar_label">
                    <label>Nombre:</label>
                </div>
                <textarea id="campo_nombre"  name="category_name"  rows="1" cols="40">{{isset($category->category_name)?$category->category_name:old('category_name')}}</textarea>
            </div>
            <div id="apartado_descripcion">
                <div class="apartar_label">
                    <label>Descripción:</label>
                </div>
                <textarea id="campo_descripcion" rows="4" cols="40" name="description">{{isset($category->desciption)?$category->description:old('description')}}</textarea>
            </div>
            <div id="apartado_imagen">
                <div class="apartar_label">
                    <label>Imagen:</label>
                </div>
                <input id="campo_imagen" type="file" name="picture_file">
            </div>
            <button type="submit" class="botonformulario">Enviar</button>
        </form>
        <div id="imagen">
            <img id="img_categorias" src="{{ asset('photos/CATEGORÍAS_INDEX.jpg') }}">
        </div>
    </section>
</body>
<!-- Footer -->
@extends('parts.footer')
