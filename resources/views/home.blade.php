@extends('layouts.app') @section('content')

<!--Script imagens a passar de 5 em 5s-->

<script type="text/javascript">

    const carros = {!! $carros_mais_vistos->toJson() !!}
    var carro_atual = 0

    function swapImage() {
        carro_atual = ( carro_atual == carros.length-1 ) ? 0 : carro_atual+1
        document.getElementById('imgBanner').src = './storage/'+carros[carro_atual].foto
        document.getElementById('linkBanner').href = './carro/'+carros[carro_atual].id
    }

    window.onload = function () {
        if (carros.length) {
            document.getElementById('imgBanner').src = './storage/'+carros[carro_atual].foto
            document.getElementById('linkBanner').href = './carro/'+carros[carro_atual].id
            setInterval(swapImage, 5000)
        }
    }

</script>
@if($carros_mais_vistos->count() > 0)
<div id="destaques">
    <a id="linkBanner" href=""><img id="imgBanner" src="" alt=""></a>
</div>
@endif
<div id="content">

    <h2>Pesquisar</h2>

    <form action="{{ route('pesquisarCarro') }}">

        <h4>Tipo</h4>

        <select name="tipo">
            <option value="todos" selected>Todos</option>
            <option value="novos">Novos</option>
            <option value="usados">Usados</option>
        </select>

        <h4>Marca</h4>

        <select name="marca">

            @foreach($marcas as $marca)
                <option value="{{ $marca->id }}">{{ $marca->marca }}</option>
            @endforeach

        </select>

        <h4>Preço</h4>

        <label>de</label><input type="text" name="preco_min" value="{{ $preco_min }}">
        <label>até</label><input type="text" name="preco_max" value="{{ $preco_max }}">

        <h4>Ano</h4>

        <label>de</label><input type="text" name="ano_min" value="{{ $ano_min }}">
        <label>até</label><input type="text" name="ano_max" value="{{ $ano_max }}">

        <h4>Quilómetros</h4>

        <label>de</label><input type="text" name="quilometros_min" value="{{ $quilometros_min }}">
        <label>até</label><input type="text" name="quilometros_max" value="{{ $quilometros_max }}">

        <h4>Ordenar por</h4>
        <select name="ordenar">
            <option value="preco" selected>Preço</option>
            <option value="ano">Ano</option>
            <option value="quilometros">Quilometros</option>
        </select>
        <br>
        <input type="radio" name="ordem" value="ASC" checked="checked">ASC
        <input type="radio" name="ordem" value="DESC">DESC
        <br><br>

        <input type="submit" value="Pesquisar">

    </form>

</div>

<div id="middle">

    <h2>Mais Recentes</h2>

    <ul class="flex-container">

        @foreach($carros_mais_recentes as $carro)

        <div class="flex-item">

            <a href="{{ route('verCarro', $carro->id) }}">
                <img id="div1" src="{{asset('storage/'.$carro->foto)}}" alt="anuncio">
            </a>

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

                </tbody>

            </table>

        </div>
        @endforeach


    </ul>

    <h2>Recomendados</h2>

    <ul class="flex-container">
    </ul>

</div>

@endsection