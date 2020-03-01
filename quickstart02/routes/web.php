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

Route::get('/', function () {
    return view('tasks');
});
// タスクの⼀覧
Route::get('/tasks', 'TaskController@index');
// タスクの詳細
Route::get('/task/{task}', 'TaskController@detail')->name('detail');
// タスクの保存
Route::post('/task', 'TaskController@store');
// タスクコメント
Route::post('task/{task}/comment', 'TaskController@comment')->name('comment');
// タスクの削除
Route::delete('/delete/{task}', 'TaskController@destroy');
