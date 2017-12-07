<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

<div id="pagewrap">

<header>
 
    <h1>{{ config('app.name', 'Laravel') }}</h1>
 
    <!--Script imagens a passar de 5 em 5s-->
 
    <script type="text/javascript">
 
            var picPaths = ['img/pic1.jpg','img/pic2.jpg','img/pic3.jpg','img/pic4.jpg','img/pic5.jpg'];
 
            var curPic = -1;
 
            var imgO = new Array();
 
            for(i=0; i < picPaths.length; i++) {
 
                imgO[i] = new Image();
 
                imgO[i].src = picPaths[i];
 
            }
 

 
            function swapImage() {
 
                curPic = (++curPic > picPaths.length-1)? 0 : curPic;
 
                imgCont.src = imgO[curPic].src;
 
                setTimeout(swapImage,5000);
 
            }
 

 
            window.onload=function() {
 
                imgCont = document.getElementById('imgBanner');
 
                swapImage();
 
            }
 
    </script>
 
</header>

<div id="pesquisa">
 
    <input id="pesquisa" type="text" name="pesquisa" placeholder="Pesquisa...">
 
    <a href=""> <img id="shopping-cart" src="./icons/shopping-cart.png" alt="shopping-cart"></a>
 
    <a href="{{ route('utilizador.login') }}"> <img id="user" src="./icons/user.png" alt="user"></a>
 
</div>

@yield('content')

<footer>
 
    <p>© 2017 ACR</p><p>
 
</p></footer>
 
</div>

</body>
</html>
