@extends('app')
@section('content')
<div class="container">
<h2>テーブルの作成</h2>
@if(Session::has('message'))
<p class="{{Session::get('alert')}}">
{{Session::get('message')}}
</p>
@endif

<a href="{{url('setup/create/gathers')}}" class="btn btn-primary btn-lg btn-block">gathersテーブルの作成</a>
<a href="{{url('setup/create/categories')}}" class="btn btn-primary btn-lg btn-block">categoriesテーブルの作成</a>
<a href="{{url('setup/create/details')}}" class="btn btn-primary btn-lg btn-block">detailsテーブルの作成</a>
<a href="{{url('setup/create/items')}}" class="btn btn-primary btn-lg btn-block">itemsテーブルの作成</a>
</div>
@stop