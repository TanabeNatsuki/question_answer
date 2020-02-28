@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','question_get')

@section('content')
<div class="container">
  <h1>検索結果</h1>
  @foreach($searchs as $search)
  <div class="search_data">
  <p>タイトル:{{$search->title}}</p>
  <div class="created">
    <p>投稿日: {{$search->created_at}}</p>
  </div>
  </div>
  @endforeach
</div>
@endsection
