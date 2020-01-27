const token = $("#token").val()
$("#search").click(F);

$("#searchUser").on("input", F)

function F(){  
  $("#searchresult").empty();
  $("#search_result").empty();
  let search = $("#searchUser").val();
  if (search == "") {
    $("#searchresult").empty();
    $("#search_result").empty();
  } else {
    $.ajax({
      url: "search",
      type: 'post',
      data: {"_token" : token, search: search},
      success: function(r){
        console.log(r);
        r.forEach( function(item) {

          let text=`<button class="btn btn-sm btn-success float-right mt-2 add" data-id="${item.id}">Add Friend</button>`
          if (item.status==3) {
            text=''
          }
          else if (item.status==1) {
            text = `<button class="btn btn-sm btn-info float-right mt-2">Friend</button>`
          }
          else if (item.status==2) {
            text = `<button class="btn btn-sm btn-danger float-right mt-2 del_req" data-id="${item.id}">Delete Request</button>`
          }

          let n = $(`<div class="user_item p-3 " style = "width:321px">
            <h6>
            <img src="Images/${item['photo']}" width = "50" height = "50" style = 'border-radius:50%'>
            ${item['first_name']}
            ${text}
            </h6></div>`);
          $("#search_result").append(n);
      });
    }
  })
  }
}

function getRequest(){
  $.ajax({
    url: "getRequest",
    type: 'POST',
    data: {"_token" : token,},
    success: function(r){
      r = JSON.parse(r);
      r.forEach( function(item) {
        let n = $(`<div class=" p-3 bg-dark text-light" style = "width:500px">
          <img src="${item['photo']}" width = "50" height = "50" style = 'border-radius:50%'>
          ${item['first_name']}
          <button class="btn btn-sm btn-success float-right mt-2 add_friend" data-id="${item.id}">Add Friend</button>
          <button class="btn btn-sm btn-danger float-right mt-2 delete_request" data-id="${item.id}">Delete Request</button>
          </div>`);
        $("#request_result").append(n);
      });
    }
  });
}
$( "#notification" ).click(function() {
  $( "#notification_result" ).toggle( "slow", function() {
    getRequest();
  });
});

// $(document).click(function(event) {
//     if ( !$(event.target).hasClass('search_result')) {
//          $(".search_result").hide();
//     }
// });

// function closeMenu(){
//   $('#search_result').fadeOut(200);
// }


// $(document.body).click( function(e) {
//      closeMenu();
// });

// $("#search_result").click( function(e) {
//     e.stopPropagation(); // this stops the event from bubbling up to the body
// });



