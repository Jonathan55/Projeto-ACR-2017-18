@extends('layouts.app')

@section('content')

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1877126812347454',
      cookie     : true,
      xfbml      : true,
      version    : 'v2.11'
    });

    FB.AppEvents.logPageView();

  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

   function checkLoginState() {
        FB.getLoginStatus(function(response) {
            if(response.status == 'connected') {
                window.location.replace('/facebook/login/'+response.authResponse.accessToken)
            }
        });
    }

</script>

<div id="middle">

	<h2>Login</h2>

	<form class="form-horizontal" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}
        Email:<br>
        <input id="campreg" type="text" name="email" value="{{ old('email') }}" style="{{ $errors->has('email') ? ' border-color: red;' : '' }}">
        @if ($errors->has('email'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('email') }}</small>
            </span>
            <br>
        @endif
        <br>
        Password:<br>
        <input id="campreg" type="password" name="password" style="{{ $errors->has('password') ? ' border-color: red;' : '' }}">
        @if ($errors->has('password'))
            <br>
            <span>
                <small style="color: red;">{{ $errors->first('password') }}</small>
            </span>
            <br>
        @endif
        <br>
        <input id="campreg" type="submit" value="Entrar">
        <br>
        <br>
        <fb:login-button
            scope="public_profile,email"
            onlogin="checkLoginState();">
        </fb:login-button>
        <br>
	</form>

</div>

@endsection
