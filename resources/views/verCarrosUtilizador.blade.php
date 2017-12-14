@extends('layouts.app') @section('content')

<div id="center">
    <h1> Anuncios</h2>
	 <ul class="flex-container">
        <div class="flex-item">
            <img id="div1" src="img/pic1.jpg" alt="anuncio">      <!-- buscar a BD a foto -->
            <h2>xxxxxxx</h2>       								  <!-- buscar Marca e Modelo -->
            <hr>
			
            <table class="table-fill">
                <tbody class="table-hover">
                    <!-- Só Marca, Modelo, Preço, Usado ou Novo -->
                    <tr>
                        <td class="text-left">Marca</td>
                        <td class="text-left"></td>
						
                    </tr>
                    <tr>
                        <td class="text-left">Modelo</td>
                        <td class="text-left"></td>
                    </tr>
                    <tr>
                        <td class="text-left">Combustivel</td>
                        <td class="text-left"></td>
                    </tr>
					<tr>
                        <td class="text-left">Cor</td>
                        <td class="text-left"></td>
                    </tr>
					<tr>
                        <td class="text-left">Cilindrada</td>
                        <td class="text-left"></td>
                    </tr>
					<tr>
                        <td class="text-left">potencia</td>
                        <td class="text-left"></td>
                    </tr>
					<tr>
                        <td class="text-left">quilometros</td>
                        <td class="text-left"></td>
                    </tr>
					<tr>
                        <td class="text-left">ano</td>
                        <td class="text-left"></td>
                    </tr>
					<tr>
                        <td class="text-left">preco</td>
                        <td class="text-left"></td>
                    </tr>
					<tr>
                        <td class="text-left">descricao</td>
                        <td class="text-left"></td>
                    
					</tr>
					<td><button class="bedid" type="button">Editar!</button></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>

		<div class="flex-item">
            <img id="div1" src="img/pic1.jpg" alt="anuncio">      <!-- buscar a BD a foto -->
            <h2>xxxxxxx</h2>       								  <!-- buscar Marca e Modelo -->
            <hr>
			
            <table class="table-fill">
                <tbody class="table-hover">
                    <!-- Só Marca, Modelo, Preço, Usado ou Novo -->
                    <tr>
                        <td class="text-left">Marca</td>
                        <td class="text-left">xxxxxx</td>
						
                    </tr>
                    <tr>
                        <td class="text-left">Modelo</td>
                        <td class="text-left">xxxxxx</td>

                    </tr>
                    <tr>
                        <td class="text-left">Combustivel</td>
                        <td class="text-left">xxxxxx</td>
                    </tr>
					<tr>
                        <td class="text-left">Cor</td>
                        <td class="text-left">xxxxxx</td>
						
                    </tr>
					<tr>
                        <td class="text-left">Cilindrada</td>
                        <td class="text-left">xxxxxx</td>
                    </tr>
					<tr>
                        <td class="text-left">potencia</td>
                        <td class="text-left">xxxxxx</td>
                    </tr>
					<tr>
                        <td class="text-left">quilometros</td>
                        <td class="text-left">xxxxxx</td>
                    </tr>
					<tr>
                        <td class="text-left">ano</td>
                        <td class="text-left">xxxxxx</td>
                    </tr>
					<tr>
                        <td class="text-left">preco</td>
                        <td class="text-left">xxxxxx</td>
                    </tr>
					<tr>
                        <td class="text-left">descricao</td>
                        <td class="text-left">xxxxxx</td>
                    </tr>
					<tr>
                        <td class="text-left">descricao</td>
                        <td class="text-left">xxxxxx</td>
                    </tr>
					<td><button class="bedid" type="button">Editar!</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
		
		
    </ul>


</div>

@endsection