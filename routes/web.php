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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::group(['middleware'=>['auth','isadmin']],function () {
    Route::post('shooping/save',[\App\Http\Controllers\ShoppingController::class,'save'])->name('save.shopping');
    Route::group(['middleware'=>['auth','isadmin']],function () {
        // Route::view('about', 'about')->name('about');
    Route::get('dashboard', [\App\Http\Controllers\BillController::class,'index_dashbord'])->name('dashboard');
    Route::get('bills/details/{bill}', [\App\Http\Controllers\BillController::class, 'details'])->name('bills.details');   
    Route::get('shopping/make',[\App\Http\Controllers\ShoppingController::class,'make'])->name('make');
    // Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::post('products/save', [\App\Http\Controllers\HomeController::class, 'store'])->name('products.save');
    Route::get('products/delete/{product}', [\App\Http\Controllers\HomeController::class, 'delete'])->name('products.delete');
    Route::put('products/update/{product}', [\App\Http\Controllers\HomeController::class, 'update'])->name('products.update');
    Route::get('products', [App\Http\Controllers\HomeController::class, 'get_products'])->name('products.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    //shoppings
});
