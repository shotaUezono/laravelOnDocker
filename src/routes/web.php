<?php

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/{any}', function(){
	return view('welcome');
})->where("any", '.*');

//Route::get('/user', 'UserController@index');
Route::resource('/user', 'UserController', ['only' =>['index', 'show']]);
//Route::get('/bbs', 'BbsController@index');
//Route::post('/bbs', 'BbsController@create');
Route::get('/', 'HomeController@index');
Route::post('/upload', 'HomeController@upload');
Route::get('/test', function(){
    $log = (new \App\Jobs\SendReminderEmail)->delay(10);
    var_dump($log);
    dispatch($log);
    return 'ユーザー登録完了を通知するメールを送信しました。';
});

//Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'web'], function () {

    //
    Route::auth();

    //これ
    //Route::get('/home', 'HomeController@index');
    Route::get('/bbs', 'BbsController@index');
    Route::post('/bbs', 'BbsController@create');
});

Route::get('/pict', 'pictController@index');
Route::post('/pict/upload', 'pictController@upload');
