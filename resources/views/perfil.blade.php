@extends('layouts.app') @section('content')

<div id="center">
    <h2>Perfil de {{ Auth::user()->name }}</h2>
	<div class="flez-container">
		<div style="flex-grow: 2">
		<h3>Perfil</h3>
			<h6>Nome:</h6>  <p>{{ Auth::user()->name }}</p>
			<h6>Email:</h6> <p>{{ Auth::user()->email }}</p>
			<h6>Avaliação Media:</h6><p> </p>
		</div>
		<div style="flex-grow: 2">
		<h3>Avaliação</h3>
            <select>
            <option value="" disabled selected>Avalie o Utilizador</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <textarea class="comentarios"></textarea>
            <input class="button" type="submit" value="Avaliar">
		</div>
		<div style="flex-grow: 6">
		<h3>Anuncios</h3>
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
    <div class="perfil1"> 
        <h3>Avaliações do Utilizador</h3>
        <p>Nota:</p>
        <p>Comentário</p>
        <textarea class="comentarios"></textarea>
    </div>
</div>

@endsection
