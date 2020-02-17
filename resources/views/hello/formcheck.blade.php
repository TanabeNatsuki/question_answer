@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','formcheck')

@section('content')
<div class="formcheck">
  <h1>入力内容を確認してください</h1>
  <p>メールアドレス:{{ $values['1'] }}</p>
  <p>ユーザーネーム:{{ $values['2'] }}</p>
  <p>よろしければ送信ボタンを押してください</p><br>
  <p>メールアドレスに送られてきた登録用URLにアクセスして登録完了です</p>
  <form method="post" action="/mail_send">
    @csrf
    <input type="submit" value="送信">
  </form>
</div>
@endsection

@section('footer')
<footer>
<h1>ランキング</h1>
<p><a href="/ranking">もっと見る</a></p>
</footer>
@endsection
