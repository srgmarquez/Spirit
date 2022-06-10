<head>
    <title>SPIRIT-EXIT</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Order/exit-order.css') }}"/> 
</head>
<body>
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
    <div id="agrupar_login">
        <div id="tituloPrinci">
            <h1 id="nombre">SPIRIT</h1>
            <h1 id="slogan">Dress for Success</h1>
        </div>
        <div id="divexit">
            <h2 id="mensaje">Pedido realizado con éxito</h2>
            <p id="agradecimiento">Gracias por comprar en Spirit,   {{ Auth::user()->name }}</p>
            <a class="enlaceexit" id="primero" href="{{ route('login') }}">Volver a comprar</a>
            <a class="enlaceexit" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Salir</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</body>
