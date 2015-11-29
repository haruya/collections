<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;

class SetupController extends Controller
{

    public function getIndex()
    {
        return view('setup.index');

    }

    public function getCreate($db_table)
    {
        // テーブルの存在確認
        if (Schema::hasTable($db_table)) {
            return redirect()
                ->back()
                ->withMessage("{$db_table}テーブルが存在しますので、処理を中断します。")
                ->withAlert("alert alert-danger");
        }
        if ($db_table == 'gathers') {
            Schema::create($db_table, function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 100);
                $table->integer('category_id')->index();
                $table->string('code', 100)->index();
                $table->text('description')->nullable();
                $table->timestamps();
                $table->timestamp('deleted_at', null)->nullable();
            });
            return redirect()
                ->back()
                ->withMessage("{$db_table}テーブルを作成しました")
                ->withAlert("alert alert-success");
        } elseif ($db_table == 'categories') {
            Schema::create($db_table, function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->text('description')->nullable();
            });
            return redirect()
                ->back()
                ->withMessage("{$db_table}テーブルを作成しました")
                ->withAlert("alert alert-success");
        } elseif ($db_table == 'details') {
			Schema::create($db_table, function(Blueprint $table)
			{
				$table->increments('id');
				$table->integer('gather_id');
				$table->integer('item_id');
				$table->text('content');
				$table->timestamps();
				$table->timestamp('deleted_at', null)->nullable();
			});
			return redirect()
			->back()
			->withMessage("{$db_table}テーブルを作成しました")
			->withAlert("alert alert-success");
        } elseif ($db_table == 'items') {
			Schema::create($db_table, function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('name', 100);
				$table->integer('sort')->default(1);
			});
			return redirect()
			->back()
			->withMessage("{$db_table}テーブルを作成しました")
			->withAlert("alert alert-success");
        } else {
            Schema::create($db_table, function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->text('description')->nullable();
                $table->timestamps();
                $table->timestamp('deleted_at', null)->nullable();
            });
            return redirect()
                ->back()
                ->withMessage("{$db_table}テーブルを作成しました")
                ->withAlert("alert alert-success");
        }
    }
}
