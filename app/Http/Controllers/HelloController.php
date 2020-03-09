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
use App\Point;
use Auth;

class HelloController extends DbController
{
    /*TOPページ表示*/
    public function top(DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $top = $dbcontroller->getranking();
      return view('hello.top',compact('new','top'));
    }

    /*ランキングページ*/
    public function ranking(DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $top = $dbcontroller->getranking();
      $items = DB::table('questions')->get();
      return view('hello.ranking',compact('new','top'));
    }

    /*カテゴリ関連*/
    public function category(Request $request,DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $top = $dbcontroller->getranking();
      $items = DB::table('categories')->get();
      return view('hello.category',compact('items','new','top'));
    }

    public function category_add(DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $top = $dbcontroller->getranking();
      return view('hello.category_add',compact('new','top'));
    }

    public function categoried(CategoryRequest $request,DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $top = $dbcontroller->getranking();
      $items = DB::table('questions')->get();
      $category = new Category;
      $category->name = $request->name;
      $category->save();
      return view('hello.categoried',compact('new','top'));
    }

    public function category_all(Request $request,DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $top = $dbcontroller->getranking();
      $id = $request->input('id');
      $items = Question::where('category_id',$id)->get();
      return view('hello.category_all',compact('new','top','items'));
    }

    /*ユーザーページ*/
    public function user(DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $top = $dbcontroller->getranking();
      $auths = Auth::user();
      return view('hello.user',compact('new','top','auths'));
    }

    public function pass_change(DbController $dbcontroller)
    {
        $new = $dbcontroller->getdb();
        $top = $dbcontroller->getranking();
      return view('hello.pass_change',compact('new','top'));
    }

    /*質問一覧*/
    public function question_all(Request $request,DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $top = $dbcontroller->getranking();
      $items = Question::orderBy('created_at','desc')->Paginate(10);
      return view('hello.question_all',compact('new','top','items'));
    }

    public function qa(Request $request,DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $top = $dbcontroller->getranking();
      $id = $request->input('id');
      $answers = Answer::where('question_id',$id)
               ->orderBy('good','desc')
               ->PaGinate(10);
      $items = Question::where('id',$id)->first();
      return view('hello.qa',compact('id','answers','items','new','top'));
    }

    public function qa_good(Request $request,DbController $dbcontroller)
    {
      $new = $dbcontroller->getdb();
      $top = $dbcontroller->getranking();
      $id = $request->input('id');
      $answers = Answer::where('question_id',$id)
               ->orderBy('good','desc')
               ->PaGinate(10);
      $items = Question::where('id',$id)->first();
      $points = Point::where('user_id',$request->good_check)->first();
      $all = $items->all_good;
      foreach($answers as $answer){
      if($answer->id == $request->goods_answer){
         $goods = Good::where('answer_id',$request->goods_answer)->where('user_id',$request->good_check)->first();
         if($goods == null){
           $good_add = new Good;
           $good_add->user_id = $request->good_check;
           $good_add->answer_id = $request->goods_answer;
           $good_add->good_or = 0;
           $good_add->save();
           $check = 0;
           $num = 0;
        }else{
        $check = $goods->good_or;
        $num = $answer->good;
        }

        if($check==0)
        {
          $check++;
          $num++;
          $all++;
        }else if($check==1){
          $check--;
          $num--;
          $all--;
        }
        if($goods == null){
          $good_add->good_or=$check;
          $good_add->save();
        }else{
          $goods->good_or=$check;
          $goods->save();
        }
        $items->all_good = $all;
        $items->save();
        $answer->good = $num;
        $answer->save();
      }
      }
      return view('hello.qa',compact('id','answers','items','new','top','goods','ans'));
    }

    /*質問投稿*/
    public function question_form(DbController $dbcontroller)
    {
     $new = $dbcontroller->getdb();
     $top = $dbcontroller->getranking();
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
