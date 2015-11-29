<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	// 複数代入のホワイトリスト
	protected $fillable = ['name', 'description'];

	// 自動タイムスタンプの無効化
	public $timestamps = false;

	/**
	 * 1対多のリレーション
	 */
	public function Gather() {
		return $this->hasMany('App\Gather');
	}

}
