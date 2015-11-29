<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Gather extends Model {

	// 複数代入のブラックリスト
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
	// ソフトデリート
	use SoftDeletes;
	protected $dates = ['deleted_at'];

	/**
	 * 1対多のリレーション
	 */
	public function category() {
		return $this->belongsTo('App\Category');
	}

	public function detail() {
		return $this->hasMany('App\Detail');
	}
}

