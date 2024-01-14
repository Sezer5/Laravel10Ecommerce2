<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopCartController;
use App\Http\Controllers\AdminPanel\UserController;
use App\Http\Controllers\AdminPanel\ImageController;
use App\Http\Controllers\AdminPanel\SliderController;
use App\Http\Controllers\AdminPanel\ProductController;
use App\Http\Controllers\AdminPanel\CategoryController;
use App\Http\Controllers\AdminPanel\SettingsController;
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
Route::get('/loginuser',[HomeController::class,'loginuser'])->name('loginuser');
Route::get('/register',[HomeController::class,'register'])->name('register');
Route::get('/logoutuser' ,[HomeController::class,'logout'])->name('logoutuser');
Route::get('/productdetail/{id}',[HomeController::class,'productdetail'])->name('productdetail');
Route::view('/loginadmin', 'admin.loginadmin')->name('loginadmin');
Route::post('/loginadmincheck' ,[AdminHomeController::class,'loginadmincheck'])->name('loginadmincheck');

//ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS 
//ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS 
//ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS 
//ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS ADMIN CONTROLLERS 
Route::middleware('auth')->group(function () {


Route::middleware('admin')->prefix('admin')->name('admin.')->group(function(){

   Route::get('/',[AdminHomeController::class,'index'])->name('admin');
   Route::get('/adminlogout',[AdminHomeController::class,'adminlogout'])->name('adminlogout');
   
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

//USER ROLE CONTROLLER USER ROLE CONTROLLER USER ROLE CONTROLLER USER ROLE CONTROLLER USER ROLE CONTROLLER 
//USER ROLE CONTROLLER USER ROLE CONTROLLER USER ROLE CONTROLLER USER ROLE CONTROLLER USER ROLE CONTROLLER 
//USER ROLE CONTROLLER USER ROLE CONTROLLER USER ROLE CONTROLLER USER ROLE CONTROLLER USER ROLE CONTROLLER 
//USER ROLE CONTROLLER USER ROLE CONTROLLER USER ROLE CONTROLLER USER ROLE CONTROLLER USER ROLE CONTROLLER 

Route::prefix('/user')->name('user.')->controller(UserController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::post('/store' ,'store')->name('store');
        Route::get('/destroy/{uid}/{rid}','destroy')->name('destroy');
    });


//SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS 
//SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS 
//SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS 
//SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS SETTİNGS 

Route::prefix('/settings')->name('settings.')->controller(SettingsController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::post('/update/{id}','update')->name('update');
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

//SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS 
//SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS 
//SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS 
//SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS SLIDERS 

 Route::prefix('/sliders')->name('sliders.')->controller(SliderController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::get('/destroy/{id}','destroy')->name('destroy');
        
    });
});

    Route::prefix('user')->name('user.')->group(function(){
        Route::get('/userprofile' ,[HomeController::class,'userprofile'])->name('userprofile');

        });

    

    Route::prefix('/shopcart')->name('shopcart.')->controller(ShopCartController::class)->group(function(){
        Route::get('/','index')->name('index');
        Route::get('/create','create')->name('create');
        Route::post('/store','store')->name('store');
        Route::post('/addone','addone')->name('addone');
        Route::post('/minusone','minusone')->name('minusone');
        Route::post('/update/{id}','update')->name('update');
        Route::post('/destroy','destroy')->name('destroy');
        Route::get('/edit/{id}','edit')->name('edit');
        Route::post('/order','order')->name('order');
        Route::post('/storeorder','storeorder')->name('storeorder');
        Route::get('/myorders','myorders')->name('myorders');
        Route::get('/orderdetail/{id}','orderdetail')->name('orderdetail');

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
