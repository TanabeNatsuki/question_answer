@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','question_form')

@section('content')
<div class="question_form">
<h1>質問投稿</h1>
<form action="/question_complete">
  <label>タイトル:</label><input type="text" name="question_title"><br>
  <label>カテゴリ:</label><select></select><br>
  <label>質問  :</label><br>
  <textarea name="example1" cols="30" rows="50"></textarea><br>
  <input id="submit_button" type="submit" name="submit" value="投稿する"><br>
</form>
</div>
@endsection

@section('footer')
<footer>
<h1>ランキング</h1>
<p><a href="/ranking">もっと見る</a></p>
</footer>
@endsection
