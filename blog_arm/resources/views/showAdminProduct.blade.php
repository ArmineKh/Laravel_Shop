@extends('layouts.admin')
@section('content')
<div id="searchresult" class="row"></div>
<div class='row' id="showProduct">
	@foreach($products as $p)

	<div  class="col-md-4">

		<img class="rounded-circle" width="100" height="100" src="{{url('/uploads/'.$p->photo)}}">
		<h3>{{$p->name}}</h3>
		<p style="color:orange"><b> ${{$p->price}}</b></p>
		<p>left <b>{{$p->count}}</b> in stock</p>
		<p><i>seller - {{$p->user->name}} {{$p->user->surname}}</i></p>
		<button class="btn btn-primary activ" value="{{$p->id}}">Add to activ</button>
		<button class="btn btn-danger delete"  value="{{$p->id}}">Delete</button>
		<div id="send"></div>


	

		
	</div>

	@endforeach
</div>

	<input type="hidden" id="token1" value="{{csrf_token()}}">


<script type="text/javascript" src="{{asset('js/script2.js')}}"></script>
@endsection
