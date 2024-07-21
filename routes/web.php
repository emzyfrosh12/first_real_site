<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;

Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::get('/', function () {
    return view('landing');
})->name('landing');

// Route::get('/mmm', function () {
//          $posts = Category::all();
//       return view('admin.categories',['posts' => $posts]);
// });

Auth::routes();



Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function(){
    // Route::get('/home', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/display', [CategoryController::class, 'display'])->name('admin.product.category');
    Route::post('/edit', [CategoryController::class, 'edit'])->name('admin.update.category');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.delete.category');
    Route::get('/search', [CategoryController::class, 'search'])->name('admin.search.category');



});


Route::group(['prefix' => 'product',  'middleware' => 'auth'], function(){
    Route::get('/home', [ProductController::class, 'index'])->name('admin.product');
    Route::post('/create', [ProductController::class, 'create'])->name('admin.create.product');
    Route::get('/display', [ProductController::class, 'display'])->name('admin.display.product');
    Route::get('/edit/{product_id}', [ProductController::class, 'edit'])->name('admin.update.product');
    Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('admin.delete.product');
    Route::get('/view', [ProductController::class, 'view'])->name('admin.view.product');
    Route::get('/search', [ProductController::class, 'search'])->name('admin.search.product');



});






// Route::get('/register', function () {
//     return view('auth.register');
// })->name('register');

// Route::get('/login', function () {
//     return view('auth.login');
// })->name('login');

// Route::get('/land', function () {
//     return view('landing');
// });

// Route::get('/reset', function () {
//     return view('auth.passwords.reset');
// })->name('reset');

// Route::get('/email', function () {
//     return view('auth.passwords.email');
// })->name('email');



