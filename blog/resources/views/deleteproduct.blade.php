@extends('layouts.admin')
@section('content')
<h1>Delete Product Reason</h1>
			@if(Session::get('errors'))
				@foreach(Session::get('errors') as $m)
				<div class="alert alert-danger">
					<p>{{$m}}</p>
				</div>
				@endforeach
			@endif
			
	<form method="post" action="{{URL::to('/')}}/deleteproduct">
		<input type="hidden"  value="{{$result->id}}" name="id">
		<div class="form-group">
			<label>Why do you delete?</label>
			<input type="text" name="deletereason" class="form-control">
		</div>
		<input type="submit" name="">
		{{csrf_field()}}							
	</form>
@endsection