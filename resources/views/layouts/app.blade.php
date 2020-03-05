<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@section('head')
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css2/stylesheet.css')}}">
</head>
@show
<body>
  <header>
    <table>
      <tr>
        <th><div class="set"><a href="/register">会員登録</a></div></th>
        <th><div class="login"><a href="/login">ログイン</a></div></th>
        <th><a href="/top"><img src="{{ asset('image/logo.gif') }}" align="right" alt="logo"></a></th>
        <form>
         <th><input type="text" name="search"></th>
         <th><input type="submit" value="検索"></th>
       </form>
          <th>
            <div class="usericon">
              <a href="/user">
               {{--<img src="{{ asset('image/')}}" alt="userimage">--}}
              </a>
            </div>
          </th>
     </tr>
   </table>
  </header>
  <div class="nav">
    <ul>
      <li><a href="/top">Top</a></li>
      <li><a href="/category">カテゴリ</a></li>
      <li><a href="/ranking">ランキング</a></li>
    </ul>
  </div>
  <div class="newpage">
    <p>新着記事</p>
    @foreach($new as $re)
    <P>{{$re->title}}</p>
    <p>投稿日時{{$re->created_at}}</p>
    @endforeach
  </div>

    <div id="app">
        <nav>
            <div class="container">
                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul>
                        <!-- Authentication Links -->
                        @guest
                            <li>
                                <a  href="{{ route('login') }}">ログイン</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}">会員登録</a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a id="navbarDropdown"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span></span>
                                </a>

                                <div aria-labelledby="navbarDropdown">
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      ログアウト
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
