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

/*会員登録ページ*/
   public function set(Request $request)
   {
     return view('hello.set');
   }

/*会員登録確認ページ*/
  public function formcheck(HelloRequest $request)
  {

    $keys = [];
    $values = [];
    if($request->isMethod('post'))
    {
      $form = $request->all();
      $keys = array_keys($form);
      $values = array_values($form);
    }
    $data = [
      'keys' => $keys,
      'values' => $values,
    ];
    return view('hello.formcheck',$data);
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

}
