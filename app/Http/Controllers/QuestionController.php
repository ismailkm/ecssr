<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Requests\CreateQuestionRequest;
use Yajra\Datatables\Datatables;
use App\Models\Question;
use App\Models\Category;
use App\Models\Answer;

class QuestionController extends Controller
{

  public function index()
  {
      return view('admin.questions.index');
  }

  public function create()
  {
      $categories = Category::all();
      return view('admin.questions.create', compact('categories'));
  }

  public function edit($question)
  {
      $question = Question::with('answers')->findOrFail($question);
      //dd($question);
      $categories = Category::all();
      return view('admin.questions.edit', compact('question', 'categories'));
  }

  public function store(CreateQuestionRequest $request)
  {
    try {
        DB::beginTransaction();
        $question = Question::create(
          ['title' => $request->get('title'), 'status' => 1, 'category_id' => $request->get('category_id')],
        );
        $answers = $this->answersInsertData($request->all(), $question->id);
        Answer::insert($answers);
        DB::commit();
        return redirect()->back()->with('success', __('Question is successfully added.'));
    }catch (\Exception $e) {
        DB::rollBack();
        Log::error("Create question error \n" . $e->getMessage());
        return redirect()->back()->with('error', "Some error occured while storing question. Please try again.");
    }
  }

  public function update(CreateQuestionRequest $request, $question_id)
  {
    $question = Question::findOrFail($question_id);
    //dd($request->all());
    try {
        DB::beginTransaction();
        $question->update(
          ['title' => $request->get('title'), 'status' => 1, 'category_id' => $request->get('category_id')],
        );
        $answers = $this->answersInsertData($request->all(), $question->id);
        Answer::where('question_id', $question_id)->delete();
        Answer::insert($answers);
        DB::commit();
        return redirect()->back()->with('success', __('Question is successfully updated.'));
    }catch (\Exception $e) {
        DB::rollBack();
        Log::error("Create question error \n" . $e->getMessage());
        return redirect()->back()->with('error', "Some error occured while storing question. Please try again.");
    }
  }

  public function answersInsertData($request, $question_id){
    $correct_answer = $request['correct_answer'];
    $answerData = [
      ['description' => $request['answer_1'], 'is_correct' => ($correct_answer == 'answer_1') ? true : false, 'question_id' => $question_id],
      ['description' => $request['answer_2'], 'is_correct' => ($correct_answer == 'answer_2') ? true : false, 'question_id' => $question_id],
      ['description' => $request['answer_3'], 'is_correct' => ($correct_answer == 'answer_3') ? true : false, 'question_id' => $question_id],
      ['description' => $request['answer_4'], 'is_correct' => ($correct_answer == 'answer_4') ? true : false, 'question_id' => $question_id]
    ];
    return $answerData;
  }

  public function getModelsDataTable()
  {
    $questions = Question::with(['category','answers'])->get();

    return Datatables::of($questions)
          ->editColumn('answers_count', function($row) {
             return $row->answers()->where('is_correct', 1)->value('description');
           })
          ->editColumn('action', function($row) {
              return'<a href="'.route('admin.question.edit', $row->id).'" title="Edit">Edit</a>';
           })
          ->rawColumns(['answers_count', 'action'])
          ->make();
  }

}
