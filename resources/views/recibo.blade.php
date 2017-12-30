@extends('layouts.app') @section('content')

<div id="center">
	<div id="paginaRecibo">
		<div class="bordaRecibo">
			<header>
						<p>Nome  {{ Auth::user()->name }}</p>
                        <p>Email {{ Auth::user()->email }}</p>         
			</header>
            <div id="center">
                <h2>Carrinho de Compras</h2>
                <hr>
                    @foreach(Auth::user()->carrinho_compras as $carro)
                    <div class="recibo">
                        <h4>Produto</h4>
                        <p>{{  $carro->marca->marca  }}</p>                
					</div>
					<div class="recibo">
						<h4>Preço</h4>
                        <p>{{  $carro->preco  }}</p>                
                   </div>
					<div class="recibo">
						<h4>Utilizador</h4>
                        <p>{{  $carro->user->name  }}</p>
                   </div>					
                    @endforeach		
            </div>
			<section> 
				<h3>Valor Toral: {{ Auth::user()->carrinho_compras->reduce(function ($carry, $item) {
				return $carry + $item->preco; }) }}</h3>
			</section>
        </div>
	</div>
</div>

@endsection