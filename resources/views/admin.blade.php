@extends('layouts.app') @section('content')

<div id="center">
<h2>Admin</h2>
<ul class="flex-admin">

<div class="galeriaDet">
<p>Marca</p>
      <form class="form-horizontal" method="GET" action="{{ route('eliminarMarca') }}" >
        {{ csrf_field() }}
     <select name="marca"> 
          @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}">{{ $marca->marca }}</option>
          @endforeach
     </select>
     <input class="button" type="submit" value="Remover">
     </form>

      <form class="form-horizontal" method="GET" action="{{ route('adicionarMarca') }}" >
        {{ csrf_field() }}
     <input name="marca" type="text" placeholder="Novo">
     <input class="button" type="submit" value="Adicionar">
     </form>
    
 </div>	

 <div class="galeriaDet">	
 <p>Utilizador</p>
     <form class="form-horizontal" method="GET" action="{{ route('eliminarUser') }}" >
        {{ csrf_field() }}
     <select name="utilizador">
          @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
          @endforeach
     </select>
     <input class="button" type="submit" value="Remover">
     </form>
 </div>		
 </div>
<br>
<br>
<br>
<br>

@endsection