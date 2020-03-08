@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','TOP')

@section('content')
<div class="container">
   <div class="content">
    <h1><a href="/question_all">質問一覧</a></h1>
   </div>
   <div class="content2">
     <h1><a href="/question_form">質問投稿</form></h1>
   </div>
</div>
@endsection

@section('footer')
<footer>
<h1>ランキング</h1>
<p><a href="/ranking">もっと見る</a></p>
</footer>
@endsection
