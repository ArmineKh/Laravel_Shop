@extends('layout')
@section('content')
<div id="searchresult" class="row"></div>
<div class='row' id="showProduct">
	@foreach($products as $p)

	<div class="col-md-4">

		<img class="rounded-circle" width="100" height="100" src="{{url('/uploads/'.$p->photo)}}">
		<h3>{{$p->name}}</h3>
		<p style="color:orange"><b> ${{$p->price}}</b></p>
		<p>left <b>{{$p->count}}</b> in stock</p>
		<p><i>seller - {{$p->user->name}} {{$p->user->surname}}</i></p>
		<a href="./addToCard/{{$p->id}}">Add to card</a>
		<br>
		<a href="./addToWish/{{$p->id}}">Add to Wish List</a>

		
	</div>

	@endforeach
</div>


@endsection