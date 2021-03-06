<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Título de la página -->
    <title>SPIRIT-CARRITO(COMPRA)</title>
    <!-- Cabecera y hoja de estilos asociada -->
    @extends('parts.header_user')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/Order/create-order.css') }}"/>  
</head>
<body>
     <!-- Menú d enavegación para volver al listado del carrito-->
    <nav>   
        <ul>
            <li><a href="{{url('shoping')}}">Volver al listado del carrito</a></li>
        </ul>
    </nav>
    <!-- seccion de pago -->
    <section id="agrupar">
        <!-- Titulo -->
        <div id="cabecera">
            <h1>Introducción de datos bancarios</h1>
        </div>
        <!-- Mensajes de error en el formulario -->
        @if (count($errors)>0)
            <!-- Titulo del error-->
            <p id="tituloerrores">Hay errores en el formulario</p>
            <!-- Errores -->
            <div id="mensaje" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li id="errores">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Si el usuario que ha introducido no se encuentra en la base de datos -->
        @if ($mensaje == "si")
            <p id="titulomensaje">Usuario introducido: inválido</p>
        @endif
        <!-- Formulario para introducir los datos de pago -->
        <form method="post" action="{{ url('/order') }}">
        @csrf
            <div id="agruparformulario">
                <div class="apartado">
                    <label>Propietario</label>
                    <input type="text" class="texto" name="owner">
                </div>
                <div class="apartado">
                    <label for="cvv">CVV</label>
                    <input type="number" class="texto" name="cvv" id="cvv">
                </div>
                <div class="apartado" id="card-number-field">
                    <label>Número de tarjeta</label>
                    <input type="number" class="texto" id="cardNumber" name="cardNumber">
                </div>
                <div class="apartado" id="expiration-date">
                    <label>Fecha de expiración</label>
                    <select>
                        <option value="01">January</option>
                        <option value="02">February </option>
                        <option value="03">March</option>
                        <option value="04">April</option>
                        <option value="05">May</option>
                        <option value="06">June</option>
                        <option value="07">July</option>
                        <option value="08">August</option>
                        <option value="09">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                    </select>
                    <select>
                        <option value="16"> 2016</option>
                        <option value="17"> 2017</option>
                        <option value="18"> 2018</option>
                        <option value="19"> 2019</option>
                        <option value="20"> 2020</option>
                        <option value="21"> 2021</option>
                    </select>
                </div>
                <div class="apartado">
                    <img src="{{ asset('photos/TARJETAS_ACEPTADAS.jpg') }}" id="imgtarjetas">
                    <p id="textotarjetas">Tarjetas acepatadas: VISA, Masercard e Imax</p>
                </div>
                <button type="submit"  id="confirm">Confirmar</button>         
            </div>
        </form>
    </section>
</body>
<!-- Footer -->
@extends('parts.footer')