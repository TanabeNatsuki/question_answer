@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','question_form')

@section('content')
<div class="question_form">
<h1>質問投稿</h1>
<form action="/question_complete">
  @error('title')
  <div class="error_message">
    <P>{{$message}}</p>
  </div>
  @enderror
  <label>タイトル:</label><input type="text" name="title"><br>
  @error('category_id')
  <div class="error_message">
    <P>{{$message}}</p>
  </div>
  @enderror
  <label>カテゴリ:</label>
  <select name="category_id">
  @foreach($items as $item)
  <option value="{{$item->id}}">{{$item->name}}</option>
  @endforeach
  </select>
  <br>
  @error('content')
  <div class="error_message">
    <P>{{$message}}</p>
  </div>
  @enderror
  <label>質問  :</label><br>
  <textarea name="content" cols="30" rows="50"></textarea><br>
  <input type="submit" name="submit" value="投稿する"><br>
</form>
</div>
@endsection

@section('footer')
<footer>
<h1>ランキング</h1>
<p><a href="/ranking">もっと見る</a></p>
</footer>
@endsection
