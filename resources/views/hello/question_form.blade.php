@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','question_form')

@section('content')
<div class="question_form">
<h1>質問投稿</h1>
<form>
  <label>タイトル:</label><input type="text" name="question_title">
  <label>カテゴリ:</label><select></select>
  <label>質問  :</label>
  <textarea name="example1" cols="30" rows="50"></textarea>
  <input id="submit_button" type="submit" name="submit" value="投稿する">
</form>
</div>
@endsection

@section('footer')
<footer>
<h1>ランキング</h1>
<p><a href="/ranking">もっと見る</a></p>
</footer>
@endsection
