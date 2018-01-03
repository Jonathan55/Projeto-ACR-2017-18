@extends('layouts.app') @section('content')

<div id="addcarro">
    <h2>Editar Anuncio</h2>

    <form class="form-horizontal" method="POST" action="{{ route('editarCarro',$carro->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                     
                        <li style="color: red;">{{ $errors->first() }}</li>
                    
                </ul>
            </div>
        @endif 
        <ul class="flex-container">
        <div class="flex-item-anuncio">
        Marca:
        <br>
        <select name="marca">
            @foreach ($marcas as $marca)
                <option value="{{ $marca->id }}" {{ ($carro->marca->id == $marca->id ? 'selected' : '' ) }}>{{ $marca->marca }}</option>
            @endforeach
        </select>
        <br>
        Modelo:
        <br>
        <input type="text" name="modelo" value="{{ $carro->modelo }}" style="{{ $errors->has('modelo') ? ' border-color: red;' : '' }}">
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
        <select name="combustivel" style="{{ $errors->has('modelo') ? ' border-color: red;' : '' }}">
            <option></option>
            <option {{ $carro->combustivel == 'Gasolina' ? 'selected' : '' }}>Gasolina</option>
            <option {{ $carro->combustivel == 'Diesel' ? 'selected' : '' }}>Diesel</option>
        </select>
        <br>
        Quilómetros:
        <br>
        <input type="text" name="quilometros" value="{{ $carro->quilometros }}" style="{{ $errors->has('quilometros') ? ' border-color: red;' : '' }}">
         @if ($errors->has('quilometros'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('quilometros') }}</small>
            </span>
            <br>
        @endif
        <br>
        Potência:
        <br>
        <input type="text" name="potencia" value="{{ $carro->potencia }}" style="{{ $errors->has('potencia') ? ' border-color: red;' : '' }}">
         @if ($errors->has('potencia'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('potencia') }}</small>
            </span>
            <br>
        @endif
        <br>
        Cilindrada:
        <br>
        <input type="text" name="cilindrada" value="{{ $carro->cilindrada }}" style="{{ $errors->has('cilindrada') ? ' border-color: red;' : '' }}">
         @if ($errors->has('cilindrada'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('cilindrada') }}</small>
            </span>
            <br>
        @endif
        <br>
        Preço:
        <br>
        <input type="text" name="preco" value="{{ $carro->preco }}" style="{{ $errors->has('preco') ? ' border-color: red;' : '' }}">
         @if ($errors->has('preco'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('preco') }}</small>
            </span>
            <br>
        @endif
        <br>
        Estado:
        <br>
        <select name="usado">
            <option></option>
            <option value="0" {{ $carro->usado == '0' ? 'selected' : ''}}>Novo</option>
            <option value="1" {{ $carro->usado == '1' ? 'selected' : ''}}>Usado</option>
        </select>
        <br>

        </div>
		
		<!-- coluna 2 -->

        <div class="flex-item-anuncio">
        Ano:
        <br>
        <input type="text" name="ano" value="{{ $carro->ano}}" style="{{ $errors->has('ano') ? ' border-color: red;' : '' }}">
         @if ($errors->has('ano'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('ano') }}</small>
            </span>
            <br>
        @endif
        <br>
        Lugares:
        <br>
        <input type="text" name="lugares" value="{{ $carro->lugares}}" style="{{ $errors->has('lugares') ? ' border-color: red;' : '' }}">
         @if ($errors->has('lugares'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('lugares') }}</small>
            </span>
            <br>
        @endif
        <br>
        Quantidade:
        <br>
        <input type="text" name="quantidade" value="{{ $carro->quantidade}}" style="{{ $errors->has('quantidade') ? ' border-color: red;' : '' }}">
         @if ($errors->has('quantidade'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('quantidade') }}</small>
            </span>
            <br>
        @endif
        <br>
        Cor:
        <br>
        <input type="text" name="cor" value="{{ $carro->cor}}" style="{{ $errors->has('cor') ? ' border-color: red;' : '' }}">
         @if ($errors->has('cor'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('cor') }}</small>
            </span>
            <br>
        @endif

        <br>
        Caixa de Velocidades:
        <br>
        <select name="caixa">
            <option></option>
            <option {{ $carro->caixa == 'Manual' ? 'selected' : ''}}>Manual</option>
            <option {{ $carro->caixa == 'Automatica' ? 'selected' : ''}}>Automática</option>
            <option {{ $carro->caixa == 'Semi-Automatica' ? 'selected' : ''}}>Semi-Automática</option>
        </select>
        <br>
        Descrição:
        <br>
        <input type="text" name="descricao" value="{{ $carro->descricao}}">
        <br>
        <br>
        <input class="button" type="submit" value="Editar Anuncio">
        </div>
    </ul>
    </form>
    <br>
    <br>
    <br>



</div>

@endsection
