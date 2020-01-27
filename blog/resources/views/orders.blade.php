@extends('layout')
@section('content')
<!--_________ body __________-->
	<h1>Orders</h1>
	<table class="table table-bordered">
		<tr>
			<th>Time</th>
			<th>Sum</th>
			<th>Order Details</th>
		</tr>
		@foreach($result as $m)
			<tr>
				<td>{{$m->time}}</td>
				<td>{{$m->sum}}</td>
				<td><a href="{{URL::to('/')}}/orderdetails/{{$m->id}}">Details</a></td>
			</tr>
		@endforeach
			
	</table>
@endsection