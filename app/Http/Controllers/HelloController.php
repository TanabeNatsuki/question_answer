<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HelloRequest;
use App\Category;

class HelloController extends Controller
{
    public function top()
    {
      return view('hello.top');
    }

    public function ranking()
    {
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

    public function categoried(Request $request)
    {
      $category = new Category;
      $category->name = $request->name;
      $category->save();
      return view('hello.categoried');
    }

    public function user()
    {
      return view('hello.user');
    }

    public function pass_change()
    {
      return view('hello.pass_change');
    }

  public function login()
  {
    return view('hello.login');
  }

 public function question_all()
 {
   return view('hello.question_all');
 }

 public function question_form()
 {
   return view('hello.question_form');
 }

public function question_content()
{
  return view('hello.question_content');
}

public function question_complete()
{
  return view('hello.question_complete');
}

}
