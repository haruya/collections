@extends('app')
@section('content')
  <div class="container">
    <h2>新規作成</h2>
    @if($errors->all())
      @foreach($errors->all() as $error)
        <p class="alert alert-danger">
          {{$error}}
        </p>
      @endforeach
    @endif
    {!! Form::open(["class"=>"form-horizontal"]) !!}
    <div class="form-group">
      {!! Form::label("name", "名前", ["class"=>"col-sm-2 control-label"]) !!}
      <div class="col-sm-10">
        {!! Form::text("name", "", ["class"=>"form-control"]) !!}
      </div>
    </div>
    <div class="form-group">
      {!! Form::label("code", "Code", ["class"=>"col-sm-2 control-label"]) !!}
      <div class="col-sm-10">
        {!! Form::text("code", "", ["class"=>"form-control"]) !!}
      </div>
    </div>
    <div class="form-group">
      {!! Form::label("description", "説明", ["class"=>"col-sm-2 control-label"]) !!}
      <div class="col-sm-10">
        {!! Form::text("description", "", ["class"=>"form-control"]) !!}
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-10">
        {!! Form::submit("新規作成", ["class"=>"btn btn-primary col-sm-offset-2"]) !!}
      </div>
    </div>
    {!! Form::close() !!}
  </div>
@stop