@extends('layout')
@section('content')


<!-- Tab panes -->

  	<div class='col-md-4 '>
	<h1>{{Session::get('user')->name}}</h1>
	<h1>{{Session::get('user')->surname}}</h1>
  @if(!empty(Session::get('user')->photo))
    <img class="rounded-circle" width="200" height="200" src="uploads/{{Session::get('user')->photo}}">
    @else
    <img class="rounded-circle" width="200" height="200" src="http://portal.bilardo.gov.tr/assets/pages/media/profile/profile_user.jpg">
  @endif
    <form id="my-form" method="post" action="./changePic" enctype="multipart/form-data">
      <input type="file" name="avatar" id="nkar">
      {{csrf_field()}}
    </form>


</div>


<script type="text/javascript">
  $("#nkar").change(function(){
    $("#my-form").submit();
  })
</script>
@endsection
