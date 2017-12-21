@extends('layouts.app') @section('content')

<div id="center">
    <h2>Perfil de {{ Auth::user()->name }}</h2>
		<div class="perfil2">
			<div class="fotoperfil">
			 <img id="div1" src="img/pic1.jpg" alt="Foto Perfil">
			
			
			<p>Nome  {{ Auth::user()->name }}</p>
			<p>Email {{ Auth::user()->email }}</p>
			
			</div>
		</div>
		<div class="perfil3">

			<h3>Anuncios</h3>
			<p>{{ Auth::user()->carros }}</p>
			
			
			
			
			</div>



</div>

@endsection
