@extends('layouts.app') @section('content')

<div id="addcarro">
    <h2>Adicionar Anuncio</h2>
    <form method="POST" action="{{ route('adicionarCarro') }}" enctype="multipart/form-data">
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
					<option value="{{ $marca->id }}" {{ (old('marca') == $marca->id ? 'selected' : '' ) }}>{{ $marca->marca }}</option>
				@endforeach
			</select>
			<br>
			Modelo:
			<br>
			<input type="text" name="modelo" value="{{ old('modelo') }}" style="{{ $errors->has('modelo') ? ' border-color: red;' : '' }}">
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
				<option {{ old('combustivel') == 'Gasolina' ? 'selected' : '' }}>Gasolina</option>
				<option {{ old('combustivel') == 'Diesel' ? 'selected' : '' }}>Diesel</option>
			</select>
			<br>
			Quilómetros:
			<br>
			<input type="text" name="quilometros" value="{{ old('quilometros') }}" style="{{ $errors->has('quilometros') ? ' border-color: red;' : '' }}">
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
			<input type="text" name="potencia" value="{{ old('potencia') }}" style="{{ $errors->has('potencia') ? ' border-color: red;' : '' }}">
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
			<input type="text" name="cilindrada" value="{{ old('cilindrada') }}" style="{{ $errors->has('cilindrada') ? ' border-color: red;' : '' }}">
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
			<input type="text" name="preco" value="{{ old('preco') }}" style="{{ $errors->has('preco') ? ' border-color: red;' : '' }}">
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
				<option value="0" {{ old('usado') == '0' ? 'selected' : ''}}>Novo</option>
				<option value="1" {{ old('usado') == '1' ? 'selected' : ''}}>Usado</option>
			</select>
			<br>
        </div>
		
		<!-- coluna 2 -->

        <div class="flex-item-anuncio">
			Ano:
			<br>
			<input type="text" name="ano" value="{{ old('ano')}}" style="{{ $errors->has('ano') ? ' border-color: red;' : '' }}">
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
			<input type="text" name="lugares" value="{{ old('lugares')}}" style="{{ $errors->has('lugares') ? ' border-color: red;' : '' }}">
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
			<input type="text" name="quantidade" value="{{ old('quantidade')}}" style="{{ $errors->has('quantidade') ? ' border-color: red;' : '' }}">
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
			<input type="text" name="cor" value="{{ old('cor')}}" style="{{ $errors->has('cor') ? ' border-color: red;' : '' }}">
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
				<option {{ old('caixa') == 'Manual' ? 'selected' : ''}}>Manual</option>
				<option {{ old('caixa') == 'Automatica' ? 'selected' : ''}}>Automática</option>
				<option {{ old('caixa') == 'Semi-Automatica' ? 'selected' : ''}}>Semi-Automática</option>
			</select>
			<br>
			Descrição:
			<br>
			<input type="text" name="descricao" value="{{ old('descricao')}}">
			<br>
			   
			Foto:
			<br>
			<input type="file" name="fotos[]" style="{{ $errors->has('fotos') ? ' color: red;' : '' }} width:85%" multiple>
			@if ($errors->has('fotos'))
				<br>
				<span>
					<small style="color: red;">{{ $errors->first('fotos') }}</small>
				</span>
				<br>
			@endif
			<br>
			<br>
			<input class="button" type="submit" value="Submeter Anuncio">
        </div>
    </ul>
	</form>
    <br>
    <br>
</div>

@endsection
