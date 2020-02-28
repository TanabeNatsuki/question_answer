<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\HelloRequest;
use App\Http\Requests\CategoryRequest;
use App\Category;
use App\Question;
use Auth;

class HelloController extends Controller
{
    /*TOPページ表示*/
    public function top()
    {
      return view('hello.top');
    }

    /*ランキングページ*/
    public function ranking()
    {
      $items = DB::table('questions')->get();
      return view('hello.ranking');
    }

    /*カテゴリ関連*/
    public function category(Request $request)
    {
      $items = DB::table('categories')->get();
      return view('hello.category',['items' => $items]);
    }

    public function category_add()
    {
      return view('hello.category_add');
    }

    public function categoried(CategoryRequest $request)
    {
      $items = DB::table('questions')->get();
      $category = new Category;
      $category->name = $request->name;
      $category->save();
      return view('hello.categoried');
    }

    /*ユーザーページ*/
    public function user()
    {
      $auths = Auth::user();
      return view('hello.user',['auths' => $auths]);
    }

    public function pass_change()
    {
      return view('hello.pass_change');
    }

 public function question_all(Request $request)
{
   $items = Question::orderBy('created_at','desc')->Paginate(10);
   return view('hello.question_all',['items'=>$items]);
 }

 public function question_form()
 {
   $items = DB::table('categories')->get();
   return view('hello.question_form',['items' => $items]);
 }

public function question_content()
{
  return view('hello.question_content');
}

public function question_complete(Request $request)
{
  $question = new Question;
  $question->title = $request->title;
  $question->category_id = $request->category_id;
  $question->content = $request->content;
  $question->save();
  return view('hello.question_complete');
}

public function search(Request $request)
{
  $searchs = Question::where('content','like',"%".$request->search."%")->get();
  return view('hello.search',['searchs' => $searchs]);
}

}
