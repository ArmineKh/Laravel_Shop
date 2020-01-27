@extends('layout')
@section('content')
<div class="cmx-auto ">
			@if(Session::get('error'))
				@foreach(Session::get('error') as $e)
				<li>{{$e}}</li>
				@endforeach
			@endif
			<br><br>
			<form method="post" action="./addProductData" enctype="multipart/form-data">

				<input type="text" name="name" class="form-control" placeholder="Enter product name">
				<input type="text" name="price" class="form-control" placeholder="Enter product price">
				<input type="text" name="count" class="form-control" placeholder="Enter product count">


				<input type="file" name="photo">

				<br><br>
				<input type="submit" name="submit" class="btn btn-info">
				{{csrf_field()}}
			</form>



		</div>

<script type="text/javascript">
  $("#prodIcon").change(function(){
    $("#form").submit();
  })
</script>

@endsection