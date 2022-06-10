<!DOCTYPE html>
<html lang="en">
<head>
    @extends('parts.header_admin')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Garment/create-garment.css') }}"/> 
</head>
<body style="background-image: url('{{ asset('photos/IMAGEN_ADMIN_FONDO.jpg')}}');">
    <nav>   
        <ul>
            <li><a href="{{url('index-admin')}}">Home Admin</a></li>
            <p class="intermedio">></p>
            <li><a href="{{url('garment')}}">Listado prendas</a></li>
            <p class="intermedio">></p>
            <li><a href="#">Edición prenda</a></li>
        </ul>
    </nav>
    <section id="agrupar">
        <h1>Edición prenda: {{$garment->garment_name}}</h1>
        <form method="post" action="{{ url('/garment/' . $garment->id) }}" id="formulario_crear" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
        <div class="apartado">
                <div class="apartar_label">
                    <label>Nombre:</label>
                </div>
                <textarea class="campo"  name="garment_name"   rows="1" cols="40">{{$garment->garment_name}}</textarea>
            </div>
            <div class="apartado">
                <div class="apartar_label">
                    <label>Categoria:</label>
                </div>
                <input type="number" value="{{$garment->category_id}}" class="campo" name="category_id">
            </div>
            <div class="apartado">
                <div class="apartar_label">
                    <label>Descripción:</label>
                </div>
                <textarea class="campo" rows="4" cols="40" name="description">{{$garment->description}}</textarea>
            </div>
            <div class="apartado">
                <div class="apartar_label">
                    <label>Precio:</label>
                </div>
                <input type="number" value="{{$garment->price}}" step="any" class="campo" name="price">
            </div>
            <div class="apartado">
                <div class="apartar_label">
                    <label>Talla:</label>
                </div>
                <textarea class="campo" rows="1" cols="40" name="size">{{$garment->size}}</textarea>
            </div>
            <div class="apartado">
                <div class="apartar_label">
                    <label>Imagen:</label>
                </div>
                <img id="imganterior" src="{{ asset('storage').'/'.$garment->picture_file}}" width="100" alt="">
                <input id="campo_imagen" type="file" name="picture_file">
            </div>
            <button type="submit" class="botonformulario">Guardar</button>
        </form>
        <div id="imagen">
            <img id="img_prendas" src="{{ asset('photos/PRENDAS_INDEX.jpg') }}">
        </div>
    </section>
</body>
@extends('parts.footer')