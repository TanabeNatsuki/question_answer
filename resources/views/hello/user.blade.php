@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','user')

@section('content')
<div class="user">
  <h1>ユーザーネーム</h1>
  <h1>メールアドレス</h1>
  <h1>所持ポイント</h1>
  <h1>ランク</h1>
  <h1>パスワード</h1>
  <p>パスワードを表示</p>
  <p><a href="/pass_change">パスワードを変更</a></p>
@endsection

@section('footer')
<footer>
<h1>ランキング</h1>
<p><a href="/ranking">もっと見る</a></p>
</footer>
@endsection
