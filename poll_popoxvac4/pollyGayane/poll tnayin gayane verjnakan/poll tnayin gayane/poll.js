$.ajax({
	url: "server.php",
	type: "post",
	data: {action:"ajax2"},
	success: function(r){
		r = JSON.parse(r)
		let t = $(`<div></div>`)
		r.forEach(function(item){
			t.append(`
				<input id="${item.ID}" value = "${item.ID}" class = 'radio' name='harc' type='radio'>${item.harc}</input><br>

				`)
		})
		t.appendTo("body")
		
	}

})
$(document).on('click', '.radio', function(event) {
	let id = $(this).val()
	$.ajax({
	url: "server.php",
	type: "post",
	data: {action:"ajax3", id:id},
	success: function(r){
		
		
	}
	})
})