<?php

namespace App; 					//名前空間

use Illuminate\Database\Eloquent\Model;

class Task extends Model 		//モデルを作成
{
    //
    use SoftDeletes;			//削除の種類の一つ（復元可能な削除）でこれを消す際には使う

    protected $fillable = [
    	'name',
    	'done',
    	'email',
    	'body'
    ];
    static $types = [
    	'商品について',
    	'サービスについて',
    	'その他'

    ];
}
