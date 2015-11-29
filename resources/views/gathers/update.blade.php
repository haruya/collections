@extends('app')
@section('content')
<div class="container">
 <h2>修正</h2>
 @if($errors->all())
 @foreach($errors->all() as $error)
 <p class="alert alert-danger">
 {{ $error }}
 </p>
 @endforeach
 @endif
 {!! Form::open(["class"=>"form-horizontal"]) !!}
 <div class="form-group">
 {!! Form::label("category_id","カテゴリ",["class"=>"col-sm-2 control-label"]) !!}
 <div class="col-sm-10">
 {!! Form::select("category_id",$gather->category->lists('name','id'),$gather->category_id) !!}
 </div>
 </div>
 <div class="form-group">
 {!! Form::label("category","カテゴリの作成",["class"=>"col-sm-2 control-label"]) !!}
 <div class="col-sm-10">
 <a href="#" data-toggle="modal" data-target="#category" class="btn btn-warning">カテゴリの新規作成</a>
 </div>
 </div>
 <div class="form-group">
 {!! Form::label("name","名前",["class"=>"col-sm-2 control-label"]) !!}
 <div class="col-sm-10">
 {!! Form::text("name",$gather->name,["class"=>"form-control"]) !!}
 </div>
 </div>
 <div class="form-group">
 {!! Form::label("code","Code",["class"=>"col-sm-2 control-label"]) !!}
 <div class="col-sm-10">
 {!! Form::text("code",$gather->code,["class"=>"form-control"]) !!}
 </div>
 </div>
 <div class="form-group">
 {!! Form::label("description","説明",["class"=>"col-sm-2 control-label"]) !!}
 <div class="col-sm-10">
 {!! Form::textarea("description",$gather->description,["class"=>"form-control"]) !!}
 </div>
 </div>
 @foreach($gather->detail as $detail)
 <div class="form-group">
 {!! Form::label("detail",$detail->item->name,["class"=>"control-label col-sm-2"]) !!}
 <div class="col-sm-10">
 {!! Form::text("detail[$detail->item_id]",$detail->content,["class"=>"form-control"]) !!}
 </div>
 </div>
 @endforeach
 <div class="form-group">
 <div class="col-sm-10">
 {!! Form::hidden("id",$gather->id) !!}
 {!! Form::submit("修正",["class"=>"btn btn-primary col-sm-offset-2"]) !!}
 </div>
 </div>
{!! Form::close() !!}
 <div class="modal fade" id="category">
 <div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 <h4 class="modal-title alert alert-success">新規カテゴリの作成</h4>
 </div>
 {!! Form::open(['url'=>'gathers/category-create']) !!}
 <div class="modal-body">
 {!! Form::label("name","カテゴリ名*",["class"=>"control-label"]) !!}
 {!! Form::text('name','',["class"=>"form-control","required"=>"required"]) !!}
 {!! Form::label("description","説明",["class"=>"control-label"]) !!}
 {!! Form::text('description','',["class"=>"form-control"]) !!}
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 <input type="submit" class="btn btn-primary" value="作成">
 {!! Form::close() !!}
 </div>
 </div><!-- /.modal-content -->
 </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->
 <div class="form-group">
 <div class="col-sm-10 col-sm-push-2">
 <a href="#" data-toggle='modal' data-target='#item'>項目の追加</a>
 </div>
 </div>
 <div class="modal fade" id="item">
 <div class="modal-dialog">
 {!! Form::open(['url'=>'gathers/detail-create']) !!}
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 <h4 class="modal-title alert alert-success">項目の追加</h4>
 </div>
 <div class="modal-body">
 @foreach($items as $item)
 {!! Form::label("detail",$item->name,["class"=>"control-label"]) !!}
 {!! Form::text("detail[$item->id]",'',["class"=>"form-control"]) !!}
 {!! Form::hidden('id',$gather->id) !!}
 @endforeach
 </div>
 <div class="modal-footer">
 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
 <input type="submit" class="btn btn-primary" value="項目追加">
 </div>
 </div><!-- /.modal-content -->
 {!! Form::close() !!}
 </div><!-- /.modal-dialog -->
 </div><!-- /.modal -->
</div>
@endsection