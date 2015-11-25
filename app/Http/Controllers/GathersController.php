<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Gather;

use Illuminate\Http\Request;

class GathersController extends Controller {


	public function getIndex()
	{
		$gathers = Gather::paginate(3);
		return view('gathers.index')->with('gathers', $gathers);
	}

	public function getCreate()
	{
		return view("gathers.create");
	}

	public function postCreate(Requests\GathersPostRequest $request)
	{
		$gather = Gather::create($request->all());
		$gather->save();
	}
}