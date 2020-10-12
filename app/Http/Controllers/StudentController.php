<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Models\Student;

class StudentController extends Controller
{
  public function index()
  {
      return view('admin.students.index');
  }

  public function getModelsDataTable()
  {
    $students = Student::all();

    return Datatables::of($students)
          ->editColumn('total_tests', function($row) {
             return $row->tests()->count();
           })
          ->editColumn('action', function($row) {
              $url = route('admin.tests', $row->name);
              return "<a href='{$url}' title='Tests'>View Test</a>" ;
           })
          ->rawColumns(['answers_count', 'action'])
          ->make();
  }
}
