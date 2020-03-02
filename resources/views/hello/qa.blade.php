@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','qa')

@section('content')
<div class="container">
  <div class="qa">
    <h1>タイトル: {{$items->title}}</h1>
    <p>カテゴリ: {{$items->category->getData()}}</p>
    <p>投稿日時: {{$items->created_at}}</p>
    <div class="q_content">
      <p>{{$items->content}}</p>
    </div>

  @if(Auth::check())
    <form action="/answer_form" method="post">
     @csrf
     <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
     <input type="hidden" name="question_id" value="{{$id}}">
     <input type="submit" value="質問に回答する">
    </form>
  @else
  <div class="auth_qa">
    <p><a href="/login">ログインして回答を投稿する</a></p>
  </div>
  @endif

    <div class="bestanswer">
      <p>ベストアンサー</p>
    </div>
    @foreach($answers as $answer)
    <div class="answer">
      <p>回答者: {{$answer->user->getData()}}</p>
      <p>{{$answer->content}}</p>
    </div>
    @endforeach
      <div class="pagent">
      {{$answers->links()}}
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
