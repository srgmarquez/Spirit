<link rel="stylesheet" type="text/css" href="{{ asset('css/Parts/header_user.css') }}"/>
<header>
    <div id="logospirit">
        SPIRIT
    </div>
    <div id="userheaderadmin">
        <div id="imagenheader">
            <img class="iconoheader" src="{{ asset('photos/USUARIO.png') }}"/>
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