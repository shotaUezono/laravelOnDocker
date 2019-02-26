@extends('common.layout')

@section('content')
@foreach ($users as $user)
    <li>
    
    num:{{$user->id}} | name: <a href='user/{{$user->id}}' >{{$user->name}}</a> | mail:{{$user->email}}
    </li>
@endforeach
@endsection