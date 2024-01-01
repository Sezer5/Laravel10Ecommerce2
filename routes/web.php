<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPanel\ImageController;
use App\Http\Controllers\AdminPanel\ProductController;
use App\Http\Controllers\AdminPanel\CategoryController;
use App\Http\Controllers\SampleController AS SampleController ;
use App\Http\Controllers\AdminPanel\HomeController AS AdminHomeController;

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

Route::prefix('admin')->name('admin.')->group(function () {
   Route::get('/',[AdminHomeController::class,'index'])->name('admin');
   
//CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY
//CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY
//CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY
//CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY CATEGORY
 Route::prefix('/category')->name('category.')->controller(CategoryController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::post('/update/{id}','update')->name('update');
        Route::get('/destroy/{id}','destroy')->name('destroy');
        Route::get('/edit/{id}','edit')->name('edit');
    });
//PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT 
//PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT 
//PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT 
//PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT PRODUCT 
 Route::prefix('/product')->name('product.')->controller(ProductController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::post('/update/{id}','update')->name('update');
        Route::get('/destroy/{id}','destroy')->name('destroy');
        Route::get('/edit/{id}','edit')->name('edit');
    });
//IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES 
//IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES 
//IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES 
//IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES IMAGES 
 Route::prefix('/images')->name('images.')->controller(ImageController::class)->group(function(){
        
        
        Route::get('/show/{id}','show')->name('show');
        Route::post('/store/{id}','store')->name('store');
        Route::get('/destroy/{id}','destroy')->name('destroy');
    });
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
