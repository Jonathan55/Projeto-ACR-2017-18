@extends('layouts.app') @section('content')

<div id="middle">
    <h2>Adicionar Anuncio</h2>

    <form class="form-horizontal" method="POST" action="{{ route('adicionarCarro') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        Marca:
        <br>
        <select id="campreg" name="marca">
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}" {{ (old('marca') == $marca->id ? 'selected' : '' ) }}>{{ $marca->marca }}</option>
            @endforeach
        </select>
        <br>
        Modelo:
        <br>
        <input id="campreg" type="text" name="modelo" value="{{ old('modelo') }}">
        <br>
        Combustível:
        <br>
        <select id="campreg" name="combustivel">
            <option {{ old('marca') == 'Gasolina' ? 'selected' : '' }}>Gasolina</option>
            <option {{ old('marca') == 'Diesel' ? 'selected' : '' }}>Diesel</option>
        </select>
        <br>
        Quilómetros:
        <br>
        <input id="campreg" type="text" name="quilometros" value="{{ old('quilometros') }}">
        <br>
        Potência:
        <br>
        <input id="campreg" type="text" name="potencia" value="{{ old('potencia') }}">
        <br>
        Cilindrada:
        <br>
        <input id="campreg" type="text" name="cilindrada" value="{{ old('cilindrada') }}">
        <br>
        Preço:
        <br>
        <input id="campreg" type="text" name="preco" value="{{ old('preco') }}">
        <br>
        Foto:
        <br>
        <input type="file" name="foto" value="Submeter Foto">
        <br>
        <br>
        <input type="submit" value="Submeter Anuncio">
    </form>



</div>

@endsection