<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
        <div id="agrupar_login">
            <div id="tituloPrinci">
                <h1 id="nombre">SPIRIT</h1>
                <h1 id="slogan">Dress for Success</h1>
            </div>
            <form id="formulariologin">
                <div id="inicio">
                    Inicio
                </div>
                <div id="camponombrelogin">
                    <div id="icononombrelogin">
                    </div>
                    <input type="text" id="userlogin" name="userUserName" placeholder="usuario">
                </div>
                <div id="campopasswordlogin">
                    <div id="iconopasswordlogin">
                    </div>
                    <input type="password" id="passlogin" name="userPassword" placeholder="contraseña">
                </div>
                <div id="campochecklogin">
                    <input type="checkbox" name="checklogin" id="checklogin">
                    <label id="recordatorio">Recuérdame</label>
                    <figcaption>Guardar usuario y contraseña</figcaption>
                </div>
                <input type="button" value="Entrar"  id="botonlogin" onclick=""/>
                <div id="apartadocrearlogin">
                    <p id="textocrearlogin">¿Todavía no tienes una cuenta?</p>
                    <a href="#" id="anclacrearlogin">Incribirse</a>
                </div>
            </form>
        </div>  
    </header>
    <a href="/admin" class="mb-4">Acceso administradora</a>
</body>
</html>