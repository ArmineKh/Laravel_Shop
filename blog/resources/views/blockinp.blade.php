@extends('layouts.admin')
@section('content')

<h1>Block User</h1>
			@if(Session::get('errors'))
				@foreach(Session::get('errors') as $m)
				<div class="alert alert-danger">
					{{$m}}
				</div>
				@endforeach
			@endif
			
	<form method="post" action="{{URL::to('/')}}/blockd">
		<input type="hidden" value="{{$result->id}}" name="id"> 
		<div class="form-group">
			<label>how minutes need to block ?</label>
			<input type="text" name="blocktime" class="form-control">
		</div>
		<input type="submit" name="">
		{{csrf_field()}}							
	</form>
	
@endsection