@extends('layout')
@section('content')
	@foreach($data as $user)

		<form class="form-control" method="post" action="edit">
		    
		  
		    <div class="form-group ">
				<label>Name: </label>
		    <input type="text" name="name"  value="{{ $user->name }}" />
				<label>Surname: </label>
		    <input type="text" name="surname"  value="{{ $user->surname }}" />
				<label>Email: </label>
		    <input type="email" name="login"  value="{{ $user->login }}" />
				<label>Password: </label>
		    <input type="password" name="password" />

			<input type="submit" name="send" value="Send">
		 
		    {{ csrf_field() }}
		</div>
		</form>
	@endforeach
@endsection
