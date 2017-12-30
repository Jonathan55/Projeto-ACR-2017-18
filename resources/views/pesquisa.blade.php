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

                    <tr>
                        <td class="text-left">Carrinho</td>
                        <td class="text-left"><a href="{{ route('adicionarCarrinho', $carro->id) }}">Adicionar</a></td>
                    </tr>

                </tbody>

            </table>

        </div>
        @endforeach

    </ul>

@endsection