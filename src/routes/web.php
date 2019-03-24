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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/user', 'UserController@index');
Route::resource('/user', 'UserController', ['only' =>['index', 'show']]);
Route::get('/bbs', 'BbsController@index');
Route::post('/bbs', 'BbsController@create');
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::post('/upload', 'HomeController@upload');
Route::get('/test', function(){
    $log = (new \App\Jobs\SendReminderEmail)->delay(10);
    var_dump($log);
    dispatch($log);
    return 'ユーザー登録完了を通知するメールを送信しました。';
});

//Route::get('/bbs/{user}/api', 'TestApiController@index');
