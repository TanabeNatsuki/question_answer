@extends('layouts.app')

@section('head')
@parent
@endsection

@section('title','delete')

@section('content')
<div class="delete">
<h1>登録解除</h1>
<form action="/deleted" method="post">
  @csrf
  <label>メールアドレス<input type="text" name="delete_data"></label>
  <input type="submit" value="送信">
</form>
</div>
@endsection
