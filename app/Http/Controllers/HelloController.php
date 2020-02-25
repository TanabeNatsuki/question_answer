<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illiminate\Support\Facades\DB;
use App\Http\Requests\HelloRequest;

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

    public function category()
    {
      return view('hello.category');
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
