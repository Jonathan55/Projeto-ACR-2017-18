@extends('layouts.app') @section('content')

<div id="center">
<h2>Admin</h2>
<ul class="flex-admin">

<div class="galeriaDet">
<p>Marca</p>
     <select name="marca">
     <input class="button" type="submit" value="Remover">
     <input type="text" placeholder="Novo">
     <input class="button" type="submit" value="Adicionar">
     </select>
 </div>	
     <div class="galeriaDet">
 <p>Modelo</p>
     <select name="modelo">
     <input class="button" type="submit" value="Remover">
     <input type="text" placeholder="Novo">
     <input class="button" type="submit" value="Adicionar">
     </select>
 </div>		
 <div class="galeriaDet">	
 <p>Utilizador</p>
     <select name="utilizador">
     </select>
     <input class="button" type="submit" value="Remover">
 </div>		
 </div>
<br>
<br>
<br>
<br>

@endsection