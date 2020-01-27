 @extends('layouts.master')

@section('title') 
Welcome!
@endsection

@section('content') 
    <div class="col-md-6">
        <h3>Log In</h3>
        <h3 class="text-success">{{Session::get('message')}}</h3>   
        <form action="./signin" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email" style="color: red;">{{$errors->first('email')}}</label> <br>
                <label for="email">Your Email</label>
                <input class="form-control" type="email" name="email" id="email" value="{{Request::old('email')}}">
            </div>
            <div class="form-group">
                <label for="password" style="color: red;">{{$errors->first('password')}}</label> <br>
                <label for="password">Your Password</label>
                <input class="form-control" type="password" name="password" id="password" value="{{Request::old('password')}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
    </div>
</div>
@endsection