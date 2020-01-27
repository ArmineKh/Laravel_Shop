@extends('layout')
@section('content')
<link rel="stylesheet" type="text/css" href="public/css/logInStyle.css">

		<div class="col-md-4 w-25 mx-auto p-3 bg-dark text-light reg">
			<h1>Forgot password</h1>

			
			<div id="forgotdiv">

				<input type="text" name="login" id="forgotPassword" class="input form-control" placeholder="Enter your login">


				<input type="submit" name="submit" id="forgot" class="btn btn-info">
				<input type="hidden" id="token3" value="{{csrf_token()}}">

				
			</div>
		</div>
<script type="text/javascript" src="{{asset('js/script3.js')}}"></script>
@endsection