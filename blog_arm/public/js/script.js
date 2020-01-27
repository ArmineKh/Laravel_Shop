const token = $("#token").val()

function updateMinInput(val) {
          $('#minrange').val(val + " $"); 
        }

function updateMaxInput(val) {
          $('#maxrange').val(val + " $"); 
        }
$("#search").click(F);

$("#searchProduct").on("input", F)

function F(event) {
// $('#showProduct').css('display', 'none');
let data = $('#searchProduct').val();
let min = $('#min').val();
let max = $('#max').val();
let k= true;
let error = $(`<div ><h1 id = "error" ></h1></div>`).css("color","red");
if(data == ""){
	error.html('Enter product name');
	$("#searchresult").append(error);
	k = false;
}
if (min<0) {
	error.html('Product price must be bigger then 0');
	$("#searchresult").append(error);
	k = false;
}
if (max>100000) {
	error.html('Product price must be smaller then 100000');
	$("#searchresult").append(error);
	k = false;
}
if (k) {

$("#searchresult").empty();
$.ajax({
	url: "search",
	type: 'POST',
	data: {"_token" : token,param1: data, min: min, max: max},
	success: function(r){

		 r.forEach(function(item){
			console.log(item.name)
			let div = $(` 
			<div>
				<img class="rounded-circle" width="100" height="100" src="uploads/${item.photo}">
				<h3>${item.name}</h3>
				<p style="color:orange"><b> ${item.price}</b></p>
				<p>left <b>${item.count}</b> in stock</p>
				<p><i>seller - ${item.user.name} ${item.user.surname}</i></p>
			
				<a href="./addToCard/${item.id}">Add to card</a>
				<br>
				<a href="./addToWish/${item.id}">Add to Wish List</a>

			</div>
			`);
			$("#searchresult").append(div);
		})
	}
})


}


}

