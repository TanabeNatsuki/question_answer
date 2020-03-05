<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class DbController extends Controller
{
  public static function getdb()
  {
    $newquestions = Question::orderBy('created_at','desc')->PaGinate(10);
    return $newquestions;
  }
}
