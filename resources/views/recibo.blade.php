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
                        <small></small>           
                   </div>
					<div class="recibo">
						<h4>Utilizador</h4>
                        <p>{{ $carro->name }}<p>
                        <small>{{ $carro->email }}</small>
                   </div>
                   <div class="recibo">
                        <h4>Carro</h4>
                        <p>{{ $carro->marca }} {{ $carro->modelo }}</p>
                        <small></small>
					</div>
                    @endforeach		
            </div>
			<section> 
				<h3>
                    Valor Total:    {{ $compra->carros_comprados->reduce(function ($carry, $item) {
				                            return $carry + $item->preco; 
                                        })
                                    }}
                </h3>
			</section>
        </div>
	</div>
</div>

@endsection