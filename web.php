<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
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

Route::get('/', function () {
    return view('welcome');
});


// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function() {
    Route::get('/', AdminController::class)
        ->name('index');
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);

});

Route::match(['post','get'], '/addNews', [
    'uses' => 'AdminNewsController@addNews',
    'as' => 'addNews'
]);

// Guest's routes

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');
Route::get('/news/{id}', [NewsController::class, 'show'])
    ->where('id', '\d+')
    ->name('news.show');


Route::get('/cat', [NewsController::class, 'category'])
    ->name('category.category');
Route::get('/cat/{idCat}', [NewsController::class, 'catShow'])
    ->where('idCat', '\d+')
    ->name('news.catShow');

Route::get('/listNews/{idCat}', [NewsController::class, 'listNews'])
    ->where('idCat', '\d+')
    ->name('news.listNews');

Route::get('/auth', [NewsController::class, 'authentication'])
    ->name('auth.authentication');

Route::get('/addNews', [NewsController::class, 'addNews'])
    ->name('news.addNews');

Route::get('/category', [NewsController::class, 'category'])
    ->name('news.category');

Route::get('/learn3', [NewsController::class, 'learn3'])
    ->name('learn3.news');
Route::post('/learn3', [NewsController::class, 'learn3'])
    ->name('learn3.news');

Route::get('/', function(){
    return 'Некий текст, для тетсирования';
});

