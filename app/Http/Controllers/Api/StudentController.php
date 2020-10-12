<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Category;
use Auth;

class StudentController extends Controller
{
    public function getAllTests(Request $request)
    {
      $student = Auth::guard('api')->user();
      $response = [];
      $response['tests'] = Test::where('student_id', $student->id)
                          ->with(['results'])
                          ->resultCounts()
                          ->orderBy('tests.created_at', 'desc')
                          ->get();

      $response['categories'] = Category::get();

      return response()->success('Test history', 200, $response);
    }

    public function getCurrentStudent()
    {
      $student = Auth::guard('api')->user()->only(['name', 'email']);
      return response()->success('Logged in user based on the token.', 200, $student);
    }
}
