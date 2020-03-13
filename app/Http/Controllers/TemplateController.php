<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\User;
use App\Answer;
use App\Point;

class TemplateController extends Controller
{
  public static function getdb()
  {
    $newquestions = Question::orderBy('created_at','desc')->PaGinate(10);
    return $newquestions;
  }

  public static function getranking()
  {
    $qranking = Question::orderBy('all_good','desc')->PaGinate(10);
    return $qranking;
  }

  public static function best()
  {
    $questions = Question::select('id','created_at')->get();
    foreach($questions as $question)
    {
    $best = $question->created_at;
    $datetime = date('Y/m/d',strtotime('+1 week'.$best));
    $today = date('Y/m/d');
    if(strtotime($datetime)<strtotime($today))
    {
      if($question->best_check == 0){
      $answer = Answer::where('question_id',$question->id)->orderBy('good','desc')->first();
      if($answer != null){
      $check = $answer->best_status;
      if($check==0)
      {
        $user = User::where('id',$answer->user_id)->first();
        $ten = 10;
        $point=$user->point->get_point();
        $point = $point+$ten;
        $user->point->point= $point;
        $user->point->save();
        $answer->best_status = 1;
        $answer->save();
        $question->best_check = 1;
        $question->save();
      }
    }
     }
    }
   }
  }

}
