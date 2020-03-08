@extends('layouts.registers')

@section('head')
@parent
@endsection

@section('title','register_check')

@section('content')
<div class="cont">
  <h1>仮会員登録</h1>
  <form method="POST" action="{{ route('register') }}">
   @csrf
    <lavel for="email">メールアドレス</label>
    <span class="">{{$email}}</span><br>
    <input type="hidden" name="email" value="{{$email}}">
    <label for="password">パスワード</label>
    <span class="">{{$password_mask}}</span><br>
    <input type="hidden" name="password" value="{{$password}}">
    <button type="submit" class="btn btn-primary">仮登録</button>
  </form>
@endsection
