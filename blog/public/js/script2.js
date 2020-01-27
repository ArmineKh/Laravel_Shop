const token1 = $("#token1").val()
$('.activ').click(function(){
	let prod_id= $(this).val();
	console.log(prod_id)
	$(this).parent().remove()
	$.ajax({
	url: "activ",
	type: 'POST',
	data: {"_token" : token1,prod_id:prod_id },
	success: function(r){

}
})
})

$('.delete').click(function(){
	let prod_id= $(this).val();
	console.log(prod_id)
	$(this).parent().remove()
	$.ajax({
	url: "delete",
	type: 'POST',
	data: {"_token" : token1,prod_id:prod_id },
	success: function(r){
		let div = $(`<div>
				<input type="text" name="mail">
				<button class="btn btn-info send" value="${prod_id}">Send</button>
			</div>
			`);
		$("#send").append(div);
}
})
})

$('.send').click(function(){
	let product_id = $(this).val();
	let mess = $(this).parent().find('input').val();
	$.ajax({
		url:'sendMess',
		type: 'POST',
		data: {"_token" : token1,product_id:product_id, mess:mess },
		success: function(r){

		}
	})
 })

$('.block').click(function(){
	let user_id= $(this).val();
	$(this).parent().remove()
	$.ajax({
	url: "block",
	type: 'POST',
	data: {"_token" : token1,user_id:user_id },
	success: function(r){

}
})
})