@extends('layouts.helloapp')

@section('head')
@parent
@endsection

@section('title','question_content')

@section('content')
<div class="question_content">
 <table>
  <tr>
    <th>タイトル</th>
    <td></td>
  </tr>
  <tr>
    <th>カテゴリ</th>
    <td></td>
  </tr>
  <tr>
    <th>本文</th>
    <td></td>
  </tr>
 </table>
 <p>回答</p>
 <h1>ベストアンサー</h1>
 <table>
   <tr>
     <th>ユーザーネーム</th>
     <td></td>
   </tr>
   <tr>
     <th>回答本文</th>
     <td></td>
   </tr>
 </table>
 <p>高評価</p>
</div>
@endsection

@section('footer')
<footer>
<h1>ランキング</h1>
<p><a href="/ranking">もっと見る</a></p>
</footer>
@endsection
