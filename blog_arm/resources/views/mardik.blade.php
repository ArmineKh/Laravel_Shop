<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<div class="container">
	<h1>Users</h1>
	<div class="row">
		<table class="table table-bordered col-md-6">
			<tr>
				<th>id</th>
				<th>name</th>
				<th>surname</th>
				<th>age</th>

			</tr>
			@foreach($result as $r)
			<tr>
				<td>{{$r->id}}</td>
				<td>{{$r->name}}</td>
				<td>{{$r->surname}}</td>
				<td>{{$r->age}}</td>

			</tr>
			@endforeach
		</table>
		<div class="col-md-4">
		<h2>Insert new user</h2>
			<form method="POST" action="./avelacnel">
				<input type="text" name="name">
				<input type="text" name="surname">
				<input type="text" name="age">
				<input type="submit" name="submit">
				{{csrf_field()}}
			</form>
		</div>
	</div>

	
</div>
