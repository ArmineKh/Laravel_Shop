
$.ajax({
	url: 'server.php',
	type: 'POST',
	data: {action: 'ajax2'},
	success: function(r){
		r = JSON.parse(r);
		r.forEach( function(item){ 
       $("body").append(`
 					<input type="radio" name="harc" class="harc" id=${item.id}> ${item.harc}<br>
		  	`)
  
		});
	}
	});


$(document).on("change", ".harc", function(){
let id = $(this).attr('id');

	$.ajax({
		url: 'server.php',
		type: 'POST',
		data: {action: 'ajax3', id: id},
		success: function(r){
			console.log(r)
		}
	});
	
});