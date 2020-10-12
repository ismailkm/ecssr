<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/login', 'frontend.login')->name("fontend");
Route::view('/student-register', 'frontend.register')->name("student-registration");
Route::view('/', 'front');

Auth::routes(['verify' => true, 'register' => false, 'login' => false, 'logout' => false]);

Route::prefix('admin')->group(function () {
  Route::get('/login', [Controllers\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');
  Route::post('/login', [Controllers\Auth\LoginController::class, 'login'])->name('admin.login');
  Route::post('/logout', [Controllers\Auth\LoginController::class, 'logout'])->name('admin.logout');

  Route::middleware('auth')->group(function () {
    Route::get('/', [Controllers\HomeController::class, 'index'])->name('admin.dashboard');

    //categories
    Route::resource('categories', Controllers\CategoryController::class)
     ->names([
       'index' => 'admin.categories',
     ])
     ->only([
      'index'
    ]);
    Route::get('/all-categories', [Controllers\CategoryController::class, 'getModelsDataTable'])->name('admin.categories-list');
    //END OF categories

    //Questions
    Route::resource('questions', Controllers\QuestionController::class)
     ->names([
       'index' => 'admin.questions',
       'create' => 'admin.question.create',
       'store' => 'admin.question.store',
       'edit' => 'admin.question.edit',
       'update' => 'admin.question.update',
     ])
     ->except([
      'show',
    ]);
    Route::get('/all-questions', [Controllers\QuestionController::class, 'getModelsDataTable'])->name('admin.questions-list');
    //END OF Questions

    //STUDENTS
    Route::resource('students', Controllers\StudentController::class)
     ->names([
       'index' => 'admin.students',
     ])
     ->only([
      'index'
    ]);
    Route::get('/all-students', [Controllers\StudentController::class, 'getModelsDataTable'])->name('admin.students-list');
    //END OF STUDENTS

    //TESTS
    Route::get('/tests/{search?}', [Controllers\TestController::class, 'index'])->name('admin.tests');
    Route::get('/tests/view/{id}', [Controllers\TestController::class, 'show'])->name('admin.tests.show');
    Route::get('/all-tests', [Controllers\TestController::class, 'getModelsDataTable'])->name('admin.tests-list');
    //END OF TESTS

  });
});
