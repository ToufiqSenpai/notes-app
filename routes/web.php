<?php

use App\Http\Controllers\Web\PageController;
use App\Http\Controllers\Web\SubmitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/signup', [PageController::class, 'signup']);
Route::post('/signup', [SubmitController::class, 'signup']);

Route::get('/login', [PageController::class, 'login']);
Route::post('/login', [SubmitController::class, 'login']);

Route::middleware('auth')->group(function () {
  Route::get('/', [PageController::class, 'home']);

  Route::post('/notes', [SubmitController::class, 'postNote']);
  Route::patch('/notes/{noteId}', [SubmitController::class, 'patchNote']);
  Route::delete('/notes/{noteId}', [SubmitController::class, 'deleteNote']);
});
