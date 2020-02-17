@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','pass_change')

@section('content')
<div class="pass_change">
  <h1>パスワード変更</h1>

   <form method="post">
     <label>メールアドレス<input type="text" name="mail"></label>
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
