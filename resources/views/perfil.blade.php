@extends('layouts.app') @section('content')

<div id="center">

		<div class="flez-container">
		<div style="flex-grow: 2">
			<h3>Perfil</h3>
			<h6>Nome:</h6>  <p>{{ $user->name }}</p>
            <h6>Email:</h6> <p>{{ $user->email }}</p>
            <h6>Avaliação Média:</h6><p> {{ round( $user->avaliacoes->map(function ($avaliacao){ return $avaliacao->rating;})->avg()) }}</p>

		</div>
        @if(Auth::user() && $user->id != Auth::user()->id)
        <div style="flex-grow: 2">
            <h3>Avaliação</h3>
            <form method="POST" action="{{ route('avaliar',$user->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        <li style="color: red; font-size: 15px; text-align: left;">{{ $errors->first() }}</li>
                    </ul>
                </div>
            @endif
            <select name="rating" style="{{ $errors->has('rating') ? ' border-color: red;' : '' }}">
            <option disabled selected>Avalie o Utilizador</option>
                <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>1</option>
                <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>2</option>
                <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>3</option>
                <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>4</option>
                <option value="5" {( old('rating') == '5' ? 'selected' : '' }}>5</option>
            </select>
            <textarea class="comentarios" name="avaliacao" value="{{ old('avaliacao')}}"></textarea>
            <input class="button" type="submit" value="Avaliar">
            </form>
		</div>
        @endif
		<div style="flex-grow: 6">
			<h3>Anúncios</h3>
			<ul class="flex-container">
			@foreach($user->carros as $carro)
				<div class="flex-item">

					@if($carro->fotos->count() > 0)
					<a href="{{ route('verCarro', $carro->id) }}">
						<img id="div1" src="{{asset('storage/'.$carro->fotos[0]->path)}}" alt="anuncio">
					</a>
					@endif
                    <h3>{{$carro->marca->marca}} {{$carro->modelo}}</h3>
					<table class="table-fill">

						<tbody class="table-hover">

                        <tr>
                            <td class="text-left">Preço</td>
                            <td class="text-right">{{$carro->preco}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Ano</td>
                            <td class="text-right">{{$carro->ano}}</td>
                        </tr>
                        <tr>
                            <td class="text-left">Quilómetros</td>
                            <td class="text-right">{{$carro->quilometros}}</td>
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
            @foreach($user->avaliacoes as $avaliacao)
            <p><b>Utilizador:</b> <a href="{{ route('verUtilizador', $avaliacao->from_user->id) }}">{{ $avaliacao->from_user->name }}</a></p>
	        <p><b>Nota:</b> {{$avaliacao->rating}}</p>
            @if($avaliacao->avaliacao)
	        <p><b>Comentário:</b> {{$avaliacao->avaliacao}}</p>
            @endif
            <hr>
	    	@endforeach
		</div>



@endsection
