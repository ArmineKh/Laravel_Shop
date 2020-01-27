@extends('layout')
@section('content')
<div class='row' >
	@foreach($orders as $o)

	<div class="col-md-8">
		
		
		<h4>Order was received at {{$o->time}}  </h4>
		<h4>Order sum was {{$o->sum}} $</h4>
		<br>
		<form method="get" action="/fedback">
                        <input type="hidden" name="id" value="{{$o->id}}">
                        <div class="form-group">
                            <label>Fedback:</label>
                            <input type="text" name="fedback" class="form-control">
                        </div>
                        <input type="submit" name="">
                        {{csrf_field()}}                            
                    </form>

		
	</div>

	@endforeach
</div>



@endsection