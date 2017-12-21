@extends('layouts.app') @section('content')

<!--Script imagens a passar de 5 em 5s-->

<script type="text/javascript">

    const carros = {!! $carros_mais_vistos->toJson() !!}
    var carro_atual = 0

    function swapImage() {
        carro_atual = ( carro_atual == carros.length-1 ) ? 0 : carro_atual+1
        document.getElementById('imgBanner').src = './storage/'+carros[carro_atual].fotos[0].path
        document.getElementById('linkBanner').href = './carro/'+carros[carro_atual].id
    }

    window.onload = function () {
        if (carros.length) {
            document.getElementById('imgBanner').src = './storage/'+carros[carro_atual].fotos[0].path
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

        <h4>Estado</h4>

        <select name="estado">
            <option></option>
            <option value="0">Novo</option>
            <option value="1">Usado</option>
        </select>

        <h4>Marca</h4>

        <select name="marca">

            @foreach($marcas as $marca)
                <option value="{{ $marca->id }}">{{ $marca->marca }}</option>
            @endforeach

        </select>

        <h4>Preço</h4>

        <label>de</label><input type="text" name="preco_min" value="{{ $preco_min }}" style="{{ $errors->has('preco_min') ? ' border-color: red;' : '' }}">
         @if ($errors->has('preco_min'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('preco_min') }}</small>
            </span>
            <br>
        @endif
        <label>até</label><input type="text" name="preco_max" value="{{ $preco_max }}" style="{{ $errors->has('preco_max') ? ' border-color: red;' : '' }}">
           @if ($errors->has('preco_max'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('preco_max') }}</small>
            </span>
            <br>
        @endif

        <h4>Ano</h4>

        <label>de</label><input type="text" name="ano_min" value="{{ $ano_min }}" style="{{ $errors->has('ano_min') ? ' border-color: red;' : '' }}">
           @if ($errors->has('ano_min'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('ano_min') }}</small>
            </span>
            <br>
        @endif
        <label>até</label><input type="text" name="ano_max" value="{{ $ano_max }}" style="{{ $errors->has('ano_max') ? ' border-color: red;' : '' }}">
           @if ($errors->has('ano_max'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('ano_max') }}</small>
            </span>
            <br>
        @endif

        <h4>Quilómetros</h4>

        <label>de</label><input type="text" name="quilometros_min" value="{{ $quilometros_min }}" style="{{ $errors->has('quilometros_min') ? ' border-color: red;' : '' }}">
             @if ($errors->has('quilometros_min'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('quilometros_min') }}</small>
            </span>
            <br>
        @endif

        <label>até</label><input type="text" name="quilometros_max" value="{{ $quilometros_max }}" style="{{ $errors->has('quilometros_max') ? ' border-color: red;' : '' }}">
             @if ($errors->has('quilometros_max'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('quilometros_max') }}</small>
            </span>
            <br>
        @endif


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

        <input class="button" type="submit" value="Pesquisar">

    </form>

</div>

<div id="middle">

    @yield('cars')

</div>

@endsection