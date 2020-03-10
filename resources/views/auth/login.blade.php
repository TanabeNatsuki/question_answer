@extends('layouts.app')

@section('content')
<div class="conts">
 <h1>ログイン</h1>


 <form method="POST" action="{{ route('login') }}">
   @csrf
    <label for="email">Eメールアドレス</label><br>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br>

      @error('email')
        <span role="alert">
            <strong>{{ $message }}</strong>
        </span>
     @enderror

    <label for="password">パスワード</label><br>
      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><br>

        @error('password')
          <span role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror

       <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

      <label for="remember">ログイン状態を保持する</label><br>

      <button type="submit">ログイン</button>

      @if (Route::has('password.request'))
         <a href="{{ route('password.request') }}">パスワードをお忘れですか？</a>
      @endif
   </form>
   <div class="to_back">
   <P><a href="/top" id="back">戻る</a></p>
   </div>
</div>
@endsection
