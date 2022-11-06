<?php

use App\Http\Controllers\ContactUs;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FeedbackController;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/galerija', function () {
    return view('gallery');
});

Route::get('/projektas', function () {
    return view('project');
});

Route::get('/kontaktai', [ContactUsController::class, 'create']);
Route::post('/kontaktai', [ContactUsController::class, 'store']);

Route::get('/atsiliepimai', [FeedbackController::class, 'create']);
Route::get('/atsiliepimai', [FeedbackController::class, 'index']);
Route::post('/atsiliepimai', [FeedbackController::class, 'store']);
Route::get('/atsiliepimai/{id}', [FeedbackController::class, 'show']);
Route::get('/atsiliepimai/redaguoti/{id}', [FeedbackController::class, 'edit']);
Route::post('/atsiliepimai/redaguoti/{id}', [FeedbackController::class, 'update']);
Route::get('/atsiliepimai/istrinti/{id}', [FeedbackController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');