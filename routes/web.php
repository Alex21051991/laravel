<?php

declare(strict_types=1);

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Order_infoController;
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

Route::view('/', 'index');

/*Route::match(['post','get'], '/addNews', [
    'uses' => 'AdminNewsController@addNews',
    'as' => 'admin.addNews'
]);*/

Route::group(['prefix' => 'news', 'as' => 'news.'], static function() {
    Route::get('/', IndexController::class)
        ->name('index');
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/news', NewsController::class);
    Route::resource('/feedback', FeedbackController::class);
    Route::resource('/order_info', Order_infoController::class);
});


Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.show');



Route::get('/collections', function (){
   $collections = collect([1,2,3,4,5,77,8,9,34,56,86,65]);
   //dd($collections->sort());  //min, max, count
    dd($collections->sum());
});
