@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','question_complete')

@section('content')
<div class="container">
<p>質問の投稿が完了しました</p>
<p><a href="/question_all">質問一覧へ</a></p>
</div>
@endsection
