@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','question_all')

@section('content')
<div class="question_all">
  <h1>質問一覧</h1>
</div>
@endsection

@section('footer')
<footer>
<h1>ランキング</h1>
<p><a href="/ranking">もっと見る</a></p>
</footer>
@endsection
