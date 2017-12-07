@extends('layouts.app')

@section('content')

<div id="middle">
	<h2>Registo</h2>
	
	<form action="/action_page.php">
	  Nome de utilizador:<br>
	  <input id="campreg" type="text" name="nomedeutilizador" value="">
	  <br>
	  Nome:<br>
	  <input id="campreg" type="text" name="nome" value="">
	  <br>
	  Apelido:<br>
	  <input id="campreg" type="text" name="apelido" value="">
	  <br>
	  Telefone:<br>
	  <input id="campreg" type="text" name="telefone" value="">
	  <br>
	  Email:<br>
	  <input id="campreg" type="text" name="email" value="">
	  <br>
	  <input type="submit" value="Criar Conta">
	</form> 

	</div>

@endsection