@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('content')
<div class="container">
  <h1>本会員登録</h1>
  <form method="POST" action="{{ route('register.main.registered')}}">
    @csrf
    <tr>

    <label for="name">名前</label>
    <span class="">{{$user->name}}</span><br>
    <input type="hidden"  name="name" value="{{$user->name}}">
    <input type="hidden" name="email_token" value="{{$email_token}}">

    <label name="name_pronunciation">フリガナ</label>
    <span class="">{{$user->name_pronunciation}}</span><br>
    <input type="hidden" name="name_pronunciation" value="{{$user->name_pronunciation}}">

    <input type="submit" value="本登録">
  </form>
</div>
@endsection
