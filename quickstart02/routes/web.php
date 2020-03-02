<?php
/*
|-------------------------------------------------------------------------- 
| Web Routes
|-------------------------------------------------------------------------- 
| 
| Here is where you can register web routes for your application. These
|routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| */

use Illuminate\Routing\Route;

Route::get('/', function () {
    return view('tasks');
});

// タスクの⼀覧
Route::get('/tasks', 'TaskController@index');

// タスクの詳細
// 名前付きルートは特定のルートへのURLを生成したり、リダイレクトしたりする場合に便利です。ルート定義にnameメソッドをチェーンすることで、そのルートに名前がつけられます。
Route::get('/task/{task}', 'TaskController@detail')->name('detail');

// タスクの保存
Route::post('/task', 'TaskController@store');
// タスクの削除
Route::delete('/delete/{task}', 'TaskController@destroy');


// タスクコメント
//名前付きルート
Route::post('task/{task}/comment', 'TaskController@comment')->name('comment');

//コメントの削除
Route::comment_destroy('/delete/{comment}/comment', 'TaskController@destroy');
