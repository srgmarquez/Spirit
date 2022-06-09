<link rel="stylesheet" type="text/css" href="{{ asset('css/Parts/header_admin.css') }}"/>
<header>
    <div id="logospirit">
        SPIRIT
    </div>
    <a class="enlaceheader" href="{{ url('category') }}" 
                onclick="event.preventDefault();
                document.getElementById('categories-form').submit();">Categorías</a>
    <form id="categories-form" action="{{  url('category') }}" method="GET" class="d-none">
        @csrf
    </form>
    <a class="enlaceheader" href="{{ url('garment') }}" 
                onclick="event.preventDefault();
                document.getElementById('garments-form').submit();">Prendas</a>
    <form id="garments-form" action="{{  url('garment') }}" method="GET" class="d-none">
        @csrf
    </form>
    <a href="#">Pedidos</a>
    <div id="userheaderadmin">
        <div id="imagenheader">
            <img class="iconoheader" src="{{ asset('photos/USUARIO.png') }}"/>
        </div>
        <div id="nameheader">
            Sergio Márquez
        </div>
        <a id="enlaceexit" href="#">
            <img id="iconoexit" src="{{ asset('photos/EXIT.png') }}"/>
        </a>
    </div>
</header>