<!DOCTYPE html>
<html lang="en">
<head>
    @extends('parts.header_admin')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Garment/create-garment.css') }}"/> 
</head>
<body style="background-image: url('{{ asset('photos/IMAGEN_ADMIN_FONDO.jpg')}}');">
    <nav>   
        <ul>
            <li><a href="#">Home Admin</a></li>
            <p class="intermedio">></p>
            <li><a href="#">Listado prendas</a></li>
            <p class="intermedio">></p>
            <li><a href="#">Nueva prenda</a></li>
        </ul>
    </nav>
    <section id="agrupar">
        <h1>Crear nueva prenda</h1>
        @if (count($errors)>0)
            <p id="tituloerrores">Hay errores en el formulario</p>
            <div id="mensaje" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li id="errores">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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