<?php
//php artisan make:controller TaskController
//にて作成されたもの
//ターミナルにて、"Controller created successfully."が表示される

namespace App\Http\Controllers;

use App\Task; //tasks
use App\Comment; //comments
use Illuminate\Http\Request; //POSTで送信された値を取得できる

class TaskController extends Controller
{
    /**
     * ユーザーの全タスクをリスト表⽰ * * 
     * @param Request $request 
     * @return Response
     */
    public function index(Request $request)
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }
    /**
     * ユーザーのタスク詳細表⽰ * * 
     * @param Request $request 
     * @return Response 
     */
    public function detail(Task $task) //ルートで入ってきた変数を受け取る、かつid受け取った時点でデータを取ってくる。ルートの変数名にする
    {
        // $task = Task::find($task_id);
        // $tasks = Task::orderBy('created_at', 'asc')->get();
        $comments = $task->comments()->get();
        return view('task_detail', [
            'task' => $task,
            'comments' => $comments
        ]);
        // dd($task); //idが入ってきてる
    }
    /**
     * 新タスク作成
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $task = new Task;
        $task->name = $request->name;
        $task->save();
        return redirect('/tasks');
    }
    /**
     * タスクへコメント
     *
     * @param Request $request
     * @return Response
     */
    public function comment(Request $request, Task $task)
    /* フォームの中が入ってくる。
    commentのbody,comentしたtaskのidが必要 POST $taksに情報いれてる */
    {
        $this->validate($request, [
            'body' => 'required|max:255',
        ]);
        $comment = new Comment;
        $comment->task_id = $task->id;
        $comment->body = $request->body;
        $comment->save();

        return redirect()->route('detail', $task->id); /* 普通なら紐付けがいる。１対多 */
    }
    /**
     * 指定タスクの削除
     *
     * @param Request $request 
     * @param Task $task 
     * @return Response 
     */
    public function destroy(Request $request, Task $task)
    {
        // タスクの削除処理
        $task->delete();
        return redirect('/tasks');
    }

    /**
     * 指定コメントの削除
     *
     * @param Request $request 
     * @param Task $task 
     * @return Response 
     */
    public function c_destroy(Request $request, Task $task)
    {
        // タスクの削除処理
        $comment->delete();
        return redirect('/tasks');
    }
}
