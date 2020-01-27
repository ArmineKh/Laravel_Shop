$.ajax({
	url: "server.php",
	type: "post",
	data: {action:"ajax4"},
	success: function(r){
		r = JSON.parse(r)
		console.log(r)
		let t = $(`<div></div>`)
		var h1 = $("<h1 id='"+r[0]['harc_id']+"' value = '"+r[0]['harc_id']+"' class = 'radio' name='harc' type='radio'>"+r[0]['harc']+"</h1>")
		t.append(h1)
		r.forEach(function(item){
			t.append(`
				<br>
				 <input class='pat' type="radio" name='pat' value="${item.id}" /> ${item.patasxan}    `);
		});
		$('body').append(t)
		
		
	}