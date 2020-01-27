@extends('layout')
@section('content')
<link rel="stylesheet" type="text/css" href="public/css/logInStyle.css">

		<div class="col-md-4 w-25 mx-auto p-3 bg-dark text-light reg">
			<h1>Log In</h1>

			@if(Session::get('errors'))
				@foreach(Session::get('errors') as $e)
				<li>{{$e}}</li>
				@endforeach
			@endif

		<h3 class="text-success">{{Session::get('message')}}</h3>	
			<form method="POST" action="./tryLogin">

				<input type="text" name="login" class="input form-control" placeholder="Enter your login">

				<input type="text" name="password" placeholder="Enter your password" class="input form-control">

				<input type="submit" name="submit" class="btn btn-info">
				{{csrf_field()}}
			</form>
			<a href="./user/verify">Forgot password</a>
		</div>
@endsection