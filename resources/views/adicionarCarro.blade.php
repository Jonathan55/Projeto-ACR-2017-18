@extends('layouts.app') @section('content')

<div id="middle">
    <h2>Adicionar Anuncio</h2>

    <form class="form-horizontal" method="POST" action="{{ route('adicionarCarro') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

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
        <input id="campreg" type="text" name="modelo" value="{{ old('modelo') }}" style="{{ $errors->has('modelo') ? ' border-color: red;' : '' }}">
        @if ($errors->has('modelo'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('modelo') }}</small>
            </span>
            <br>
        @endif
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
        Estado:
        <br>
        <select id="campreg" name="usado">
            <option value="0" {{ old('marca') == '0' ? 'selected' : ''}}>Novo</option>
            <option value="1" {{ old('marca') == '1' ? 'selected' : ''}}>Usado</option>
        </select>
        <br>
        Ano:
        <br>
        <input id="campreg" type="text" name="ano" value="{{ old('ano')}}">
        <br>
        Lugares:
        <br>
        <input id="campreg" type="text" name="lugares" value="{{ old('ano')}}">
        <br>
        Quantidade:
        <br>
        <input id="campreg" type="text" name="quantidade" value="{{ old('quantidade')}}">
        <br>
        Cor:
        <br>
        <input id="campreg" type="text" name="cor" value="{{ old('cor')}}">
        <br>
        Caixa de Velocidades:
        <br>
        <select id="campreg" name="caixa">
            <option {{ old('marca') == 'Manual' ? 'selected' : ''}}>Manual</option>
            <option {{ old('marca') == 'Automatica' ? 'selected' : ''}}>Automática</option>
            <option {{ old('marca') == 'Semi-Automatica' ? 'selected' : ''}}>Semi-Automática</option>
        </select>
        <br>
        Descrição:
        <br>
        <input id="campreg" type="text" name="descricao" value="{{ old('descricao')}}">
        <br>
        Foto:
        <br>
        <input type="file" name="foto" value="Submeter Foto" style="{{ $errors->has('foto') ? ' color: red;' : '' }}">
        @if ($errors->has('foto'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('foto') }}</small>
            </span>
            <br>
        @endif
        <br>
        <br>
        <input id="campreg" type="submit" value="Submeter Anuncio">
    </form>
    <br>
    <br>
    <br>



</div>

@endsection
