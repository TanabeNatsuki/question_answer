@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','pre_register')

@section('content')
サイトへのアカウント仮登録が完了しました。<br>
<br>
以下のURLからログインして、本登録を完了させてください。<br>
{{url('register/verify/'.$token)}}
@endsection

@section('footer')
<footer>
<h1>ランキング</h1>
<p><a href="/ranking">もっと見る</a></p>
</footer>
@endsection
