<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Título de la página -->
    <title>SPIRIT-CREARPRENDA</title>
    <!-- Cabecera y hoja de estilos asociada -->
    @extends('parts.header_admin')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Garment/create-garment.css') }}"/> 
</head>
<!-- Imagen de fondo -->
<body style="background-image: url('{{ asset('photos/IMAGEN_ADMIN_FONDO.jpg')}}');">
    <!-- Menú d enavegación de miga de pan-->
    <nav>   
        <ul>
            <li><a href="{{url('index-admin')}}">Home Admin</a></li>
            <p class="intermedio">></p>
            <li><a href="{{url('garment')}}">Listado prendas</a></li>
            <p class="intermedio">></p>
            <li><a href="#">Nueva prenda</a></li>
        </ul>
    </nav>
     <!-- Apartado de creación de prendas -->
    <section id="agrupar">
        <!-- Título -->
        <h1>Crear nueva prenda</h1>
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
        <form method="post" action="{{ url('/garment') }}" id="formulario_crear" enctype="multipart/form-data">
        @csrf
            <div class="apartado">
                <div class="apartar_label">
                    <label>Nombre:</label>
                </div>
                <textarea class="campo"  name="garment_name"  rows="1" cols="40">{{isset($garment->garment_name)?$garment->garment_name:old('garment_name')}}</textarea>
            </div>
            <div class="apartado">
                <div class="apartar_label">
                    <label>Categoria:</label>
                </div>
                <!-- Listado de categorías para elegir a la que pertenecerá esa prenda -->
                <select name="category_id" class="campo">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="apartado">
                <div class="apartar_label">
                    <label>Descripción:</label>
                </div>
                <textarea class="campo" rows="4" cols="40" name="description">{{isset($garment->description)?$garment->description:old('description')}}</textarea>
            </div>
            <div class="apartado">
                <div class="apartar_label">
                    <label>Precio:</label>
                </div>
                <input type="number" step="any" class="campo" name="price" value="{{isset($garment->price)?$garment->price:old('price')}}">
            </div>
            <div class="apartado">
                <div class="apartar_label">
                    <label>Talla:</label>
                </div>
                <textarea class="campo" rows="1" cols="40" name="size">{{isset($garment->size)?$garment->size:old('size')}}</textarea>
            </div>
            <div class="apartado">
                <div class="apartar_label">
                    <label>Imagen:</label>
                </div>
                <input id="campo_imagen" type="file" name="picture_file">
            </div>
            <button type="submit" class="botonformulario">Enviar</button>
        </form>
        <div id="imagen">
            <img id="img_prendas" src="{{ asset('photos/PRENDAS_INDEX.jpg') }}">
        </div>
    </section>
</body>
<!-- Footer -->
@extends('parts.footer')