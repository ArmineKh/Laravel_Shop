@extends('layout')
@section('content')
	<h1>Order Details</h1>
	<table class="table table-bordered">
		<tr>
			<th>Photo</th>
			<th>Name</th>
			<th>Price</th>
			<th>Count</th>
			<th>Leave Your Fedback</th>
		</tr>
		@foreach($result as $m)
			<tr>
				<td>
						
					</td>
				<td>
						
					</td>
				<td>{{$m->price}}</td>
				<td>{{$m->count}}</td>
				<td>
					<form method="POST" action="{{URL::to('/')}}/fedback"> 
						<input type="hidden" name="id" value="{{$m->id}}">
						<div class="form-group">
							<label>Fedback:</label>
							<input type="text" name="fedback" class="form-control">
						</div>
						<input type="submit" name="">
						{{csrf_field()}}							
					</form>
				</td>
			</tr>
		@endforeach
			
	</table>
@endsection