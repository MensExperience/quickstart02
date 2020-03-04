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

// use Illuminate\Routing\Route;
// //ルートの表示をtasksに変更（タイトルリンク用）
// Route::get('/', function () {
//     return view('tasks');
// });

// タスクの⼀覧
Route::get('/tasks', 'TaskController@index');

// タスクの詳細
Route::get('/task/{task}', 'TaskController@detail')->name('detail');
// 名前付きルートは特定のルートへのURLを生成したり、リダイレクトしたりする場合に便利です。ルート定義にnameメソッドをチェーンすることで、そのルートに名前がつけられます。

// タスクの保存
Route::post('/task', 'TaskController@store');

// タスクの削除
Route::delete('/delete/{task}', 'TaskController@destroy');
// Route::delete('/delete/{task}', 'TaskController@destroy');
//まずrouteの方なんですけど、deleteかぶりしてるのがあまり良くないです

// タスクコメント
Route::post('task/{task}/comment', 'TaskController@comment')->name('comment'); //名前付きルート

//コメントの削除
Route::delete('/comment/delete/{comment}', 'TaskController@destroy_comment');
//ファンクションの設定ミス
// Route::delete('/comment/delete/{comment}', 'TaskController@destroy');
// Route::comment_destroy('/comment/delete/{comment}', 'TaskController@destroy');
//public function destroy_comment(Request $request, Task $task)
//controllerのファンクション名とrouteのファンクション名合わせて上げればおｋです
//routeで{comment}っていうパラメータもらってるから、モデル使って同じ名前の変数名にしてあげればそのidの全部のデータが$commentに入ります（ルートモデルバインディング）
