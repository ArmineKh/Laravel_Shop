// const token = $("#token").val()

$(document).on('click','.add', function(){
  let id = $(this).data('id');
  $(this).after(` <button class="btn btn-sm btn-danger float-right mt-2 del_req" data-id="${id}">Delete Request</button>`)
  $(this).remove();
  $.ajax({
    url: '/addFriend',
    type: 'POST',
    data: { "_token" : token, id : id},
    success: function(r){
      console.log(r);
    }
  });
});




$(document).on("click", ".del_req", function(){
let friend_id = $(this).attr('data-id');
let d = $(this);
$.ajax({
  url: "deleteRequest",
  type: 'POST',
  data:{"_token" : token, friend_id: friend_id},
  success: function(r){
   d.attr("html", "Add Request").removeClass('del_req').addClass('add');
  }
})
});

// $(".notific_icon").click(function(event) {
//   $("#request_result").slideToggle('slow');
// });