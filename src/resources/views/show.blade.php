@extends('common.layout')
@section('content')
    <h2>{{$user->name}}</h2>
    <div class="info">
        <li>{{$user->email}}</li>
        <li>{{$user->password}}</li>
    </div>
@endsection
