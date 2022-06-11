<!-- Link a la hoja de estilos asociada -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/Parts/header_admin.css') }}"/>
<header>
    <!-- Parte del logo -->
    <div id="logospirit">
        SPIRIT
    </div>
    <!-- Enlace al listado de categorías -->
    <a class="enlaceheader" href="{{ url('category') }}" 
                onclick="event.preventDefault();
                document.getElementById('categories-form').submit();">Categorías</a>
    <form id="categories-form" action="{{  url('category') }}" method="GET" class="d-none">
        @csrf
    </form>
    <!-- Enlace al listado de prendas -->
    <a class="enlaceheader" href="{{ url('garment') }}" 
                onclick="event.preventDefault();
                document.getElementById('garments-form').submit();">Prendas</a>
    <form id="garments-form" action="{{  url('garment') }}" method="GET" class="d-none">
        @csrf
    </form>
    <!-- Enlace al listado de pedidos -->
    <a href="{{ url('order') }}"  onclick="event.preventDefault();
                document.getElementById('orders-form').submit();">Pedidos</a>
    <form id="orders-form" action="{{  url('order') }}" method="GET" class="d-none">
        @csrf
    </form>
    <!-- Aquí esta la parte de información del administrador -->
    <div id="userheaderadmin">
        <!-- Imagen del usuario -->
        <div id="imagenheader">
            <img class="iconoheader" src="{{ asset('photos/USUARIO.png') }}"/>
        </div>
        <!-- Nombre del administrador -->
        <div id="nameheader">
            Sergio Márquez
        </div>
        <!-- Enlace para poder desloggearse -->
        <a class="dropdown-item" id="enlaceexit" href="{{ route('logout') }}" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
            <img id="iconoexit" src="{{ asset('photos/EXIT.png') }}"/>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</header>