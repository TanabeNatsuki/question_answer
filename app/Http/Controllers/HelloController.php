<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DbController;
use App\Http\Requests\HelloRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\QaRequest;
use App\Http\Requests\AnswerRequest;
use App\Category;
use App\Good;
use App\Question;
use App\Answer;
use Auth;

class HelloController extends DbController
{
    /*TOPページ表示*/
    public function top(DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      return view('hello.top',['new'=>$new]);
    }

    /*ランキングページ*/
    public function ranking(DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $items = DB::table('questions')->get();
      return view('hello.ranking',['new'=>$new]);
    }

    /*カテゴリ関連*/
    public function category(Request $request,DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $items = DB::table('categories')->get();
      return view('hello.category',['items' => $items],['new'=>$new]);
    }

    public function category_add(DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      return view('hello.category_add',['new'=>$new]);
    }

    public function categoried(CategoryRequest $request,DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $items = DB::table('questions')->get();
      $category = new Category;
      $category->name = $request->name;
      $category->save();
      return view('hello.categoried',['new'=>$new]);
    }

    public function category_all(Request $request,DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $id = $request->input('id');
      $items = Question::where('category_id',$id)->get();
      return view('hello.category_all',['items'=>$items],['new'=>$new]);
    }

    /*ユーザーページ*/
    public function user(DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $auths = Auth::user();
      return view('hello.user',['auths' => $auths],['new'=>$new]);
    }

    public function pass_change(DbController $dbcontroller)
    {
        $new = $dbcontroller->getdb();
      return view('hello.pass_change',['new'=>$new]);
    }

    /*質問一覧*/
    public function question_all(Request $request,DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $items = Question::orderBy('created_at','desc')->Paginate(10);
      return view('hello.question_all',['items'=>$items],['new'=>$new]);
    }

    public function qa(Request $request,DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $id = $request->input('id');
      $answers = Answer::where('question_id',$id)
               ->orderBy('good','desc')
               ->PaGinate(10);
      $items = Question::where('id',$id)->first();
      return view('hello.qa',compact('id','answers','items','new'));
    }

    public function qa_good(Request $request,DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $id = $request->input('id');
      /*質問に対する回答を全て取得*/
      $answers = Answer::where('question_id',$id)
               ->orderBy('good','desc')
               ->PaGinate(10);
      /*urlから取得したIDの質問を取得*/
      $items = Question::where('id',$id)->first();
      foreach ($answers as $answer) {
        /*答え毎かつユーザー毎のgoodを押したかを取得*/
        $goods = Good::where('answer_id',$answer->id)->where('user_id',$request->good_check)->first();
        if($goods == null){
           $good_add = new Good;
           $good_add->user_id = $request->id;
           $good_add->answer_id = $answer->id;
           $good_add->good_or = 0;
           $good_add->save();
           $check = 0;
        }else{
        $check = $goods->good_or;
        }
        $num = $answer->good;
        if($check==0)
        {
          $check = 1;
          $goo = $num++;
        }else if($check == 1){
          $check = 0;
          $goo = $num--;
        }
        $goods->good_or = $check;
        $goods->save();
        $answer->good=$num;
        $answer->save();
      }
      return view('hello.qa',compact('id','answers','items','new','check'));
    }

    /*質問投稿*/
    public function question_form(DbController $dbcontroller)
    {
     $new = $dbcontroller->getdb();
     $items = DB::table('categories')->get();
     return view('hello.question_form',['items' => $items],['new'=>$new]);
    }

    public function question_complete(QaRequest $request,DbController $dbcontroller)
    {
     $new = $dbcontroller->getdb();
     $question = new Question;
     $question->title = $request->title;
     $question->category_id = $request->category_id;
     $question->content = $request->content;
     $question->save();
     return view('hello.question_complete',['new'=>$new]);
    }

    /*回答機能*/
    public function answer_form(Request $request,DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $user_id = $request->user_id;
      $question_id = $request->question_id;
      return view('hello.answer_form',compact('new','user_id','question_id'));
    }

    public function answer_complete(AnswerRequest $request,DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $answer = new Answer;
      $answer->user_id = $request->user_id;
      $answer->question_id = $request->question_id;
      $answer->content = $request->content;
      $answer->save();
      return view('hello.answer_complete',['new'=>$new]);
    }

    /*検索機能*/
    public function search(Request $request,DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $searchs = Question::where('content','like',"%".$request->search."%")->get();
      return view('hello.search',['searchs' => $searchs],['new'=>$new]);
    }

}
