<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'namespace' => 'Api',
  ], function () {

  Route::post('/login', [Controllers\Api\Auth\LoginController::class, 'login']);
  Route::post('/register', [Controllers\Api\Auth\RegisterController::class, 'register']);

  Route::group(['middleware' => 'jwt.verify'], function () {
    Route::post('/logout', [Controllers\Api\Auth\LoginController::class, 'logout']);

    Route::get('/get-questions', [Controllers\Api\QuestionController::class, 'getQuestions']);

    Route::post('/store-test', [Controllers\Api\TestController::class, 'storeTest']);
    Route::get('/top-scorers', [Controllers\Api\TestController::class, 'topScorers']);

    Route::get('/me', [Controllers\Api\StudentController::class, 'getCurrentStudent']);
    Route::get('/my-tests', [Controllers\Api\StudentController::class, 'getAllTests']);

  });

});
