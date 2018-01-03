@extends('layouts.app') @section('content')

<div id="center">
	<div id="paginaRecibo">
		<div class="bordaRecibo">
			<header>
                <h1>Compra #{{$compra->id}}</h1>
                <h3>{{ $compra->created_at }}</h3>
				<p>Nome:  {{ $compra->user->name }}</p>
                <p>Email: {{ $compra->user->email }}</p>
			</header>
            <div id="center">
                <h2>Carros</h2>
                <hr>
                    @foreach($compra->carros_comprados as $carro)

					<div class="recibo">
						<h4>Preço</h4>
                        <p>{{ $carro->preco }}</p>  
                   </div>
					<div class="recibo">
						<h4>Utilizador</h4>
                        <p><a href="{{ route('verUtilizador', $carro->user_id) }}">{{ $carro->name }}</a><p>
                   </div>
                   <div class="recibo">
                        <h4>Carro</h4>
                        <p><a href="{{ route('verCarro', $carro->carro_id) }}">{{ $carro->marca }} {{ $carro->modelo }}</a></p>
					</div>
                    @endforeach		
            </div>
			<section> 
				<h3>
                    Valor Total:    {{ 
                                        $compra->carros_comprados->reduce(function ($carry, $item) {
				                            return $carry + $item->preco; 
                                        })
                                    }}
                </h3>
			</section>
        </div>
	</div>
</div>

@endsection