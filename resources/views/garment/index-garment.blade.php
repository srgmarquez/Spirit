<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Título de la página -->
    <title>SPRITI-PRENDAS</title>
    <!-- Cabecera y hoja de estilos asociada -->
    @extends('parts.header_admin')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Garment/index-garment.css') }}"/> 
</head>
<!-- Imagen de fondo -->
<body style="background-image: url('{{ asset('photos/IMAGEN_ADMIN_FONDO.jpg')}}');">  
    <!-- Menú d enavegación de miga de pan-->
    <nav>   
        <ul>
            <li><a href="{{url('index-admin')}}">Home Admin</a></li>
            <p class="intermedio">></p>
            <li><a href="#">Prendas</a></li>
        </ul>
    </nav>
    <!-- Apartado listado de prendas -->
    <section id="agrupar">
        <!-- Parte del titulo y botón para crear una nueva prenda -->
        <div id="cabecerasection">
            <h1>Listado Prendas</h1>
            <a id="botonAgregar" href="{{url('garment/create')}}">Nueva prenda</a>
        </div>
        <!-- Mensaje de prenda creada -->
        @if (Session::has('mensaje'))
            <p id="titulomensaje">{{Session::get('mensaje')}}</p>
        @endif
        <!-- Tabla de información de las prendas -->
        <table id="tablaPrendas">
            <!-- Cabecera -->
            <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
            </thead>
            <tbody>
                 <!-- Cuerpo de la tabla-->
                <!-- Se declará una variable contador -->
                @php
                    $contador = 0;
                @endphp
                <!-- Se recorre el array de todas las prendas -->
                @foreach($garments as $garment)
                <tr>
                    <!-- Información de la prenda -->
                    <td>{{ $garment->garment_name }}</td>
                    <td>{{ $garment->description }}</td>

                    @php
                        //Aquí se realiza una consulta para obtener el nombre de la categoria de esa prenda 
                        $category_name = DB::select('SELECT category_name FROM categories WHERE id = ?', [$garment->category_id]);
                        // La consulta devuelve un array json de valores por lo que hay que recorrerlo
                        foreach ($category_name as $value) {
                            // Se guarda en un array normal el valor del campo nombre
                            $array[] = $value->category_name;
                        }
                        //Como por cada prenda se irá añadiendo un nombre, utilizamos la variable contador para obtener el nombre de esa posición
                        $name = $array[$contador];
                       //Sumamos uno al contador para luego utilizar el siguiente nombre
                        $contador++;
                    @endphp
                    <!-- Mostramos el nombre de la categoría -->
                    <td>{{ $name}}</td>
                    <!-- Algún dato más de la prenda -->
                    <td>{{ $garment->price }}</td> 
                    <!-- Dos botones : para editar o eliminar la prenda -->
                    <td> 
                        <a id="botoneditar" href="{{ url('/garment/' . $garment->id . '/edit') }}">Editar</a>  
                        <form action="{{url('/garment/' . $garment->id)}}" method="post">
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