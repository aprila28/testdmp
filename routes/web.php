<?php

use App\Http\Controllers\GetAllJobController;
use App\Models\Job;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/positions', GetAllJobController::class);
Route::get('/job-by/{id}', [GetAllJobController::class, 'getJobBy']);
Route::get('/detailjob/{id}', [GetAllJobController::class, 'getJobById']);

Route::get('/test', function () {
    return Job::paginate();
});
