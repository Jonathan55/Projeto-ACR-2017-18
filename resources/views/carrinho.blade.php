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
			<h3>Carro</h3>
			<p><a href="{{ route('verCarro', $carro->id) }}">{{  $carro->marca->marca  }} {{  $carro->modelo  }}</a></p>
		</div>
        <div class="carrinhoUPR">
			<h3></h3>
			<a href="{{ route('eliminarCarrinho',$carro->id) }}" ><input class="button" type="submit" value="Remover"></a>
		</div>
		<div class="carrinhoUPR">
			<h3>Preço</h3>
			<p>{{ $carro->preco }}</p>
		</div>
		<div class="carrinhoUPR">
			<h3>Utilizador</h3>
			<p><a href="{{ route('verUtilizador', $carro->user->id) }}">{{ $carro->user->name }} ({{ $carro->user->email }})</a></p>
		</div>
    @endforeach
		<hr>
		<div class="carrinhoTotal">
        @if(Auth::user()->carrinho_compras->count() > 0)
      
		<h3>Valor Total: {{ Auth::user()->carrinho_compras->reduce(function ($carry, $item) {
            return $carry + $item->preco; }) }} €</h3>
        @else
        <h3>Valor Total: 0.00 €</h3>
        @endif
 
        <form action="{{ route('comprar') }}">
		<input class="button" type="submit" value="Finalizar">
        <br><br>
		</form>

		</div>

</div>


@endsection
