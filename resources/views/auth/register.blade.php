@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','register')

@section('content')
<div class="container">
  <h1>仮会員登録</h1>

  <form method="POST" action="{{ route('register.pre_check')}}">
    @csrf

    @if($errors->has('email'))
    <div class="error_message">
     <span>
       <strong>{{ $errors->first('email') }}</strong><br>
     </span>
   </div>
    @endif

    <label for="email">メールアドレス</label>


   <input id="email" type="email" class="form-control{{$errors->has('email') ? 'is-invalid':''}}" name="email" value="{{ old('email') }}" required><br>

   @if($errors->has('password'))
   <div class="error_message">
     <span>
      <strong>{{ $errors->first('password') }}</strong><br>
     </span>
   </div>
   @endif

    <label for="password">パスワード</label>

    <input id="password" type="password" class="form-control{{ $errors->has('password') ? 'is-invalid':''}} " name="password" required><br>

    <label for="password-confirm">パスワード（確認用）</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required><br>

    <button type="submit" class="btn btn-primary">確認画面</button>

</div>
@endsection
