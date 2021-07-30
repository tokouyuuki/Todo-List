@extends('layouts.default')
<style>
  .card{
    padding: 30px;
  }
  .title{
    font-weight: lighter;
    font-size:25px;
    margin-bottom: 10px;
  }
  .form-item-input{
    width: 550px;
    height: 35px;
    border: 1px solid #ddd;
    border-radius: 5px;
  }
  .btn-add{
    height: 35px;
    width: 55px;
    padding:5px 6px;
    margin: 0px 20px 10px 60px;
    border: 2px solid #dc70fa;
    border-radius: 5px;
    background-color: #fff;
    color: #dc70fa;
    cursor: pointer;
    font-size: 12px;
    font-weight: bold;
  }
  .btn-add:hover{
    background-color: #dc70fa;
    color: #fff;
  }
  tr{
    display: flex;
    justify-content: space-around;
    align-items: center;
    font-weight: lighter;
    height: 50px;
  }
  th:nth-child(1){
    margin-left: 45px;
  }
  th:nth-child(3){
    margin-left: 130px;
  }
  th:nth-child(4){
    margin-left: 150px;
  }
  th:nth-child(5){
    margin-left: 45px;
  }
  .form-item-input-2{
    width: 300px;
    height: 30px;
    border:1px solid #ddd;
    border-radius: 5px;
  }
  td:nth-child(6){
    margin-left: 35px;
  }
  td:nth-child(5){
    margin-left: 20px;
  }
  td:nth-child(10){
    margin-left: 35px;
  }
  .form-btn{
    width: 60px;
    height: 30px;
    padding-top: 30px;
    display: inline-block;
  }
  .btn-update{
    height: 35px;
    width: 55px;
    padding: 5px 6px;
    border: 2px solid #fa9770;
    border-radius: 5px;
    background-color: #fff;
    color: #fa9770;
    cursor: pointer;
    font-size: 12px;
    font-weight: bold;
  }
  .btn-update:hover{
    background-color: #fa9770;
    color: #fff;
  }
  .btn-delete{
    height: 35px;
    width: 55px;
    padding: 5px 6px;
    border: 2px solid #71fadc;
    border-radius: 5px;
    background-color: #fff;
    color: #71fadc;
    cursor: pointer;
    font-size: 12px;
    font-weight: bold;
  }
  .btn-delete:hover{
    background-color: #71fadc;
    color: #fff;
  }
</style>

@section('title', 'COACHTECH')
@section('content')
<div class="card">
  @if(count($errors) > 0)
  <ul>
    @foreach($errors->all() as $error)
    <li>
      {{$error}}
    </li>
    @endforeach
  </ul>
  @endif
  <h1 class="title">Todo List</h1>
  <form action="/todo/create" method="post">
    @csrf
    <input type="text" name="content" class="form-item-input">
    <button class="btn-add">追加</button>
  </form>
  <table>
    <tr>
      <th>作成日</th>
      <th></th>
      <th>タスク名</th>
      <th>更新</th>
      <th>削除</th>
    </tr>
    @foreach($items as $item)
    <tr>
      <form action="/todo/update" method="post">
      @csrf
        <td>{{$item->updated_at}}</td>
        <td><input type="hidden" name="id" value="{{$item->id}}"></td>
        <td><input type="text" name="content" value="{{$item->content}}" class="form-item-input-2"></td>
        <td><button class="btn-update">更新</button></td>
      </form>
      <form action="/todo/delete" method="post">
      @csrf
        <td><input type="hidden" name="id" value="{{$item->id}}"></td>
        <td><button class="btn-delete">削除</button></td>
      </form>
    </tr>
    @endforeach
  </table>
</div>
@endsection


