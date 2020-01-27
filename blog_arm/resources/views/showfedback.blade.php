 @extends('layout')
@section('content')

<h1>Fedbacks</h1>
    <table class="table table-bordered">
                
                    @foreach($result as $m)
                    <tr>
                        <td>{{$m->fedback}}</td>
                    </tr>
                    @endforeach
                
    </table>
@endsection