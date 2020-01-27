@extends('layout')
@section('content')

<div class="col-md-4 w-25 mx-auto p-3 bg-dark text-light reg">
	<h2>Registration</h2>

	<form method="POST" action="./registration">
		{{$errors->first('name')}}
		<input type="text" name="name" placeholder="Enter your name" class="form-control" value="{{old('name')}}">
		
		{{$errors->first('surname')}}
		<input type="text" name="surname" placeholder="Enter your surname" class="form-control" value="{{old('surname')}}">
		{{$errors->first('login')}}
		<input type="text" name="login" placeholder="Enter your login" class="form-control" value="{{old('login')}}">
		{{$errors->first('password')}}
		<input type="text" name="password" placeholder="Enter your password" class="form-control" value="{{old('password')}}">
		<input type="submit" name="submit" class="btn btn-info">
		{{csrf_field()}}
	</form>

</div>
@endsection