<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Título de la página -->
    <title>SPIRIT-REGISTER</title>
    <!-- Hoja de estilos asociada -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/User/user-register.css') }}"/> 
</head>
<body>
    <!-- Cabecera que contiene un slider de fotos -->
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
    <!-- Apartado registro -->
    <section id="agrupar_login">
        <!-- Apartado de titulo y slogan -->
        <div id="tituloPrinci">
            <h1 id="nombre">SPIRIT</h1>
            <h1 id="slogan">Dress for Success</h1>
        </div>
        <!-- Formulario de registro -->
        <form method="POST" action="{{ route('register') }}" id="formularioregistro">
            @csrf
            <!-- Titulo del formulario-->
            <div id="registro">
                Registro
            </div>
            <!-- Campos para rellenar en el registro -->
            <div class="campo">         
                <div class="icono">
                </div>
                <input id="name" type="text" placeholder="nombre" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>        
            <div class="campo">
                <div class="icono">
                </div>
                <input id="email" type="email" placeholder="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="campo">   
                <div class="icono">
                </div>       
                <input id="password" type="password" placeholder="contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="campo"> 
                <div class="icono">
                </div>  
                <input id="password-confirm" type="password" placeholder="confirmar contraseña" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div> 
            <button type="submit" id="botonregistrar"/>Registrar</button> 
            <div id="apartadovolver">
                <p id="textovolverlogin">¿Desea volver al menú de inicio de sesión?</p>
                <a href="{{ route('login') }}" id="anclavolverlogin">Volver</a>
            </div>      
        </form> 
    </section>
</body>

