<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class GathersController extends Controller {


	public function index()
	{

	}

	public function getCreate()
	{
		return view("gathers.create");
	}

	public function postCreate(Request $request)
	{
		$val = \Validator::make($request->all(), [
			'name'=>'required',
			'code'=>'required',
		]);
		if ($val->fails()) {
			return redirect()->back()->withErrors($val->errors());
		}
		return var_dump(\Input::all());
	}
}