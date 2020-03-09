@extends('layouts.app')

@section('content')
<div class="cont">
  <p>パスワードをリセットする</p>

  <form method="POST" action="{{ route('password.update') }}">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">
    <label for="email">Eメールアドレス</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus><br>

    @error('email')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
    <label for="password">新規パスワード</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"><br>
    @error('password')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード（確認用）</label>
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"><br>

    <button type="submit" class="btn btn-primary">パスワードをリセットする</button>
  </form>
</div>
@endsection
