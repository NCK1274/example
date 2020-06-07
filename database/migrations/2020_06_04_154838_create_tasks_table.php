<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;                   //テーブルの作成（データベースに入れる要素をここで書く）

class CreateTasksTable extends Migration                        //クラス化されたCreateTasksTableを継承して、Migrationを作る
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()                                        //カプセル化のpubulicを使う。pubulic function 関数()が形
    {
        Schema::create('tasks', function (Blueprint $table) {   //Schemaファザード(処理の依頼を窓口にパスする建築用語で玄関又は正面)::(スターティック)createメソッドはテーブルの名前とBlueprintオブジェクト
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->boolean('done')->default(false);
            $table->string('email');
            $table->string('type');
            $table->string('body');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
