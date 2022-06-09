<link rel="stylesheet" type="text/css" href="{{ asset('css/Parts/header_user.css') }}"/>
<header>
    <div id="logospirit">
        SPIRIT
    </div>
    <div id="userheaderadmin">
        <div id="imagenheader">
            <a class="dropdown-item" id="enlacecarrito" href="#" 
                onclick="event.preventDefault();
                document.getElementById('carrito-form').submit();">
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
        <div id="nameheader">
            {{ Auth::user()->name }}
        </div>
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