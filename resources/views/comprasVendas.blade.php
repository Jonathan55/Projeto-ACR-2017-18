@extends('layouts.app') @section('content')

<div id="center">
    <h2>Compras</h2>
	<div class="flez-container">
		<table class="table-fill">
			<tbody class="table-hover">
				<tr>
					<td class="text-left"><b>ID</b></td>
					<td class="text-left"><b>Data</b></td>
                    <td class="text-left"><b>Valor Total</b></td>
				</tr>
                @foreach(Auth::user()->compras as $compra)
                <tr>
                    <td class="text-left"><a href="{{ route('verRecibo', $compra->id) }}">{{ $compra->id }}</a></td>
					<td class="text-left">{{ $compra->created_at }}</td>
                    <td class="text-left">  {{ 
                                                $compra->carros_comprados->reduce(function ($carry, $item) {
                                                    return $carry + $item->preco; 
                                                })
                                            }} €</td>
                </tr>
                @endforeach
			</tbody>
	    </table>
    </div>
    <h2>Vendas</h2>
	<div class="flez-container">
		<table class="table-fill">
			<tbody class="table-hover">
				<tr>
					<td class="text-left"><b>Compra ID</b></td>
					<td class="text-left"><b>Data</b></td>
                    <td class="text-left"><b>Utilizador</b></td>
                    <td class="text-left"><b>Carro</b></td>
                    <td class="text-left"><b>Valor</b></td>
				</tr>
                @foreach(Auth::user()->carros_vendidos as $carro_vendido)
                <tr>
                    <td class="text-left"><a href="{{ route('verRecibo', $carro_vendido->compra->id) }}">{{ $carro_vendido->compra->id }}</a></td>
					<td class="text-left">{{ $carro_vendido->created_at }}</td>
                    <td class="text-left"><a href="{{ route('verUtilizador', $carro_vendido->compra->user->id) }}">{{ $carro_vendido->compra->user->name }} ({{ $carro_vendido->compra->user->email }})</a></td>
                    <td class="text-left"><a href="{{ route('verCarro', $carro_vendido->carro_id) }}">{{ $carro_vendido->marca }} {{ $carro_vendido->modelo }}</a></td>
                    <td class="text-left">{{ $carro_vendido->preco }} €</td>
                </tr>
                @endforeach
			</tbody>
	    </table>
    </div>
</div>

@endsection
