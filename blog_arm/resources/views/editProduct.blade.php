@extends('layout')
@section('content')

<div class='row'>
<form method="post" action="{{URL::to('/')}}/editProduct/{{$product->id}}" class="col-md-6" enctype="multipart/form-data" id="pr-form">
    {{ csrf_field() }}


<div class="col-md-4" >

    <img  class="rounded-circle" width="100" height="100" src="{{URL::to('/')}}/uploads/{{$product->photo}}">
    
      <input type="file" name="file" id="file">

     

    <input type="text" name="name"  value="{{ $product->name }}" />

    <input type="text" name="price"  value="{{ $product->price }}" />

    <input type="text" name="count"  value="{{ $product->count }}" />

    

    <button type="submit">Save</button>
</div>
</div>
</form>

<script type="text/javascript">
  $("#file").change(function(){
    $("#pr-form").submit();
  })
</script>
@endsection