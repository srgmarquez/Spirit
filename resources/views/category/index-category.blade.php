
<!DOCTYPE html>
<html lang="en">
<head>
    @extends('parts.header_admin')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Category/index-category.css') }}"/> 
   
</head>
<body style="background-image: url('{{ asset('photos/IMAGEN_ADMIN_FONDO.jpg')}}');">
    <nav>   
        <ul>
            <li><a href="#">Home Admin</a></li>
            <p class="intermedio">></p>
            <li><a href="#">Categorías</a></li>
        </ul>
    </nav>
    <div id="agrupar">
        <div id="cabecerasection">
            <h1>Listado Categorías</h1>
            <a id="botonAgregar" href="{{url('category/create')}}">Nueva categoría</a>
        </div>
        @if (Session::has('mensaje'))
            <p id="titulomensaje">{{Session::get('mensaje')}}</p>
        @endif
        <table id="tablaCategorias">
            <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->description }}</td>
                    <td> 
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
    </div>
</body>
