@extends('layouts.app') @section('content')

<div id="center">
	

	<div id="page1">

		<div class="bordaRecibo">
			<header>
				
				<!-- Lado Izquierdo -->
				<div class="column left">
					<div class="container">
						<!--colocar logo-->
						<p>Nome  {{ Auth::user()->name }}</p>
                        <p>Email {{ Auth::user()->email }}</p>
					</div>
				</div>
                
				<div class="column right">
					
                </div>
                
			</header>
            <div id="center">
            
                <h2>Carrinho de Compras</h2>
                    <hr>
                    @foreach(Auth::user()->carrinho_compras as $carro)
                    <div class="carrinho1">
                        <h4>Produto</h4>
                        <p>{{  $carro->marca->marca  }}</p>
                    </div>

                    <div class="carrinho3">
                        <h4>Preço</h4>
                        <p>{{  $carro->preco  }}</p>
                    </div>
                    <div class="carrinho4">
                        <h4>Utilizador</h4>
                        <p>{{  $carro->user->name  }}</p>
                       
                    </div>
                    @endforeach
                   

                    <br>
                    <br>
                    <br>
                    <br>
                    </div>
               
            </div>
			
			<footer>
				
				<section> 
					<p>Total: 500€</p>
					
				</section>
				
				
				
			</footer>
		
		</div>
	</div>
</div>

<br>
<br>
<br>
<br>

@endsection