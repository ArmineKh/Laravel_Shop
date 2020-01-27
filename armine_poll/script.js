$(".add").click(function() {
	$("#answers").append(`
		<input type = "text" class = "form-control answer" placeholder = "Write answer">
		<br>
		`);

});

$(".save").click(function(){
	let harc = $("#harc").val();
	let answer = $(".answer").toArray().map(a=>a.value);
	$.ajax({
		url: 'server.php',
		type: 'POST',
		data: {action: 'ajax1', harc: harc, answer: answer},
		success: function(r){
			$("#answers").empty();
			 $("#harc").val("");

		}
	});

});