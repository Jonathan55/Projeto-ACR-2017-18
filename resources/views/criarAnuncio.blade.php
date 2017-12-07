@extends('layouts.app')

@section('content')

<div id="middle">
	<h2>Adicionar Anuncio</h2>
	
	<form action="/action_page.php">
	  Marca:<br>
	  <input id="campreg" type="text" name="marca" value="">
	  <br>
	  Modelo:<br>
	  <input id="campreg" type="text" name="modelo" value="">
	  <br>
	  Combustível:<br>
	  <input id="campreg" type="text" name="combustivel" value="">
	  <br>
	  Quilómetros:<br>
	  <input id="campreg" type="text" name="quilometros" value="">
	  <br>
	  Potência:<br>
	  <input id="campreg" type="text" name="potencia" value="">
	  <br>
	  Cilindrada:<br>
	  <input id="campreg" type="text" name="cilindrada" value="">
	  <br>
	  Fotos:<br>
	  <input type="file" value="Submeter Foto">
	  <br>
	  <br>
	  <br>
	  <br>
	  <input type="submit" value="Submeter Anuncio">
	</form> 
	
	

	</div>

@endsection