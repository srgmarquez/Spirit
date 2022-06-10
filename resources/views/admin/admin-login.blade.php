<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SPIRIT-ADMIN</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Admin/admin-login.css') }}"/>
</head>
<body>
    <div id="loginadmin">
        <form id="formulariologinadmin" method="post" action="{{ url('/admin') }}">
        @csrf
            <p id="titleadmin">Spirit</p>
            <p id="titlewelcomeadmin">¡Bienvenid@ administrador!</p>
            @if (Session::has('mensaje'))
                <p id="titulomensaje">{{Session::get('mensaje')}}</p>
            @endif
            <div id="camponombrelogin">
                <div id="icononombrelogin">
                </div>
                <input type="email" id="userlogin" name="adminUserGmail" placeholder="email">
            </div>
            <div id="campopasswordlogin">
                <div id="iconopasswordlogin">
                </div>
                <input type="password" id="passlogin" name="adminUserPassword" placeholder="contraseña">
            </div>
            <button id="botonlogin" type="submit">Entrar</button>
        </form>
    </div>
</body>