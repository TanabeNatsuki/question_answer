<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\HelloRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\QaRequest;
use App\Http\Requests\AnswerRequest;
use App\Category;
use App\Question;
use App\Answer;
use Auth;

class HelloController extends DbController
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

    public function category_all(Request $request)
    {
      $id = $request->input('id');
      $items = Question::where('category_id',$id)->get();
      return view('hello.category_all',['items'=>$items]);
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

    /*質問一覧*/
    public function question_all(Request $request)
    {
      $items = Question::orderBy('created_at','desc')->Paginate(10);
      return view('hello.question_all',['items'=>$items]);
    }

    public function qa(Request $request)
    {
      $id = $request->input('id');
      $answers = Answer::where('question_id',$id)
               ->orderBy('good','desc')
               ->PaGinate(10);
      $items = Question::where('id',$id)->first();
      return view('hello.qa',compact('id','answers','items'));
    }

    /*質問投稿*/
    public function question_form()
    {
     $items = DB::table('categories')->get();
     return view('hello.question_form',['items' => $items]);
    }

    public function question_complete(QaRequest $request)
    {
     $question = new Question;
     $question->title = $request->title;
     $question->category_id = $request->category_id;
     $question->content = $request->content;
     $question->save();
     return view('hello.question_complete');
    }

    /*回答機能*/
    public function answer_form(Request $request)
    {
      $user_id = $request->user_id;
      $question_id = $request->question_id;
      return view('hello.answer_form',['user_id'=>$user_id],['question_id'=>$question_id]);
    }

    public function answer_complete(AnswerRequest $request)
    {
      $answer = new Answer;
      $answer->user_id = $request->user_id;
      $answer->question_id = $request->question_id;
      $answer->content = $request->content;
      $answer->save();
      return view('hello.answer_complete');
    }

    /*検索機能*/
    public function search(Request $request)
    {
      $searchs = Question::where('content','like',"%".$request->search."%")->get();
      return view('hello.search',['searchs' => $searchs]);
    }

}
