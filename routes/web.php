<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodoController;
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
Route::middleware('auth')->group(function(){
  Route::get('/todos', [TodoController::class,'index']);
  Route::get('/todos/create',[TodoController::class,'create']);
  Route::get('/todos/{id}/edit',[TodoController::class,'edit']);
  Route::post('/todos/create',[App\Http\Controllers\TodoController::class,'store']);
  Route::patch('/todos/{id}/update',[TodoController::class,'update']);
  Route::put('/todos/{id}/complete',[TodoController::class,'complete']);
  Route::delete('/todos/{id}/delete',[TodoController::class,'delete']);
  Route::get('/todos/{id}/show', [TodoController::class,'show']);
});



Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserController::class,'index']);

Route::post('/upload',[UserController::class,'uploadAvatar'] );
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//dd($request::file('image'));
    //$request->image->store('images','public');












