@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','user')

@section('content')
<div class="user">
  @if(Auth::check())
  <h1>ユーザーネーム</h1>
  @auth
  <div class="user_data">
   <p>{{Auth::user()->name}}</p>
  </div>
  @endauth
  <h1>メールアドレス</h1>
  @auth
  <div class="user_data">
    <p>{{Auth::user()->email}}</p>
  </div>
  @endauth
  <h1>所持ポイント</h1>
  <h1>ランク</h1>
  <p><a href="/pass_change">パスワードを変更</a></p>
  @else
  <p><a href="/login">ログインしてユーザー情報を表示</a></p>
  <p><a href="/register">会員登録がまだな方はこちらで登録</a></p>
  @endif
</div>
@endsection

@section('footer')
<footer>
<h1>ランキング</h1>
<p><a href="/ranking">もっと見る</a></p>
</footer>
@endsection
