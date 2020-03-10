@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','category_add')

@section('content')
<div class="container">
  <div class="category_add">
  <h1>カテゴリ追加</h1>
    <form action="categoried" method="post">
      @csrf
      @error('name')
      <div class="error_message">
        <p>{{$message}}</p>
      </div>
      @enderror
      <label>カテゴリ名<input type="text" name="name"></label><br>
      <input type="submit" value="送信">
    </form>
    <div class="to_back">
    <P><a href="/top" id="back">戻る</a></p>
    </div>
  </div>
</div>
@endsection
