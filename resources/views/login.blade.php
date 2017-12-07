@extends('layouts.app')

@section('content')

<div id="middle">
	<h2>Login</h2>
	
	<form action="/action_page.php">
	  Nome de utilizador:<br>
	  <input id="campreg" type="text" name="nomedeutilizador" value="">
	  <br>
	  Email:<br>
	  <input id="campreg" type="password" name="password" value="">
	  <br>
	  <br>
	  <input type="submit" value="Login">
	  <br>
	  <br>
	</form> 
	
	

	</div>

@endsection