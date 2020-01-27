  <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
	<?php require_once 'header.php' ?>
	<div class = "bg-info p-3 w-25 mx-auto">
	<input type="text" id="harc" placeholder="Write question" class="form-control"> <br>
	<button id='add' class = 'btn btn-light add'>+</button> <br>
	<div id='answers'></div><br>
	<button class="btn btn-danger save">Save</button> <br>
	</div>
</body>
<script type="text/javascript" src='script.js'></script>
</html>