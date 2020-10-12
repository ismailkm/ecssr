<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
use App\Models\Student;
use App\Models\Test;

class TestController extends Controller
{

  public function index($search = '')
  {
      return view('admin.tests.index', ['search' => $search]);
  }

  public function show($id)
  {
    //dd($id);
    $exam = Test::with(['student', 'results'])->find($id);
    return view('admin.tests.show', compact('exam'));
  }

  public function getModelsDataTable()
  {
    $tests = Test::with(['student'])
                        ->resultCounts()
                        ->orderBy('tests.created_at', 'desc')
                        ->get();
    //dd($tests);
    return Datatables::of($tests)
          ->editColumn('created_at', function($row) {
                return with(new Carbon($row->created_at))->format('d-m-Y H:i A');
          })
          ->editColumn('result', function($row) {
                return'<p>'.$row->correct_results_count.' out of '.$row->results_count.'</p>';
          })
          ->editColumn('action', function($row) {
              return'<a href="'.route('admin.tests.show', $row->id).'" title="Edit">View Details</a>';
           })
          ->rawColumns([ 'result', 'action'])
          ->make();
  }
}
