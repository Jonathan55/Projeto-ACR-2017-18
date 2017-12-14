@extends('layouts.app')

@section('content')

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
	</form>
	
</div>

@endsection