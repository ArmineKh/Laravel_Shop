<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>


Orders
<!-- @extends('layout')
@section('content')
<!--_________ body __________-->
   <!--  <h1>Orders</h1>
    <table class="table table-bordered">
        <tr>
            <th>Time</th>
            <th>Sum</th>
            <th>Order Details</th>
        </tr>
        @foreach($result as $m)
            <tr>
                <td>{{$m->time}}</td>
                <td>{{$m->sum}}</td>
                <td><a href="{{URL::to('/')}}/orderdetails/{{$m->id}}">Details</a></td>
            </tr>
        @endforeach
            
    </table> -->
@endsection -->

orderdetails
<!-- @extends('layout')
@section('content')
<!--_________ body __________-->
    <!-- <h1>Order Details</h1>
    <table class="table table-bordered">
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Price</th>
            <th>Count</th>
            <th>Leave Your Fedback</th>
        </tr>
        @foreach($result as $m)
            <tr>
                <td><img src="{{URL::to('/')}}/images/{{$m->product->photo}}" width="100" height="100" ></td>
                <td>{{$m->product->name}}</td>
                <td>{{$m->price}}</td>
                <td>{{$m->count}}</td>
                <td> 
                    <form method="get" action="/fedback">
                        <input type="hidden" name="id" value="{{$m->id}}">
                        <div class="form-group">
                            <label>Fedback:</label>
                            <input type="text" name="fedback" class="form-control">
                        </div>
                        <input type="submit" name="">
                        {{csrf_field()}}                            
                    </form>
                </td>
            </tr>
        @endforeach
            
    </table>
@endsection -->

 -->


<!--  productfedbacks
 @extends('layout')
@section('content')
<!--_________ body __________-->
<<!-- h1>Fedbacks</h1>
    <table class="table table-bordered">
                
                    @foreach($result as $m)
                    <tr>
                        <td>{{$m->fedback}}</td>
                    </tr>
                    @endforeach
                
    </table>
@endsection --> -->