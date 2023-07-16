<?php

declare(strict_types=1);

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Order_infoController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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
    return view('index');
});


/*Route::match(['post','get'], '/addNews', [
    'uses' => 'AdminNewsController@addNews',
    'as' => 'admin.addNews'
]);*/
Route::group(['middleware' => 'auth'], static function () {
    Route::group(['prefix' => 'account'], static function () {
        Route::get('/', AccountController::class)->name('account');
    });

    Route::group(['prefix' => 'news', 'as' => 'news.', 'middleware' => 'check.admin'], static function() {
        Route::get('/', IndexController::class)
            ->name('index');
        Route::resource('/categories', CategoriesController::class);
        Route::resource('/news', NewsController::class);
        Route::resource('/feedback', FeedbackController::class);
        Route::resource('/order_info', Order_infoController::class);
        Route::resource('users', UsersController::class);
    });
});

/*
  Route::get('/tst', [UsersController::class, 'index'])
    ->name('news.users.edit');

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/news/{news}', [NewsController::class, 'show'])
    ->where('news', '\d+')
    ->name('news.news.show');
*/


Route::get('/collections', function (){
   $collections = collect([1,2,3,4,5,77,8,9,34,56,86,65]);
   //dd($collections->sort());  //min, max, count
    dd($collections->sum());
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
