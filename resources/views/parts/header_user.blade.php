<!-- Link a la hoja de estilos asociada -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/Parts/header_user.css') }}"/>
<header>
    <!-- Parte del logo -->
    <div id="logospirit">
        SPIRIT
    </div>
    <!-- Parte del usuario -->
    <div id="userheaderadmin">
        <!-- Parte de la imagen del carrito -->
        <div id="imagenheader">
            <!-- Al hacer click sobre el carrito te llevará a la página del carrito donde podrás ver las prendas compradas -->
            <a class="dropdown-item" id="enlacecarrito" href="#" 
                onclick="event.preventDefault();
                document.getElementById('carrito-form').submit();">
                <!-- Se contarán las prendas que hay compradas, si hay como mínimo una el carrito tendrá un borde rojo sino, lo tendrá blanco -->
                @php 
                    $prendas = $_SESSION['prendas'];
                    $numero_prendas = count($prendas);
                @endphp
                @if ($numero_prendas >= 1 )
                    <img class="iconoheader" style="border:3px solid red" src="{{ asset('photos/ICONO-CARRITO.png') }}"/>
                @else
                    <img class="iconoheader" src="{{ asset('photos/ICONO-CARRITO.png') }}"/>
                @endif
                <form id="carrito-form" action="{{ url('shoping') }}" method="GET" class="d-none"> 
                    @csrf
                </form>
            </a>
        </div>
        <!-- Luego se muestra el nombre del usuario loggeado -->
        <div id="nameheader">
            {{ Auth::user()->name }}
        </div>
        <!-- Y por último el icono para podes desloggearte, haciendo clic sobre él-->
        <div id="contenedorenlace">
             <a class="dropdown-item" id="enlaceexit" href="{{ route('logout') }}" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <img id="iconoexit" src="{{ asset('photos/EXIT.png') }}"/>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
            </form>
        </div>
    </div>
</header>