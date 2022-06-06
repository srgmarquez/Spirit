<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SPIRIT-ADMIN</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Admin/admin-login.css') }}"/>
</head>
<body>
    <div id="loginadmin">
        <form id="formulariologinadmin">
            <p id="titleadmin">Spirit</p>
            <p id="titlewelcomeadmin">¡Bienvenid@ administrador!</p>
            <div id="camponombrelogin">
                <div id="icononombrelogin">
                </div>
                <input type="text" id="userlogin" name="adminUserName" placeholder="usuario">
            </div>
            <div id="campopasswordlogin">
                <div id="iconopasswordlogin">
                </div>
                <input type="password" id="passlogin" name="adminUserPassword" placeholder="contraseña">
            </div>
            <input type="button" value="Entrar"  id="botonlogin" onclick=""/>
        </form>
    </div>
</body>