@extends('layouts.app') @section('content')

<!--Script imagens a passar de 5 em 5s-->

<script type="text/javascript">

    const fotos = ['img/pic1.jpg', 'img/pic2.jpg', 'img/pic3.jpg', 'img/pic4.jpg', 'img/pic5.jpg']
    var fotoAtual = 0

    function swapImage() {
        let proximaFoto = ( fotoAtual == fotos.length-1 ) ? 0 : fotoAtual+1
        document.getElementById('imgBanner').src = fotos[proximaFoto]
        fotoAtual = proximaFoto
    }

    window.onload = function () {
        if (fotos.length) {
            document.getElementById('imgBanner').src = fotos[fotoAtual]
            setInterval(swapImage, 5000)
        }
    }

</script>

<div id="destaques">

    <img id="imgBanner" src="" alt="">

</div>

<div id="content">

    <h2>Veiculos</h2>

    <form>

        <table class="">

            <thead>

                <tr>

                    <th>

                        <input type="checkbox" id="" name="Novos" value="">

                        <label>Novos</label>

                    </th>

                    <th>

                        <input type="checkbox" id="" name="Usados" value="">

                        <label>Usados</label>

                    </th>

                    <th>

                        <input type="checkbox" id="" name="Todos" value="">

                        <label>Todos</label>

                    </th>

                </tr>

            </thead>

        </table>

        <p>Marca e Modelo</p>

        <select name="marca">

            @foreach($marcas as $marca)
                <option>{{$marca->marca}}</option>
            @endforeach

        </select>

        <p>Preço</p>

        <select name="preço">

            <option value="" selected=""> de </option>

            <option value="">{{ $preco_minimo }}</option>

            <option value="">{{ $preco_maximo }}</option>

        </select>

        <select name="Icecream Flavours">

            <option value="" selected=""> até </option>

            <option value=""> </option>

            <option value=""> </option>

            <option value=""> </option>

        </select>

        <p>Ano</p>

        <select name="ano">

            <option value="" selected=""> de </option>

            <option value=""> </option>

            <option value=""> </option>

            <option value=""> </option>

        </select>

        <select name="Icecream Flavours">

            <option value="" selected=""> até </option>

            <option value=""> </option>

            <option value=""> </option>

            <option value=""> </option>

        </select>

        <p>Quilómetros</p>

        <select name="quilometros">

            <option value="" selected=""> de </option>

            <option value=""> </option>

            <option value=""> </option>

            <option value=""> </option>

        </select>

        <select name="Icecream Flavours">

            <option value="" selected=""> até </option>

            <option value=""> </option>

            <option value=""> </option>

            <option value=""> </option>

        </select>

        <input type="submit" value="Pesquisar">

    </form>

</div>

<div id="middle">

    <h2>Destaques</h2>

    <ul class="flex-container">

        @foreach($carros as $carro)

        <div class="flex-item">

            <img id="div1" src="{{asset('storage/'.$carro->foto)}}" alt="anuncio">

            <h2>{{$carro->marca->marca}} {{$carro->modelo}}</h2>

            <hr>

            <table class="table-fill">

                <tbody class="table-hover">

                    <!-- Só Marca, Modelo, Preço, Usado ou Novo -->

                    <tr>

                        <td class="text-left">Utilizador</td>

                        <td class="text-left">{{$carro->user->name}}</td>

                    </tr>

                    <tr>

                        <td class="text-left">Combustível</td>

                        <td class="text-left">{{$carro->combustivel}}</td>

                    </tr>

                    <tr>

                        <td class="text-left">Cilindrada</td>

                        <td class="text-left">{{$carro->cilindrada}}</td>

                    </tr>

                </tbody>

            </table>

        </div>
        @endforeach


    </ul>

</div>

@endsection