@extends('common.header')

@section('content')

<!-- error message -->
@if ($errors->any())
    <h2>エラーメッセージ</h2>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif


<!-- before post infomation -->
@isset($name, $comment)
<h1>{{ $name }}さんの直前の投稿</h1>
{!! nl2br(e($comment)) !!}
<br><hr>
@endisset

<!-- main body -->
<h2> form </h2>
<form action="/bbs" method="POST" >
    name:<br>
    <input name="name">
    <br>
    comment:<br>
    <textarea name="comment" rows="4" cols="40"></textarea>
    <br>
    {{ csrf_field() }}
    <button class="btn btn-success"> 送信 </button>
</fomr>


@endsection