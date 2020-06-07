<?php

namespace App\Http\Controllers;                                      //コントローラー

use Illuminate\Http\Request;                                         //アクションの集合体（CRUD）

use App\Task;
use App\Http\Requests;
	                                              

class TasksController extends Controller                              //TasksControllerクラスを継承してControllersクラスを作る
{
    
    public function create()                                        //データの作成
    {
    	return view('tasks/create')->with('task', new Task());      //tasks/createでビューで使う変数、taskでnew Task()の中身をビューに返す
    }

    public function store(Request $request)                         //メソッドインジェクション→使いたいクラスと共に書くと引数に入って来て内部でそのまま利用できる→RequestはIlluminate\Http\Requestであり、サーバーへのリクエストが来た段階での様々な情報をまとめてくれるクラス
    {
    	$task = new Task();                                          //インスタンス化
    	$task->fill($request->all());
        $task->save();                                               //fillメソッドで全てを配列で並べる(モデルでfillableをフィールド名を定義しておく)保存する
    	return redirect()->route('tasks.index');                     //リダイレクトする（homeページ上は変わらないがログインするページから再度、通常のログインページは別のレスポンスを返している）→ リダイレクトした際にtasks.index渡される
    }
    public function index()                                         //データの取得
    {
        $types = Task::$types;
    	//$task = Task::orderBy('updated_at','desc')->get();         //データを昇順に並べて陳列して、取得する
    	return view('tasks.index');
        //return view('tasks/index')->with('tasks',$tasks);          //
    }
    public function show($id)                                       //データを見る
    {
        $task = Task::find($id);                                    //データベースTaskにあるデータを取得する
        return view('tasks/show')->with('task',$task);              //tasks/showでビューで使う変数、taskで$taskの中身をビューに返す = Task::find($id)を渡す
    }
    public function edit($id)                                       //データの編集
    {
        $task = Task::find($id);                                    //データベースTaskにあるデータを取得する
        return view('tasks/edit')->with('task',$task);
    }
    public function update(Request $request,$id){                   //データの更新
        $task = Task::find($id);
        $task->fill($request->all());                               ////fillメソッドで全てを配列で並べる(モデルでfillableをフィールド名を定義しておく)
        $task->save();                                              //保存する
        return redirect()->route('tasks.index');                    //tasks.indexに渡す
    }
    public function destroy($id)                                    //データの削除
    {
        $task = Task::find($id);                                    //データベースTaskにあるデータを取得する
        $task->delete();                                            //データを削除
        return redirect()->route('tasks.index');                    //tasks.indexに渡す
    }
    public function confirm(Request $request)
    {
    $task = new Task($request->all());
 
    // 「お問い合わせ種類（checkbox）」を配列から文字列に
    $type = '';
    if (isset($request->type)) {
        $type = implode(', ',$request->type);
    }
 
    return view('tasks.confirm', compact('task', 'type'));
    }




}

