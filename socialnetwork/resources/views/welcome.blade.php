@extends('layouts.master')

@section('title') 

@endsection

@section('content') 

<div class="row">
    <div class="col-md-6">
        <h3>Registration or <a href="./loginpage">Log In</a></h3>
        <form action="./signup" method="post">
            <div class="form-group">
                <label for="email" style="color: red;">{{$errors->first('email')}}</label> <br>
                <label for="email">Your Email</label>
                <input class="form-control" type="email" name="email" id="email" value="{{Request::old('email')}}">
            </div>
            <div class="form-group">
                <label for="first_name" style="color: red;">{{$errors->first('first_name')}}</label> <br>
                <label for="first_name">Your First name</label>
                <input class="form-control" type="text" name="first_name" id="first_name" value="{{Request::old('first_name')}}">
            </div>
            <div class="form-group">
                <label for="password" style="color: red;">{{$errors->first('password')}}</label> <br>
                <label for="password">Your Password</label>
                <input class="form-control" type="password" name="password" id="password" value="{{Request::old('password')}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>

   
Welcome!
@endsection
