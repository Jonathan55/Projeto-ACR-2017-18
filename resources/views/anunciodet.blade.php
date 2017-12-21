@extends('layouts.app') @section('content')

<div id="center">
<h1>{{  $carro->marca->marca  }} {{  $carro->modelo}}</h2>
    <ul class="flex-container">

        @foreach($carro->fotos as $foto)
        <div class="galeriaDet">
           <a href="{{asset('storage/'.$foto->path)}}" ><img  src="{{asset('storage/'.$foto->path)}}" alt="anuncio"></a>
        </div>
        @endforeach


        
        

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
                    <td class="text-left">{{  $carro->marca->marca  }}</td>
                </tr>
                <tr>
                    <td class="text-left">Modelo</td>
                    <td class="text-left">{{  $carro->modelo}}</td>
                </tr>
                <tr>
                    <td class="text-left">Combustível</td>
                    <td class="text-left">{{  $carro->combustivel  }}</td>
                </tr>
                <tr>
                    <td class="text-left">Cor</td>
                    <td class="text-left">{{  $carro->cor  }}</td>
                </tr>
                <tr>
                    <td class="text-left">Cilindrada</td>
                    <td class="text-left"<{{  $carro->cilindrada  }}</td>
                </tr>
                <tr>
                    <td class="text-left">Potencia</td>
                    <td class="text-left">{{  $carro->potencia  }}</td>
                </tr>
                <tr>
                    <td class="text-left">Quilómetros</td>
                    <td class="text-left">{{  $carro->quilometros  }}</td>
                </tr>
                <tr>
                    <td class="text-left">Ano</td>
                    <td class="text-left">{{  $carro->ano  }}</td>
                </tr>
                <tr>
                    <td class="text-left">Preço</td>
                    <td class="text-left">{{  $carro->preco  }}</td>
                </tr>
                <tr>
                    <td class="text-left">Descrição</td>
                    <td class="text-left">{{  $carro->descricao  }}</td>

                <tr>
                    <td class="text-left">Carrinho</td>
                    <td class="text-left"><a href="{{ route('adicionarCarrinho', $carro->id) }}">Adicionar</a></td>
                </tr>
            </tbody>
        </table>
    </div>	
</ul>
</div>

@endsection