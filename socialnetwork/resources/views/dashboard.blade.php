@extends('layouts.master')

@section('title')  
Welcome!
@endsection

@section('content') 
<!-- @foreach(Session::get('user') as $user) -->

<!-- @endforeach -->
<section class="row new-post">
<div id="search_result" class="search_result"></div>
<div id="notification_result" class="notification_result"></div>  


<div class="profile">
	<div class="text-center">
		@if(Session::get('user')->photo)
		<img src="Images/{{Session::get('user')->photo}}" width="200px" height="250px" class="author-img">
		@else 
		<img src="Images/profile.png" width="200px" height="250px" class="author-img">
		@endif
		<div style="text-align: center;">
			<h4>{{Session::get('user')->first_name}}</h4>
		</div>
	</div>
</div>
	<div class="col-md-6 col-md-6-offset-3">
		<header><h3>What do you have to say?</h3></header>
		<form class="form-group" action="./createpost" method="post">
			{{ csrf_field() }}
			<div class="form-group">
            <label for="email" style="color: red;">{{$errors->first('body')}}</label> <br>
            <label for="email" style="color: green;">{{Session::get('message')}}</label> <br>
			<textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Posts..."></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Create Post</button>
		</form>
	</div>
</section>

<section class="row posts">
	<div class="col-md-6 col-md-6-offset-3">
		<header><h3>What other people say ...</h3></header>
		@foreach($posts as $post)
		<article class="posts" id="postarticl" postid = "{{$post->id}}">
			<p> {{ $post->body }} </p>
			<div class="info">
				<h5>Posted by {{$post->user->first_name}} on {{ date("F j, Y, g:i a", strtotime($post->created_at))  }}</h5>
			</div>
<div class="interaction">
	@if (Session::get('user')->id != $post->user_id)
		<a href="#" class="like" id = "{{$post->id}}">Like</a> |
		<a href="#" class="like" id = "{{$post->id}}">Dislike</a>
<input id="token1" name="_token" type="hidden" value="{{csrf_token()}}">
	@endif
	@if (Session::get('user')->id == $post->user_id)
		|
		<a href="#" data-toggle="modal" data-target="#myModal" class="edit" id = "{{$post->id}}">Edit</a> |
		<a href="./delete/{{$post->id}}">Delete</a> 
	@endif
</div> 
		</article>
		@endforeach

	</div>
</section>

<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Open modal
</button> -->

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Post</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
		<form>
        <div class="form-group">
        	<label for="post-body">Edit the post</label>
        	<textarea name="post-body" id="post-body" rows="5" class="form-control"></textarea>
        </div>
			
		</form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="model-save" postId ="{{$post->id}}" data-dismiss="modal">Save changes</button>

      </div>

    </div>
  </div>
</div>



<!-- <script type="text/javascript">
	var token = "{{ csrf_token() }}"; 
</script> -->
@endsection
