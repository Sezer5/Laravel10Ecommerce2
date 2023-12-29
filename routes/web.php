<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SampleController AS SampleController ;

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
//1 - Do something in route
Route::get('/hello', function () {
    return 'Hello World!';
});
// 2- Call view in route
Route::get('/',[HomeController::class,'index'])->name('home');
// 3- Call controller function in route
Route::get('/sample_home',[SampleController::class,'index'])->name('sample_home');
// 4- Route->Controller->View
Route::get('/sample_app',[SampleController::class,'sample_app'])->name('sample_app');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
