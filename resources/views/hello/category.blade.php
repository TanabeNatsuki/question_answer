@extends('layouts.helloapp')

@section('title','category')

@section('head')
@parent
@endsection

@section('content')
<div class="category">
<h1>カテゴリ一覧</h1>
</div>
@endsection

@section('footer')
<footer>
<h1>ランキング</h1>
<p><a href="/ranking">もっと見る</a></p>
</footer>
@endsection
