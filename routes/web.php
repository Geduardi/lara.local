<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Models\Category;
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

Route::view('/','home')->name('home');

//Route::get('/', function () {
//    return view('home');
//})->name('home');
Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::resource('category', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});


Route::group(['prefix'=>'news'],function (){
    Route::get('/',[NewsController::class, 'index'])->name('news');
    Route::get('/category', [CategoryController::class, 'all'])->name('category');
    Route::get('/category/{categoryId}', [NewsController::class, 'allByCategory'])->name('category.news');
    Route::get('/{id}', [NewsController::class, 'one'])->name('news.id');
});

Route::view('/feedback','feedback')->name('feedback');
Route::view('/order','order')->name('order');

Route::get('/example/{category}', fn(Category $category) => $category);
