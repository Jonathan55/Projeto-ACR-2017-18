@extends('layouts.app') @section('content')

<div id="center">
<h1>{{  $carro->marca->marca  }} {{  $carro->modelo}}</h1>

    <ul class="flex-container">

        <div class="galeriaDet">
        <div class="descricaoDet">
        <!-- buscar a BD a foto -->
        <h2><a href="{{  route('verUtilizador',$carro->user->id )}}">{{  $carro->user->name  }}</a> </h2>
        <!-- buscar Marca e Modelo -->
        <hr>
        <table class="table-fill">
            <tbody class="table-hover">
                <!-- Só Marca, Modelo, Preço, Usado ou Novo -->
                <tr>
                    <td class="text-left">Marca</td>
                    <td class="text-right">{{  $carro->marca->marca  }}</td>
                </tr>
                <tr>
                    <td class="text-left">Modelo</td>
                    <td class="text-right">{{  $carro->modelo}}</td>
                </tr>
                <tr>
                    <td class="text-left">Combustível</td>
                    <td class="text-right">{{  $carro->combustivel  }}</td>
                </tr>
                <tr>
                    <td class="text-left">Cor</td>
                    <td class="text-right">{{  $carro->cor  }}</td>
                </tr>
                <tr>
                    <td class="text-left">Cilindrada</td>
                    <td class="text-right"<{{  $carro->cilindrada  }}</td>
                </tr>
                <tr>
                    <td class="text-left">Potencia</td>
                    <td class="text-right">{{  $carro->potencia  }}</td>
                </tr>
                <tr>
                    <td class="text-left">Quilómetros</td>
                    <td class="text-right">{{  $carro->quilometros  }}</td>
                </tr>
                <tr>
                    <td class="text-left">Ano</td>
                    <td class="text-right">{{  $carro->ano  }}</td>
                </tr>
                <tr>
                    <td class="text-left">Preço</td>
                    <td class="text-right">{{  $carro->preco  }}</td>
                </tr>
                <tr>
                    <td class="text-left">Descrição</td>
                    <td class="text-right">{{  $carro->descricao  }}</td>

                <tr>
                    <td class="text-left">Carrinho</td>
                    <td class="text-right"><a href="{{ route('adicionarCarrinho', $carro->id) }}"><button class="button">Adicionar</button></a></td>
                </tr>
            </tbody>
        </table>
        @if(Auth::user() && Auth::user()->id == $carro->user->id)
           <br><br>
           <a href="{{ route('eliminarCarro', $carro->id) }}"><button class="button">Eliminar</button></a>
        @endif
    </div>
    </div>

    @foreach($carro->fotos as $foto)
        <div class="galeriaDet">
           <a href="{{asset('storage/'.$foto->path)}}" ><img  src="{{asset('storage/'.$foto->path)}}" alt="anuncio"></a>
           @if(Auth::user() && Auth::user()->id == $carro->user->id && $carro->fotos->count() > 1)
           <br><br>
           <a href="{{ route('eliminarFoto', [$carro->id, $foto->id]) }}"><button class="button">Eliminar</button></a>
           @endif
        </div>
    @endforeach

    @if(Auth::user() && Auth::user()->id == $carro->user->id)

        <div class="galeriaDet">
            <form class="form-horizontal" method="POST" action="{{ route('adicionarFotos', $carro->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <h3>Adicionar Fotos<h3>
                <br><br>
                <input  type="file" name="fotos[]" style="{{ $errors->has('fotos') ? ' color: red;' : '' }}" multiple>
                @if ($errors->has('fotos'))
                    <br><br>
                    <span>
                        <small style="color: red;">{{ $errors->first('fotos') }}</small>
                    </span>
                    <br>
                @endif
                <br><br>
                <input class="button" type="submit" value="Adicionar">
            </form>
        </div>

    @endif

</ul>
</div>

@endsection
