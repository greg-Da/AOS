<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


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

//route home page
Route::get('/', function () {
    return view('welcome');
});

//routes for Authentification
Auth::routes();

// routes CRUD task + all protectedby Auth
Route::get('/task', [TaskController::class, "index"])->name('task.index')->middleware('auth');
Route::get('/task/create', [TaskController::class, "create"])->name('task.create')->middleware('auth');
Route::post('/task/create', [TaskController::class, "store"])->name('task.store')->middleware('auth');
Route::get('/task/show/{task}', [TaskController::class, "show"])->name('task.show')->middleware('auth');
Route::get('/task/{task}', [TaskController::class, "edit"])->name('task.edit')->middleware('auth');
Route::post('/task/{task}', [TaskController::class, "update"])->name('task.update')->middleware('auth');
Route::get('/task/destroy/{task}', [TaskController::class, "destroy"])->name('task.destroy')->middleware('auth');
