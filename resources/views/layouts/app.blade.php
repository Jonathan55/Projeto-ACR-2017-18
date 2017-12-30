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
	<div id="paginaTotal">
		<header>
			<h1>{{ config('app.name', 'Laravel') }}</h1>
		</header>
			<nav class="navbar">
				<span class="open-slide">
				  <a href="#" onclick="openSlideMenu()">
					<svg width="30" height="30">
						<path d="M0,5 30,5" stroke="#fff" stroke-width="3"/>
						<path d="M0,14 30,14" stroke="#fff" stroke-width="3"/>
						<path d="M0,23 30,23" stroke="#fff" stroke-width="3"/>
					</svg>
				  </a>
				</span>
				<ul class="navbar-nav">
				@guest
					<li><a href="{{ route('login') }}" id="menu">Entrar</a></li>
					<li><a href="{{ route('register') }}" id="menu">Registar</a></li>
				@else
					<li><a href="{{ route('home') }}" >Página Inicial</a></li>
					<li><a href="{{ route('adicionarCarro') }}" id="menu">Adicionar Carro</a></li>
					<li><a href="{{ route('verAdmin') }}" id="menu">Admin</a></li>
					<li><a href="{{ route('logout') }}" id="menu" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: white;">Logout</a></li>
					<li><a href="{{ route('verUtilizador', Auth::user()->id ) }}" id="menu">{{ Auth::user()->name }}</a></li>
					<li><a href="{{ route('verCarrinho') }}" id="menu">Carrinho</a></li>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none; color: white;">
					{{ csrf_field() }}
					</form>
				@endguest
				</ul>
			</nav>

			<div id="side-menu" class="side-nav">
				<a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
				@guest
					<a href="{{ route('login') }}" id="menu">Entrar</a>
					<a href="{{ route('register') }}" id="menu">Registar</a>
				@else
					<a href="{{ route('home') }}" id="menu">Página Inicial</a>
					<a href="{{ route('adicionarCarro') }}" id="menu">Adicionar Carro</a>
					<a href="{{ route('verAdmin') }}" id="menu">Admin</a>
					<a href="{{ route('logout') }}" id="menu" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: white;">Logout</a>
					<a href="{{ route('verUtilizador', Auth::user()->id ) }}" id="menu">{{ Auth::user()->name }}</a>
					<a href="{{ route('verCarrinho') }}" id="menu">Carrinho</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none; color: white;">
					{{ csrf_field() }}
					</form>
				@endguest
			</div>
		<script>
			function openSlideMenu(){
			  document.getElementById('side-menu').style.width = '250px';
			  document.getElementById('main').style.marginLeft = '250px';
			}

			function closeSlideMenu(){
			  document.getElementById('side-menu').style.width = '0';
			  document.getElementById('main').style.marginLeft = '0';
			}
		</script>
		
	@yield('content')

		<div id="footer">
			<p>© 2017 ACR</p>
		</div>
	</div>
</body>
</html>
