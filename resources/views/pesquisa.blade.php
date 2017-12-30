@extends('sidebar') @section('cars')

    <h2>Resultados</h2>

    <ul class="flex-container">

        @foreach($carros_pesquisados as $carro)
        <div class="flex-item">

            @if($carro->fotos->count() > 0)
            <a href="{{ route('verCarro', $carro->id) }}">
                <img id="div1" src="{{asset('storage/'.$carro->fotos[0]->path)}}" alt="anuncio">
            </a>
            @endif

            <h2>{{$carro->marca->marca}} {{$carro->modelo}}</h2>

            <hr>

            <table class="table-fill">

                <tbody class="table-hover">

                    <!-- Só Marca, Modelo, Preço, Usado ou Novo -->

                    <tr>
                        <td class="text-left">Utilizador</td>
                        <td class="text-right"><a href="{{ route('verUtilizador', $carro->user->id) }}">{{$carro->user->name}}</a></td>
                    </tr>
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

            @if (Auth::user() && Auth::user()->id != $carro->user->id)
            <br>
            <a href="{{ route('adicionarCarrinho', $carro->id) }}"><button>Adicionar ao carrinho</button></a>
            <br><br>
            @endif

        </div>
        @endforeach

    </ul>

@endsection