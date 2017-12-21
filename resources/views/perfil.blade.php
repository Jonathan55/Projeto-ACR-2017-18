@extends('layouts.app') @section('content')

<div id="center">
    <h2>Perfil de {{ Auth::user()->name }}</h2>
		<div class="perfil2">
			<div class="fotoperfil">
			 <img id="div1" src="img/pic1.jpg" alt="anuncio">
			
			
			<p>Nome  {{ Auth::user()->name }}</p>
			<p>idade  ..........</p>
			<p>Morada  ..............</p>
			
			</div>
		</div>
		<div class="perfil3">

			<p>Anuncios</p>
			<p>Anuncios</p>
			<p>Anuncios</p>
			<p>Anuncios</p>
			
			
			
			</div>



</div>

@endsection
