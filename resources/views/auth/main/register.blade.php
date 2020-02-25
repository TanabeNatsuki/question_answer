@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','register')

@section('content')
<div class="container">
 <h1>本会員登録</h1>

  @isset($message)
    {{$message}}
  @endisset

  <p>{{$email_token}}</p>

  @empty($message)
  <form method="POST" action="{{ route('register.main.check') }}">
     @csrf
     <label for="name">名前</label>
     <input
       id="name" type="text"
       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
       name="name" value="{{ old('name') }}" required><br>

      @if ($errors->has('name'))
        <span class="invalid-feedback">
        <strong>{{ $errors->first('name') }}</strong>
        </span>
      @endif

      <label for="name_pronunciation">フリガナ</label>

      <input id="name_pronunciation" type="text"
      class="form-control{{ $errors->has('name_pronunciation') ? ' is-invalid' : '' }}"
      name="name_pronunciation" value="{{ old('name_pronunciation') }}"
      required><br>

      @if ($errors->has('name_pronunciation'))
        <span class="invalid-feedback">
        <strong>{{ $errors->first('name_pronunciation') }}</strong>
        </span>
      @endif

      <input type="hidden" name="email_token" value="{{$email_token}}">

      <input type="submit" value="確認画面へ">
     </form>
   @endempty
 </div>
@endsection
