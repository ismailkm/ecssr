<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Student;
use App\Models\Category;
use App\Models\Question;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_test = Test::all()->count();
        $total_students = Student::all()->count();
        $total_cats = Category::all()->count();
        $total_questions = Question::all()->count();
        return view('admin.dashboard', compact('total_test', 'total_students', 'total_cats', 'total_questions'));
    }
}
