@extends('layouts.app') @section('content')

<div id="center">
    <h1>{{  $carro->marca->marca  }} {{  $carro->modelo}}</h2>
    
	 <ul class="flex-container">
        <div class="flex-item">
            @if($carro->fotos->count() > 0)
            <img id="div1" src="{{asset('storage/'.$carro->fotos[0]->path)}}" alt="anuncio">      <!-- buscar a BD a foto -->
            @endif
            <h2><a href="{{  route('verUtilizador',$carro->user->id )}}">{{  $carro->user->name  }}</a> </h2>       								  <!-- buscar Marca e Modelo -->
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
                        <td class="text-left">Combustivel</td>
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
                        <td class="text-left">potencia</td>
                        <td class="text-left">{{  $carro->potencia  }}</td>
                    </tr>
					<tr>
                        <td class="text-left">quilometros</td>
                        <td class="text-left">{{  $carro->quilometros  }}</td>
                    </tr>
					<tr>
                        <td class="text-left">ano</td>
                        <td class="text-left">{{  $carro->ano  }}</td>
                    </tr>
					<tr>
                        <td class="text-left">preco</td>
                        <td class="text-left">{{  $carro->preco  }}</td>
                    </tr>
					<tr>
                        <td class="text-left">descricao</td>
                        <td class="text-left">{{  $carro->descricao  }}</td>
                    
					
                    
                </tbody>
            </table>
        </div>

		
		
    </ul>


</div>

@endsection