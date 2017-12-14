<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

<div id="pagewrap">

<header>
 
    <h1>{{ config('app.name', 'Laravel') }}</h1>
 
</header>

<div class="topnav" id="myTopnav">

@guest

    <a href="{{ route('login') }}" id="user" style="color: white;">Entrar</a>
    <a href="{{ route('register') }}" id="user" style="color: white;">Registar</a>
@else
    <a href="{{ route('home') }}" id="user" style="color: white;">Página Inicial</a>
    <a href="{{ route('adicionarCarro') }}" id="user" style="color: white;">Adicionar Carro</a>
    <a href="{{ route('verAdmin') }}" id="user" style="color: white;">Admin</a>
    <a href="{{ route('logout') }}" id="user" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: white;">Logout</a>
    <a href="{{ route('verUtilizador', Auth::user()->id ) }}" id="user" style="color: white;">{{ Auth::user()->name }}</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none; color: white;">
        {{ csrf_field() }}
    </form>
@endguest

</div>

@yield('content')

<div id="footer">
    <p>© 2017 ACR</p>
</div>
 
</div>

</body>
</html>
