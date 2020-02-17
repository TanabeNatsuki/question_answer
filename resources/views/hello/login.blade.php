@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','login')

@section('content')
<div class="loginpage">
  <h1>ログイン</h1>
  <form method="post">
  <label>メールアドレスorユーザーネーム<input type="text" name="loginname"></label><br>
  <label>パスワード<input type="text" name="loginpass"></label><br>
  <input type="submit" value="送信">
</form>
@endsection

@section('footer')
<footer>
<h1>ランキング</h1>
<p><a href="/ranking">もっと見る</a></p>
</footer>
@endsection
