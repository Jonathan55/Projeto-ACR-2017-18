@extends('layouts.app') @section('content')

<div id="center">

    <h2>Carrinho de Compras</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <li style="color: red;">{{ $errors->first() }}</li>
            </ul>
        </div>
    @endif 
		<hr>
        @foreach(Auth::user()->carrinho_compras as $carro)
		<div class="carrinhoProduto">
			<h3>Produto</h3>
			<p>{{  $carro->marca->marca  }}</p>
		</div>
		<div class="carrinhoUPR">
			<h3></h3>
			<a href="{{ route('eliminarCarrinho',$carro->id) }}" ><input class="button" type="submit" value="Remover"></a>
		</div>
		<div class="carrinhoUPR">
			<h3>Preço</h3>
			<p>{{  $carro->preco  }}</p>
		</div>
		<div class="carrinhoUPR">
			<h3>Utilizador</h3>
			<p>{{  $carro->user->name  }}</p>
		</div>
    @endforeach
		<hr>
		<div class="carrinhoTotal">
		<h3>Valor Total: {{ Auth::user()->carrinho_compras->reduce(function ($carry, $item) {
            return $carry + $item->preco; }) }} </h3>
        <form action="{{ route('comprar') }}">
		<input class="button" type="submit" value="Finalizar">
		</form>

		</div>
   
</div>
        
@endsection
