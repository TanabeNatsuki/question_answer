@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','categoried')

@section('content')
<div class="container">
<p>カテゴリ追加が完了しました</p>
<p><a href="/category">カテゴリ一覧に戻る</a></p>
</div>
@endsection

@section('footer')
<footer>
<h1>ランキング</h1>
<p><a href="/ranking">もっと見る</a></p>
</footer>
@endsection
