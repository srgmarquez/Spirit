<!DOCTYPE html>
<html lang="en">
<head>
    <title>SPIRIT-{{$category->category_name}}</title>
    @extends('parts.header_user')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/User/user-show-garments.css') }}"/>  
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{url('user')}}">Volver al listado de categorías</a></li>
        </ul>
    </nav>
    <section id="agrupar">
        <h1>Categoría {{$category->category_name}}</h1>
        @foreach ($garments as $garment)
        <div id="agrupargarment">
            <div id="etiquetagarment">
                <div id="parteimagen" style="background-image: url('{{asset('storage').'/'.$garment->picture_file}}')">                                                               
                </div>
                <div id="partetitulo">
                    <h2 id="name">{{$garment->garment_name}}</h2>
                    <p id="description">{{$garment->description}}</p>
                    <p id="size">Talla: {{$garment->size}}</p>
                    <p id="price">{{$garment->price}}€</p>
                    <form id="comprar-form" action="{{ url('/shoping/'. $garment->id) }}" method="POST" class="d-none">
                        @csrf
                        {{ method_field('PATCH') }}
                        <button id="enlace" type="submit">Comprar</button> 
                    </form>                     
                </div>
            </div>
        </div>
        @endforeach
    </section>
</body>


