<head>
    <title>SPIRIT</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/User/user-login.css') }}"/> 
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
        <form method="POST" action="{{ route('login') }}" id="formulariologin">
            @csrf
            <div id="inicio">
                Inicio
            </div>
            <div id="camponombrelogin">
                <div id="icononombrelogin">
                </div>
                <input id="email" placeholder="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div id="campopasswordlogin">
                <div id="iconopasswordlogin">
                </div>
                <input id="password" placeholder="contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div id="campochecklogin">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label id="recordatorio">Recuérdame</label>
                <figcaption>Guardar usuario y contraseña</figcaption>
            </div>
            <button type="submit"   id="botonlogin"/>Entrar</button>
            <div id="apartadocrearlogin">
                <p id="textocrearlogin">¿Todavía no tienes una cuenta?</p>
                <a href="{{ route('register') }}" id="anclacrearlogin">Incribirse</a>
            </div>           
        </form>
    </div>
</body>

