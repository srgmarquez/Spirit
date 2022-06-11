
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Título de la página -->
    <title>SPIRIT-CATEGORIAS</title>
    <!-- Cabecera y hoja de estilos asociada -->
    @extends('parts.header_admin')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Category/index-category.css') }}"/>  
</head>
<!-- Imagen de fondo -->
<body style="background-image: url('{{ asset('photos/IMAGEN_ADMIN_FONDO.jpg')}}');">
    <!-- Menú d enavegación de miga de pan-->
    <nav>   
        <ul>
            <li><a href="{{url('index-admin')}}">Home Admin</a></li>
            <p class="intermedio">></p>
            <li><a href="#">Categorías</a></li>
        </ul>
    </nav>
    <!-- Apartado listado de categorías -->
    <section id="agrupar">
        <!-- Parte del titulo y botón para crear una nueva categoría -->
        <div id="cabecerasection">
            <h1>Listado Categorías</h1>
            <a id="botonAgregar" href="{{url('category/create')}}">Nueva categoría</a>
        </div>
        <!-- Mensaje de categoría creada -->
        @if (Session::has('mensaje'))
            <p id="titulomensaje">{{Session::get('mensaje')}}</p>
        @endif
        <!-- Tabla de información de las categorías -->
        <table id="tablaCategorias">
            <!-- Cabecera -->
            <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
            </thead>
            <tbody>
                <!-- Se recorren todas las categorías ys e muesztran datos de ellas-->
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->description }}</td>
                    <td> 
                        <!-- Botones para editar o eliminar categorías -->
                        <a id="botoneditar" href="{{ url('/category/' . $category->id . '/edit') }}">Editar</a>  
                        <form action="{{url('/category/' . $category->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <input type="submit" id="botonborrar" value="Borrar">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
<!-- Footer -->
@extends('parts.footer')
