<!DOCTYPE html>
<html lang="en">
<head>
    @extends('parts.header_admin')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Garment/index-garment.css') }}"/> 
   
</head>
<body style="background-image: url('{{ asset('photos/IMAGEN_ADMIN_FONDO.jpg')}}');">   
    <nav>   
        <ul>
            <li><a href="#">Home Admin</a></li>
            <p class="intermedio">></p>
            <li><a href="#">Prendas</a></li>
        </ul>
    </nav>
    <div id="agrupar">
        <div id="cabecerasection">
            <h1>Listado Prendas</h1>
            <a id="botonAgregar" href="{{url('garment/create')}}">Nueva prenda</a>
        </div>
        @if (Session::has('mensaje'))
            <p id="titulomensaje">{{Session::get('mensaje')}}</p>
        @endif
        <table id="tablaPrendas">
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
                @php
                    $contador = 0;
                @endphp
                @foreach($garments as $garment)
                <tr>
                    <td>{{ $garment->garment_name }}</td>
                    <td>{{ $garment->description }}</td>
                    @php
                        $category_name = DB::select('SELECT category_name FROM categories WHERE id = ?', [$garment->category_id]);
                        foreach ($category_name as $value) {
                            $array[] = $value->category_name;
                        }
                        $name = $array[$contador];
                        $contador++;
                    @endphp
                    <td>{{ $name}}</td>
                    <td>{{ $garment->price }}</td> 
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
      
    </div>
</body>
