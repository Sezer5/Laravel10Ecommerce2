<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPanel\HomeController AS AdminHomeController;
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

//USER CONTROLLERS USER CONTROLLERS USER CONTROLLERS USER CONTROLLERS USER CONTROLLERS USER CONTROLLERS 
//USER CONTROLLERS USER CONTROLLERS USER CONTROLLERS USER CONTROLLERS USER CONTROLLERS USER CONTROLLERS 
//USER CONTROLLERS USER CONTROLLERS USER CONTROLLERS USER CONTROLLERS USER CONTROLLERS USER CONTROLLERS 
//USER CONTROLLERS USER CONTROLLERS USER CONTROLLERS USER CONTROLLERS USER CONTROLLERS USER CONTROLLERS 


Route::get('/',[HomeController::class,'index'])->name('home');


//ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS 
//ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS 
//ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS 
//ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS 


Route::get('/admin',[AdminHomeController::class,'index'])->name('admin');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
