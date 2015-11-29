<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {

	// 複数代入のブラックリスト
	protected $guarded = ['id'];

	// 自動タイムスタンプの無効化
	public $timestamps = false;

}
