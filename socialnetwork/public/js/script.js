
var post_id = 0;
var postBodyElement = null;

$('.edit').on('click', function(event){
	event.preventDefault();
	postBodyElement = event.target.parentNode.parentNode.childNodes[1];
	var postBody = postBodyElement.textContent;
	$('#post-body').val(postBody);
	post_id = $(this).attr('id');
// console.log(post_id);
}); 

$('#model-save').on('click', function(){
	// var post_id = $('#postarticl').attr('postid');
	$.ajax({
		method: 'POST',
		url: './edit',
		data:{body: $('#post-body').val(), postId: post_id, _token: token },
		success: function(r){
			// console.log(JSON.stringify(r));
			$(postBodyElement).text(r['new_body']);
			location.reload();
			// $('#myModal').modal('hide');
		}
	});
	
});




