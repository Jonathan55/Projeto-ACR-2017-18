@extends('layouts.app') @section('content')

<div id="center">

    <h2>Carrinho de Compras</h2>
		<hr>
        @foreach(Auth::user()->carrinho_compras as $carro)
		<div class="carrinho1">
			<h3>Produto</h3>
			<p>{{  $carro->marca->marca  }}</p>
		</div>
		<div class="carrinho2">
			<h3></h3>
			<a href="{{ route('eliminarCarrinho',$carro->id) }}" ><input class="button" type="submit" value="Remover"></a>
           
		</div>
		<div class="carrinho3">
			<h3>Preço</h3>
			<p>{{  $carro->preco  }}</p>
		</div>
		<div class="carrinho4">
			<h3>Utilizador</h3>
			<p>{{  $carro->user->name  }}</p>
           
		</div>
        @endforeach
		<hr>
		<div class="carrinhoT">
		<h3>Valor Toral: {{ Auth::user()->carrinho_compras->reduce(function ($carry, $item) {
            return $carry + $item->preco; }) }} </h3>
		<input class="button" type="submit" value="Finalizar">
        <br>
        <br>
        <br>
        <br>
		</div>
   
</div>
        
@endsection
