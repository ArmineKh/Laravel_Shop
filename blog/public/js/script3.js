const token3 = $("#token3").val();
const token = $("#token4").val();


$('#forgot').click(function(event) {
	let email = $("#forgotPassword").val();
	$.ajax({
	url: "forgotpassw",
	type: 'POST',
	data: {"_token" : token3,email: email },
	success: function(r){
		$('#forgotdiv').empty();
		let div = $(`
			<input type="text" name="code" id="code" class="input form-control" placeholder="Enter your code">
			<input type="text" name="password" id="password" class="input form-control" placeholder="Enter your new password">
			<input type="submit" name="submit" id="submit3" class="btn btn-info">
			<input type="hidden" id="token4" value="{{csrf_token()}}">

			`);
			 $('#forgotdiv').append(div);	
	}
})	
});

$('#submit3').click(function(){
	let code = $('#code').val();
	let password = $('#password').val();
	$.ajax({
		url: 'emailcode',
		type: 'POST',
		data: {"_token" : token4, code:code, password:password},
		success: function(r){

		}
	})
	
	


});