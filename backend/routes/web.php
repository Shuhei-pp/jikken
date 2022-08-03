<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\registUserController::class,'toRegistUserPage']);
Route::post('/userRegist', [App\Http\Controllers\registUserController::class,'registUser'])->name("user.regist");

//練習問題
Route::get('/prac1/{uid}/{pid}', [App\Http\Controllers\practiceController::class,'toTestPage'])->name("practice");
Route::post('/prac1/{uid}/{pid}', [App\Http\Controllers\practiceController::class,'postPractice'])->name("practice");
Route::post('/prac1_finish/{uid}', [App\Http\Controllers\practiceController::class,'endPractice'])->name("practice.end");

//テスト問題
Route::get('/exp1/{uid}/{pid}', [App\Http\Controllers\ExperimentController::class,'toTestPage'])->name("experiment");
Route::post('/exp1/{uid}/{pid}', [App\Http\Controllers\ExperimentController::class,'postTestResult'])->name("experiment");
Route::post('/finish/{uid}', [App\Http\Controllers\ExperimentController::class,'endTest'])->name("experiment.end");
