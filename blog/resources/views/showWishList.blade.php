@extends('layout')
@section('content')

				<p>{{Session::get('error1')}}</p>

			
<div class='row'>
		<table class="table table-bordered">
			<tr>
				<th>image</th>
				<th>name</th>
				<th>ordered count</th>
				<th>price</th>

				<th>total price</th>
				<th>actions</th>
			</tr>
	@foreach($wishes as $p)

				<tr>
					<td><img width="100" height="100" src="{{URL::to('/')}}/uploads/{{$p->product->photo}}" alt="{{$p->product->name}}"></td>
					<td><p>{{$p->product->name}}</p></td>
					<td><p>{{$p->count}}</p></td>
					<td><p>${{$p->product->price}}</p></td>
					<td><p>${{$p->product->price * $p->count}}</p></td>
					<td>
						<a href="./wish/remove/{{$p->product_id}}/{{$p->user_id}}">Delete</a> <br>
						<a href="./wish/countUp/{{$p->product_id}}/{{$p->user_id}}">Count Up</a> <br>
						<a href="./wish/countDown/{{$p->product_id}}/{{$p->user_id}}">Count Down</a> <br>
						<a href="./wish/moveCard/{{$p->product_id}}/{{$p->user_id}}/{{$p->count}}">Add to Card</a> <br>

					</td>
				</tr>
					
					 

					

				@endforeach
		</table>
</div>


@endsection