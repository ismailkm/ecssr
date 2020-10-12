<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TestStoreRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\Test;
use App\Models\Result;
use App\Models\Answer;
use App\Models\Category;

class TestController extends Controller
{
    public function storeTest(TestStoreRequest $request)
    {
      try {
          DB::beginTransaction();
          $test = Test::create(
            ['student_id' => $request['student']],
          );
          $answers = $this->resultInsertData($request->get('results'), $test->id);

          Result::insert($answers);
          DB::commit();
          $testResult = Test::with(['results'])->resultCounts()->find($test->id);
          return response()->success("Test has been successfully submit.", 200, $testResult);
      }catch (\Exception $e) {
          DB::rollBack();
          Log::error("Create test api error \n" . $e->getMessage());
          return response()->error("Error occured while store the test. Please try again", 500);
      }
    }

    public function resultInsertData($results, $test_id)
    {
      $resultData = [];
      foreach($results as $result){
        $result['test_id'] = $test_id;
        $result['is_correct'] = $this->checkCorrectAnswer($result['question_id'], $result['answer']);
        $result['created_at'] = Carbon::now()->format("Y-m-d h:i:s");
        $result['updated_at'] = Carbon::now()->format("Y-m-d h:i:s");
        array_push($resultData, $result);
      }
      return $resultData;
    }

    private function checkCorrectAnswer($question_id, $answer)
    {
      $correct_answer = Answer::where('question_id', $question_id)
                                ->where('is_correct', 1)
                                ->value('description');
       return (int) $correct_answer === (int) $answer;
    }

    public function topScorers()
    {
      $response = [];
      $response['tests'] = Test::with(['student'])
                          ->resultCounts()
                          ->orderBy('correct_results_count', 'desc')
                          ->orderBy('tests.created_at', 'desc')
                          ->limit(10)
                          ->get();

      $response['categories'] = Category::get();

      return response()->success('Top 10 results', 200, $response);
    }
}
