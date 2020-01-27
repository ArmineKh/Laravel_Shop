@if(count(@errors)>0)
<div class="row">
	<div class="col-md-4 col-md-offset">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
</div>
@endif

@if(Session::has('message'))
<div class="row">
	<div class="col-md-4 col-md-offset">
		<h5>{{Session::get('message')}}</h5>
	</div>
</div>
@endif