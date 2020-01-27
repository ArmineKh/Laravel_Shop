@extends('layouts.admin')
@section('content')
<div class='row' id="showUsers">
	@foreach($users as $p)

	<div class="col-md-4">
		
		<img class="rounded-circle" width="100" height="100" src="{{url('/uploads/'.$p->photo)}}">
		<h3>{{$p->name}}  {{$p->surname}}</h3>
		<p>Age {{$p->age}}</p>
		<p><i>{{$p->login}}</i></p>
		<button class="btn btn-danger">
		@if($p->blocktime == 0)
					<td><a  style="text-decoration:none; color: black" href="{{URL::to('/')}}/block/{{$p->id}}">Block</a></td>
				@else
					<td>Block time is:{{$p->blocktime}}</td>
				@endif
				</button>
		<br>

		
	</div>

	@endforeach
</div>
{{-- 
<input type="hidden" id="token1" value="{{csrf_token()}}">


<script type="text/javascript" src="{{asset('js/script2.js')}}"></script>  --}}

@endsection