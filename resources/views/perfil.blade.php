@extends('layouts.app') @section('content')

<div id="center">
<<<<<<< HEAD
	<h2>Perfil de {{ Auth::user()->name }}</h2>
	<div class="flez-container">
		<div style="flex-grow: 2">
			<h3>Perfil</h3>
				<h6>Nome:</h6>  <p>{{ Auth::user()->name }}</p>
				<h6>Email:</h6> <p>{{ Auth::user()->email }}</p>
				<h6>Avaliação Media:</h6><p> </p>
		</div>
        <div style="flex-grow: 2">
=======
    <h2>Perfil de {{ $user->name }}</h2>
		<div class="perfil2">
			<div class="fotoperfil">
			 <img id="div1" src="img/pic1.jpg" alt="Foto Perfil">
			<p>Nome:  {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Avaliação Media: </p>
            
>>>>>>> alves
            <h3>Avaliação</h3>

            <form method="POST" action="{{ route('avaliar',$user->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        <li style="color: red;">{{ $errors->first() }}</li>
                    </ul>
                </div>
            @endif 
<<<<<<< HEAD
				<select>
				<option name="rating" style="{{ $errors->has('rating') ? ' border-color: red;' : '' }}" disabled selected>Avalie o Utilizador</option>
					<option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>1</option>
					<option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>2</option>
					<option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>3</option>
					<option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>4</option>
					<option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>5</option>
				</select>
=======
        
            <select name="rating" style="{{ $errors->has('rating') ? ' border-color: red;' : '' }}">
            <option disabled selected>Avalie o Utilizador</option>
                <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>1</option>
                <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>2</option>
                <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>3</option>
                <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>4</option>
                <option value="5" {( old('rating') == '5' ? 'selected' : '' }}>5</option>
            </select>
>>>>>>> alves
            <textarea class="comentarios" name="avaliacao" value="{{ old('avaliacao')}}"></textarea>
            <input class="button" type="submit" value="Avaliar">
            </form>
		</div>
		<div style="flex-grow: 6">
		<h3>Anuncios</h3>
<<<<<<< HEAD
			<ul class="flex-container">
			@foreach(Auth::user()->carros as $carro)
				<div class="flex-item">
					@if($carro->fotos->count() > 0)
					<a href="{{ route('verCarro', $carro->id) }}">
						<img id="div1" src="{{asset('storage/'.$carro->fotos[0]->path)}}" alt="anuncio">
					</a>
					@endif
					<hr>
					<table class="table-fill">
						<tbody class="table-hover">
							<!-- Só Marca, Modelo, Preço, Usado ou Novo -->
							<tr>
								<td class="text-left">Utilizador</td>
								<td class="text-left">{{$carro->user->name}}</td>
							</tr>
							<tr>
								<td class="text-left">Combustível</td>
								<td class="text-left">{{$carro->combustivel}}</td>
							</tr>
							<tr>
								<td class="text-left">Cilindrada</td>
								<td class="text-left">{{$carro->cilindrada}}</td>
							</tr>
						</tbody>
					</table>
				</div>      
				@endforeach
			</ul>
 		</div>
	</div>
=======
        <ul class="flex-container">
        @foreach(Auth::user()->carros as $carro)
            <div class="flex-item">

                @if($carro->fotos->count() > 0)
                <a href="{{ route('verCarro', $carro->id) }}">
                    <img id="div1" src="{{asset('storage/'.$carro->fotos[0]->path)}}" alt="anuncio">
                </a>
                @endif
                <hr>

                <table class="table-fill">

                    <tbody class="table-hover">

                        <!-- Só Marca, Modelo, Preço, Usado ou Novo -->

                        <tr>
                            <td class="text-left">Utilizador</td>
                            <td class="text-left">{{$carro->user->name}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Combustível</td>
                            <td class="text-left">{{$carro->combustivel}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Cilindrada</td>
                            <td class="text-left">{{$carro->cilindrada}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>      
            @endforeach
        </ul>
        
    <br><br><br><br>		
    </div>
    <div class="perfil1"> 
            <h3>Avaliações do Utilizador</h3>
            <p>Nota:</p>
            <p>Comentário:</p>
            <textarea class="comentarios"></textarea>
        </div>
>>>>>>> alves
</div>
	
    <div class="perfil1"> 
        <h3>Avaliações do Utilizador</h3>
        <p>Nota:</p>
        <p>Comentário</p>
        <textarea class="comentarios"></textarea>
    </div>


@endsection
