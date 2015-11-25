@extends('app')
  @section('content')
  <div class="container">
    <h2>コレクション一覧</h2>
    <table class="table table-striped">
      <tr>
        <th>名前</th>
        <th>Code</th>
        <th>説明</th>
        <th>処理</th>
      </tr>
      @foreach($gathers as $gather)
      <tr>
        <td>{{$gather->name}}</td>
        <td>{{$gather->code}}</td>
        <td>{{$gather->description}}</td>
        <td>
          <a href="{{url('gathers/update', $gather->id)}}"><span class="glyphicon glyphicon-pencil"></span>修正</a>&nbsp;
          <a href="{{url('gathers/delete', $gather->id)}}"><span class="glyphicon glyphicon-remove"></span>削除</a>
        </td>
      </tr>
      @endforeach
    </table>
    {!!$gathers->setPath(url('gathers/index'))!!}
    <a href="{{url('gathers/create')}}" class="btn btn-primary btn-lg">新規作成</a>
  </div>
  @stop