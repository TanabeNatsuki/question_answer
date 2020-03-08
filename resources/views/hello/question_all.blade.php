@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','question_all')

@section('content')
<div class="container">
<div class="question_all">
  <h1>質問一覧</h1>
  @foreach($items as $item)
  <div class="search_data">
    <p><a href="/question_all/qa?id={{$item->id}}">タイトル:{{$item->title}}</a></p>
  <div class="created">
    <p>投稿日: {{$item->created_at}}</p>
    <p>カテゴリ:{{$item->category->getData()}}</p>
  </div>
</div>
  @endforeach
  <div class="pagent">
    {{$items->links()}}
  </div>
</div>
</div>
@endsection

@section('footer')
<footer>
<h1>ランキング</h1>
<p><a href="/ranking">もっと見る</a></p>
</footer>
@endsection
