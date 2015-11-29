<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model {

	// 複数代入のブラックリスト
	protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

	/**
	 * 1対多のリレーション
	 */
	public function item() {
		return $this->belongsTo('App\item');
	}

}
