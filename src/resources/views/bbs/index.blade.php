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
<!--
@isset($name, $comment)
<h1>{{ $name }}さんの直前の投稿</h1>
{!! nl2br(e($comment)) !!}
<br><hr>
@endisset
-->

@isset($bbs)
<div class="mainbbs">
@foreach ($bbs as $d)
    <p class="bbsname">{{ $d->name }}の投稿</p>
    <pre class="bbsbody">{!! nl2br(e($d->comment)) !!}</pre>
    <br><hr>
@endforeach
</div>
@endisset

<!-- main body -->
<div class="bbsform">
<h2> form </h2>
<form action="/bbs" method="POST" >
    <p>name:</p>
    <input name="name">
    <br>
    <p>comment:</p>
    <textarea name="comment" rows="4" cols="40"></textarea>
    <br>
    {{ csrf_field() }}
    <button class="btn btn-success"> 送信 </button>
</form>
</div>

@endsection