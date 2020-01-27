$(".like").on('click', function(event){
	event.preventDefault();
	var islike = event.target.previousElementSibling == null;
	post_id = $(this).attr('id');
	var token1 = $("#token1").val();
	// console.log(post_id);
	$.ajax({
		method:'POST',
		url: "./like",
		dataType:'json',
		data:{islike:islike, post_id:post_id, '_token': '{{ csrf_token() }}'}, 
		success: function(r){
			console.log(islike,post_id);
		}
	});
});