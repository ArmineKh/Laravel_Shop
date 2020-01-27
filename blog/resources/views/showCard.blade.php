@extends('layout')
@section('content')

			
				
				<li style="list-style-type:none">{{Session::get('error1')}}</li>
			

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
	@foreach($cart as $p)

				<tr>
					<td><img width="100" height="100" src="{{URL::to('/')}}/uploads/{{$p->product->photo}}" alt="{{$p->product->name}}"></td>
					<td><p>{{$p->product->name}}</p></td>
					<td><p>{{$p->count}}</p></td>
					<td><p>${{$p->product->price}}</p></td>
					<td><p>${{$p->product->price * $p->count}}</p></td>
					<td>
						<a href="./card/remove/{{$p->product_id}}/{{$p->user_id}}">Delete</a> <br>
						<a href="./card/countUp/{{$p->product_id}}/{{$p->user_id}}">Count Up</a> <br>
						<a href="./card/countDown/{{$p->product_id}}/{{$p->user_id}}">Count Down</a> <br>
						<a href="./card/moveWishList/{{$p->product_id}}/{{$p->user_id}}/{{$p->count}}">Add to Wish List</a> <br>	
					</td>
				</tr>
					
				@endforeach
		</table>
						
		<button class="btn btn-info align-content">
			<a href="./addmoney/stripe">Buy</a>
		</button>
</div>


@endsection