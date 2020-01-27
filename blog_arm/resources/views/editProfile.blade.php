@extends('layout')
@section('content')


<form method="post" action="route('users.edit', $user)">
    {{ csrf_field() }}
    {{ method_field('patch') }}

    <input type="text" name="name"  value="{{ $user->name }}" />

    <input type="text" name="surname"  value="{{ $user->surname }}" />

    <input type="email" name="login"  value="{{ $user->login }}" />

    <input type="password" name="password" />


    <button type="submit">Send</button>
</form>

@endsection
