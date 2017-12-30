@extends('layouts.app')

@section('content')

<div id="centrologregdd">
	<h2>Registo</h2>
		<form class="form-horizontal" method="POST" action="{{ route('register') }}">
			{{ csrf_field() }}
			Nome:
			<br>
			<input type="text" name="name" value="{{ old('name') }}" style="{{ $errors->has('name') ? ' border-color: red;' : '' }}">
			@if ($errors->has('name'))
				<br>
				<span>
					<small style="color: red;">{{ $errors->first('name') }}</small>
				</span>
				<br>
			@endif
			<br>
			Email:
			<br>
			<input type="text" name="email" value="{{ old('email') }}" style="{{ $errors->has('email') ? ' border-color: red;' : '' }}">
			@if ($errors->has('email'))
				<br>
				<span>
					<small style="color: red;">{{ $errors->first('email') }}</small>
				</span>
				<br>
			@endif
			<br>
			Password:
			<br>
			<input type="password" name="password" style="{{ $errors->has('password') ? ' border-color: red;' : '' }}">
			@if ($errors->has('password'))
				<br>
				<span>
					<small style="color: red;">{{ $errors->first('password') }}</small>
				</span>
				<br>
			@endif
			<br>
			Confirmar Password:
			<br>
			<input type="password" name="password_confirmation" style="{{ $errors->has('password') ? ' border-color: red;' : '' }}">
			<br>
			<input class="button" type="submit" value="Registar">
		</form>
</div>

@endsection