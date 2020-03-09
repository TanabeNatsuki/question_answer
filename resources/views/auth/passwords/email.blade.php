@extends('layouts.app')

@section('content')
<div class="conts">
  <p>パスワードをリセットする</p>

  @if (session('status'))
  <script>
  alert('リセット用メールを送信しました');
  </script>
  @endif

  <form method="POST" action="{{ route('password.email') }}">
    @csrf
    <label for="email" class="col-md-4 col-form-label text-md-right">Eメールアドレス</label>

    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br>

    @error('email')
      <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
    <input type="submit" name="reset" value="パスワードリセット用リンクを発行する">
   </form>
</div>
@endsection
