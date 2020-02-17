@extends('layouts.helloapp')

@section('title','ranking')

@section('head')
@parent
@endsection

@section('content')
<div class="ranking">
 <h1>ランキング</h1>
 <p>データベースで高評価順</p>
</div>
@endsection
