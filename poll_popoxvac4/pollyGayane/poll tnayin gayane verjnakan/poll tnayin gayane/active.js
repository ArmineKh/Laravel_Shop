$.ajax({
	url: "server.php",
	type: "post",
	data: {action:"active_harc"},
	success: function(r){
		r = JSON.parse(r)
		console.log(r)
		let t = $(`<div></div>`)
		var h1 = $("<h1 id='"+r[0]['harc_id']+"' value = '"+r[0]['harc_id']+"' class = 'radio' name='harc' type='radio'>"+r[0]['harc']+"</h1>")
		t.append(h1)
		r.forEach(function(item){
			t.append(`
				<br>
				 <input class='pat' type="radio" name='pat' value="${item.ID}" /> ${item.patasxan}

				`)
		})
		$('body').append(t)
		
		
	}

})
$(document).on('click', '.pat', function(){
	
let id = $(this).val()
$.ajax({
	url: "server.php",
	type: "post",
	data: {action:"miavor", id:id},
	success: function(r){
		r=JSON.parse(r)
		console.log(r)
		let arr = []
		r.forEach(function(item){
		
			let n = item['patasxan']
			let d =+item['miavor']

			let obj = {}
				console.log(obj)

			obj.name = n
			obj.data = [d]
			arr.push(obj)
			console.log(r)
			
		})

// r-vra ciklenq pttvum, vercnumenq datark zangvac, u qcumenq objekt namey patasxan, data-nnumber

	

        let g = new chart()
        g.create(arr)
		
		
	}

})
})