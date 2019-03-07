@extends('common.layout')

@section('content')
<!-- エラーメッセージ。なければ表示なし -->
@if ($errors->any())
<ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
<ul/>
@endif

<!-- フォーム -->
<form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data">

    <!-- アップロードした画像。なければ表示しない -->
    @isset ($filename)
    <div>
        <img src="{{ asset('storage/app/public/' . $filename) }}">
    </div>
    @endisset

    <label for="photo">画像ファイル:</label>
    <input type="file" class="form-control" name="file">
    <br>
    <hr>
    {{ csrf_field() }}
    <button class="btn btn-success"> Upload </button>
</form>

@endsection