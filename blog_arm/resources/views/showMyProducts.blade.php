@extends('layout')
@section('content')
<div class='row'>
	@foreach($products as $p)

	<div class="col-md-4">

		<img class="rounded-circle" width="100" height="100" src="uploads/{{$p->photo}}">
		<h3>{{$p->name}}</h3>
		<p style="color:orange"><b> ${{$p->price}}</b></p>
		<p>left <b>{{$p->count}}</b> in stock</p>
		<p><i>seller - {{$p->user->name}} {{$p->user->surname}}</i></p>
		<a href="./editProduct/{{$p->id}}">Edit Product</a>
		<br>
		<a href="./deleteProduct/{{$p->id}}">Delete Product</a>

		
	</div>

	@endforeach
</div>


@endsection