@extends('app')
  @section('content')
  <div class="container">
    <h2>コレクション一覧</h2>
    <table class="table table-striped">
      <tr>
        <th>名前</th>
        <th>カテゴリ</th>
        <th>Code</th>
        <th>説明</th>
        <th>処理</th>
      </tr>
      @foreach($gathers as $gather)
      <tr>
        <td>{{$gather->name}}</td>
        <td>{{$gather->category->name}}</td>
        <td>{{$gather->code}}</td>
        <td>{{$gather->description}}</td>
        <td>
          <a href="{{url('gathers/update', $gather->id)}}"><span class="glyphicon glyphicon-pencil"></span>修正</a>&nbsp;
          <a href="#" data-toggle="modal" data-target="#deleteModal{{$gather->id}}"><span class="glyphicon glyphicon-remove"></span>削除</a>
        </td>
      </tr>
      <div class="modal fade" id="deleteModal{{$gather->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title alert alert-danger">『{{$gather->name}}』の削除</h4>
            </div>
            <div class="modal-body">
              <p>本当に削除してもよろしいですか？</p>
            </div>
            <div class="modal-footer">
              {!!Form::open(['url'=>'gathers/delete'])!!}
                {!!Form::hidden('id', $gather->id)!!}
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-danger" value="削除">
              {!!Form::close()!!}
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </table>
    {!!$gathers->setPath(url('gathers/index'))!!}
    <a href="{{url('gathers/create')}}" class="btn btn-primary btn-lg">新規作成</a>
  </div>
  @stop