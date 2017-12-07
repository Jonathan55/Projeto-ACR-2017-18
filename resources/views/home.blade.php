@extends('layouts.app') @section('content')

<!--Script imagens a passar de 5 em 5s-->

<script type="text/javascript">

    var picPaths = ['img/pic1.jpg', 'img/pic2.jpg', 'img/pic3.jpg', 'img/pic4.jpg', 'img/pic5.jpg'];
    var curPic = -1;
    var imgO = new Array();

    for (i = 0; i < picPaths.length; i++) {
        imgO[i] = new Image();
        imgO[i].src = picPaths[i];
    }

    function swapImage() {
        curPic = (++curPic > picPaths.length - 1) ? 0 : curPic;
        imgCont.src = imgO[curPic].src;
        setTimeout(swapImage, 5000);
    }

    window.onload = function () {
        imgCont = document.getElementById('imgBanner');
        swapImage();
    }

</script>

<div id="destaques">

    <!--codigo imagens a passar de 5 em 5s-->

    <img id="imgBanner" src="http://localhost/public/img/pic4.jpg" alt="">

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

            <option value="" selected=""> Marca </option>

            <option value=""> </option>

            <option value=""> </option>

            <option value=""> </option>

        </select>

        <select name="modelo">

            <option value="" selected=""> Modelo </option>

            <option value=""> </option>

            <option value=""> </option>

            <option value=""> </option>

        </select>

        <p>Preço</p>

        <select name="preço">

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

    </form>

</div>

<div id="middle">

    <h2>Destaques</h2>

    <ul class="flex-container">

        <div class="flex-item">

            <img id="div1" src="img/pic1.jpg" alt="anuncio">

            <h2>Porsche 356</h2>

            <hr>

            <table class="table-fill">

                <tbody class="table-hover">

                    <tr>

                        <td class="text-left">Modelo</td>

                        <td class="text-left">356</td>

                    </tr>

                    <tr>

                        <td class="text-left">Combustível</td>

                        <td class="text-left">Gasolina</td>

                    </tr>

                    <tr>

                        <td class="text-left">Quilómetros</td>

                        <td class="text-left">110.000 km</td>

                    </tr>

                    <tr>

                        <td class="text-left">Potência</td>

                        <td class="text-left">75 cv</td>

                    </tr>

                    <tr>

                        <td class="text-left">Cilindrada</td>

                        <td class="text-left">1600 cm3</td>

                    </tr>

                </tbody>

            </table>

        </div>

        <div class="flex-item">
            <img id="div1" src="img/pic2.jpg" alt="anuncio ">

            <h2>Porsche 356</h2>

            <hr>

            <table class="table-fill">

                <tbody class="table-hover">

                    <tr>

                        <td class="text-left">Modelo</td>

                        <td class="text-left">356</td>

                    </tr>

                    <tr>

                        <td class="text-left">Combustível</td>

                        <td class="text-left">Gasolina</td>

                    </tr>

                    <tr>

                        <td class="text-left">Quilómetros</td>

                        <td class="text-left">110.000 km</td>

                    </tr>

                    <tr>

                        <td class="text-left">Potência</td>

                        <td class="text-left">75 cv</td>

                    </tr>

                    <tr>

                        <td class="text-left">Cilindrada</td>

                        <td class="text-left">1600 cm3</td>

                    </tr>

                </tbody>

            </table>
        </div>

        <div class="flex-item">
            <img id="div1" src="img/pic3.jpg" alt="anuncio ">
            <h2>Porsche 356</h2>

            <hr>

            <table class="table-fill">

                <tbody class="table-hover">

                    <tr>

                        <td class="text-left">Modelo</td>

                        <td class="text-left">356</td>

                    </tr>

                    <tr>

                        <td class="text-left">Combustível</td>

                        <td class="text-left">Gasolina</td>

                    </tr>

                    <tr>

                        <td class="text-left">Quilómetros</td>

                        <td class="text-left">110.000 km</td>

                    </tr>

                    <tr>

                        <td class="text-left">Potência</td>

                        <td class="text-left">75 cv</td>

                    </tr>

                    <tr>

                        <td class="text-left">Cilindrada</td>

                        <td class="text-left">1600 cm3</td>

                    </tr>

                </tbody>

            </table>
        </div>

        <div class="flex-item">
            <img id="div1" src="img/pic4.jpg" alt="anuncio ">
            <h2>Porsche 356</h2>

            <hr>

            <table class="table-fill">

                <tbody class="table-hover">

                    <tr>

                        <td class="text-left">Modelo</td>

                        <td class="text-left">356</td>

                    </tr>

                    <tr>

                        <td class="text-left">Combustível</td>

                        <td class="text-left">Gasolina</td>

                    </tr>

                    <tr>

                        <td class="text-left">Quilómetros</td>

                        <td class="text-left">110.000 km</td>

                    </tr>

                    <tr>

                        <td class="text-left">Potência</td>

                        <td class="text-left">75 cv</td>

                    </tr>

                    <tr>

                        <td class="text-left">Cilindrada</td>

                        <td class="text-left">1600 cm3</td>

                    </tr>

                </tbody>

            </table>
        </div>

        <div class="flex-item">
            <img id="div1" src="img/pic5.jpg" alt="anuncio ">
            <h2>Porsche 356</h2>

            <hr>

            <table class="table-fill">

                <tbody class="table-hover">

                    <tr>

                        <td class="text-left">Modelo</td>

                        <td class="text-left">356</td>

                    </tr>

                    <tr>

                        <td class="text-left">Combustível</td>

                        <td class="text-left">Gasolina</td>

                    </tr>

                    <tr>

                        <td class="text-left">Quilómetros</td>

                        <td class="text-left">110.000 km</td>

                    </tr>

                    <tr>

                        <td class="text-left">Potência</td>

                        <td class="text-left">75 cv</td>

                    </tr>

                    <tr>

                        <td class="text-left">Cilindrada</td>

                        <td class="text-left">1600 cm3</td>

                    </tr>

                </tbody>

            </table>
        </div>

        <div class="flex-item">
            <img id="div1" src="img/pic6.jpg" alt="anuncio ">
            <h2>Porsche 356</h2>

            <hr>

            <table class="table-fill">

                <tbody class="table-hover">

                    <tr>

                        <td class="text-left">Modelo</td>

                        <td class="text-left">356</td>

                    </tr>

                    <tr>

                        <td class="text-left">Combustível</td>

                        <td class="text-left">Gasolina</td>

                    </tr>

                    <tr>

                        <td class="text-left">Quilómetros</td>

                        <td class="text-left">110.000 km</td>

                    </tr>

                    <tr>

                        <td class="text-left">Potência</td>

                        <td class="text-left">75 cv</td>

                    </tr>

                    <tr>

                        <td class="text-left">Cilindrada</td>

                        <td class="text-left">1600 cm3</td>

                    </tr>

                </tbody>

            </table>
        </div>

        <div class="flex-item">
            <img id="div1" src="img/pic1.jpg" alt="anuncio ">
            <h2>Porsche 356</h2>

            <hr>

            <table class="table-fill">

                <tbody class="table-hover">

                    <tr>

                        <td class="text-left">Modelo</td>

                        <td class="text-left">356</td>

                    </tr>

                    <tr>

                        <td class="text-left">Combustível</td>

                        <td class="text-left">Gasolina</td>

                    </tr>

                    <tr>

                        <td class="text-left">Quilómetros</td>

                        <td class="text-left">110.000 km</td>

                    </tr>

                    <tr>

                        <td class="text-left">Potência</td>

                        <td class="text-left">75 cv</td>

                    </tr>

                    <tr>

                        <td class="text-left">Cilindrada</td>

                        <td class="text-left">1600 cm3</td>

                    </tr>

                </tbody>

            </table>
        </div>

        <div class="flex-item">
            <img id="div1" src="img/pic2.jpg" alt="anuncio ">
            <h2>Porsche 356</h2>

            <hr>

            <table class="table-fill">

                <tbody class="table-hover">

                    <tr>

                        <td class="text-left">Modelo</td>

                        <td class="text-left">356</td>

                    </tr>

                    <tr>

                        <td class="text-left">Combustível</td>

                        <td class="text-left">Gasolina</td>

                    </tr>

                    <tr>

                        <td class="text-left">Quilómetros</td>

                        <td class="text-left">110.000 km</td>

                    </tr>

                    <tr>

                        <td class="text-left">Potência</td>

                        <td class="text-left">75 cv</td>

                    </tr>

                    <tr>

                        <td class="text-left">Cilindrada</td>

                        <td class="text-left">1600 cm3</td>

                    </tr>

                </tbody>

            </table>
        </div>

        <div class="flex-item">
            <img id="div1" src="img/pic3.jpg" alt="anuncio ">
            <h2>Porsche 356</h2>

            <hr>

            <table class="table-fill">

                <tbody class="table-hover">

                    <tr>

                        <td class="text-left">Modelo</td>

                        <td class="text-left">356</td>

                    </tr>

                    <tr>

                        <td class="text-left">Combustível</td>

                        <td class="text-left">Gasolina</td>

                    </tr>

                    <tr>

                        <td class="text-left">Quilómetros</td>

                        <td class="text-left">110.000 km</td>

                    </tr>

                    <tr>

                        <td class="text-left">Potência</td>

                        <td class="text-left">75 cv</td>

                    </tr>

                    <tr>

                        <td class="text-left">Cilindrada</td>

                        <td class="text-left">1600 cm3</td>

                    </tr>

                </tbody>

            </table>

        </div>



    </ul>

</div>

@endsection