@extends('layouts.app') @section('content')

<div id="center">
   <h1>Admin</h1>
   <p>Marca</p>
		<select name="marca">
		<input type="submit" value="Remover">
		<input type="text" placeholder="Novo">
		<input type="submit" value="Adicionar">
        </select>
		
	<p>Modelo</p>
		<select name="modelo">
		<input type="submit" value="Remover">
		<input type="text" placeholder="Novo">
		<input type="submit" value="Adicionar">
		</select>
		
	<p>Utilizador</p>
		<select name="utilizador">
		</select>
		<input type="submit" value="Remover">
	<p>Anuncio</p>
		<select name="anuncio">
		</select>
		<input type="submit" value="Remover">
</div>

@endsection