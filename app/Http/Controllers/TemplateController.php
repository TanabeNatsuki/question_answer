<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

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

}
