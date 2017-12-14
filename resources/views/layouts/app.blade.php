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

<div id="pesquisa">
    
    <input id="pesquisa" type="text" name="pesquisa" placeholder="Pesquisa...">
 
    @guest
        <a href="{{ route('login') }}" id="user" style="color: white;">Entrar</a>
        <a href="{{ route('register') }}" id="user" style="color: white;">Registar</a>
    @else
        <a href="{{ route('logout') }}" id="user" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: white;">Logout</a>
        <a href="{{ route('verUtilizador', Auth::user()->id) }}" id="user" style="color: white;">{{ Auth::user()->name }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none; color: white;">
            {{ csrf_field() }}
        </form>
    @endguest

    <a href=""> <img id="shopping-cart" src="{{ asset('icons/shopping-cart.png') }}" alt="shopping-cart"></a>
 
    <a href="{{ route('login') }}"> <img id="user" src="{{ asset('icons/user.png') }}" alt="user"></a>
 
</div>

@yield('content')

<footer>
 
    <p>© 2017 ACR</p><p>
 
</p></footer>
 
</div>

</body>
</html>
