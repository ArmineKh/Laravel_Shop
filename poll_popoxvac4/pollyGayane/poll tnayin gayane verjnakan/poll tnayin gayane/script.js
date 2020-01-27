$('#add').click(function() {
		$('#answers').append(`
				<input type="text" class='form-control answer' placeholder="Write answer" />
				<br>



		`)
});
$('.save').click(function() {
	let harc = $('#harc').val()
	let answer = $(".answer").toArray().map(a=>a.value)
	$.ajax({
		url: "server.php",
		type: "post",
		data: {action: "ajax1", harc:harc, answer:answer},
		success:function(r){
			$('#answers').empty()
			$('#harc').val("")
		}
// poll php , poll ket js nayev, baceluc miangiaic ajaxem uxakrkum katnamtqeri nman cucadrum enq menak harcery select * harc ., input radio kojak
// cucadreluc heto kojaki kliky, amen kojak sxmeluc activy 1ov avelanuma






	})
});