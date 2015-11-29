<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\GathersPostRequest;
use App\Http\Requests\ItemsPostRequest;
use App\Gather;
use App\Category;
use App\Item;
use App\Detail;

class GathersController extends Controller {

 public function getIndex()
 {
 $gathers=Gather::paginate(5);
 return view('gathers.index')
 ->with('gathers',$gathers);
 }
 public function getCreate()
 {
 $categories=Category::lists('name','id');
 $items=Item::all();
 return view('gathers.create',compact('categories','items'));
 }
 public function postCreate(GathersPostRequest $request)
 {
 $gather=Gather::firstOrCreate([
 'name'=>$request->name,
 ]);
 $gather->code=$request->code;
 $gather->category_id=$request->category_id;
 $gather->description=$request->description;
 $gather->save();
 foreach($request->item as $key=>$item):
 if($item):
 $detail=Detail::firstOrCreate([
 'gather_id'=>$gather->id,
 'item_id'=>$key,
 ]);
 $detail->content=$item;
 $detail->save();
 endif;
 endforeach;
 return redirect()->to("gathers");
 }
 public function postCategoryCreate(Request $request){
 $category=Category::firstOrCreate($request->only('name'));
 $category->description=$request->description ?: null;
 $category->save();
 return redirect()->back();
 }
 public function postItemCreate(ItemsPostRequest $request){
 if($request->name):
 $item=new Item();
 $item->name=$request->name;
 $item->save();
 endif;
 return redirect()->back();
 }
 public function postDetailCreate(Request $request){
 if($request->id):
 $gather=Gather::find($request->id);
 foreach($request->detail as $key=>$value):
 if($value):
 $detail=Detail::firstOrCreate([
 'gather_id'=>$gather->id,
 'item_id'=>$key,
 ]);
 $detail->content=$value;
 $detail->save();
 endif;
 endforeach;
 endif;
 return redirect()->back();
 }
 public function getShow($id)
 {
 $gather=Gather::find($id);
 return view('gathers.show',compact('gather'));
 }
 public function getUpdate($id)
 {
 $gather=Gather::find($id);
 $lists=$gather->detail->lists('item_id');
 $items=Item::whereNotIn('id',$lists)->get();
 return view("gathers.update")
 ->with('gather',$gather)
 ->with('items',$items);
 }

 public function postUpdate(GathersPostRequest $request){
 $gather=Gather::find($request->id);
 $gather->name=$request->name;
 $gather->category_id=$request->category_id;
 $gather->code=$request->code;
 $gather->description=$request->description;
 $gather->save();
 foreach($request->detail as $key=>$value):
 if($value):
 $detail=Detail::firstOrCreate([
 'gather_id'=>$gather->id,
 'item_id'=>$key,
 ]);
 $detail->content=$value;
 $detail->save();
 endif;
 endforeach;
 return redirect()->to("gathers");
 }
 public function postDelete(Request $request)
 {
 $gather=Gather::find($request->id);
 $gather->delete();
 return redirect()->to('gathers');
 }
}