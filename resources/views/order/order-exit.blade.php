<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Titulo  -->
    <title>SPIRIT-EXIT</title>
    <!-- Hoja de estilos asociada -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Order/exit-order.css') }}"/> 
</head>
<body>
    <!-- Header cque contrendrá un slider de fotos -->
    <header>
        <div id="agrupar_imagenes_login">
            <div id="portada_imagenes">
                <ul>
                <li><img src="{{ asset('photos/PORTADA1.jpg') }}"></li>
                <li><img src="{{ asset('photos/PORTADA2.jpg') }}"></li>
                <li><img src="{{ asset('photos/PORTADA3.jpg') }}"></li>
                <li><img src="{{ asset('photos/PORTADA1.jpg') }}"></li>
                </ul>
            </div>
        </div>
    </header>
    <section id="agrupar_login">
        <div id="tituloPrinci">
            <!-- Apartado del nombre y el slogan -->
            <h1 id="nombre">SPIRIT</h1>
            <h1 id="slogan">Dress for Success</h1>
        </div>
        <div id="divexit">
            <!-- Mensaje de pedido realizado con éxito y agradecimiento-->
            <h2 id="mensaje">Pedido realizado con éxito</h2>
            <p id="agradecimiento">Gracias por comprar en Spirit,   {{ Auth::user()->name }}</p>
            <!-- Botones para seguir comprando y para salir de la aplicación(Desloggearse) -->
            <a class="enlaceexit" id="primero" href="{{ route('login') }}">Volver a comprar</a>
            <a class="enlaceexit" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Salir</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </section>
</body>

