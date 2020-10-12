<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;

class QuestionController extends Controller
{
    public function getQuestions()
    {
      $questions = Category::all()
          ->each(function ($category) {
              $category->setRelation('questionsWithAnswers', $category->questionsWithAnswers->random(3));
          })->toArray();

      $array = array_column($questions, 'questions_with_answers');
      $result = array();
      foreach($array as $arr)
      {
          $result = array_merge($result , $arr);
      }

      return response()->success('List of the questions', 200, $result);
    }
}
