@extends('layouts.layout')
@section('content')


<div class="card col-md-6 col-xs-4" style="margin: 10px auto;">
  <div class="card-header ">
    <h3>Your Friends Requests</h3>
   </div>
  @foreach($requests as $my_request)
  <div class="row g-0">
    <div class=" friend col-md-4" >
      <img src="images/cat.jpg" >
    </div>

    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{$my_request->user->name}}</h5>
        <form  action="{{route('accept')}}" method="post">
          @csrf
          <input type="hidden" name="id" value="{{$my_request->id}}">
          <input type="hidden" name="user_id" value="{{$my_request['user_id'] }}">
          <input type="hidden" name="friend_id" value="{{$my_request['friend_id']}}">
          <input type="hidden" name="status" value="accept">
          <button type="submit" class="btn btn-primary">Accept</button>
        </form>
         &nbsp;
         <form  action="{{route('accept')}}" method="post">
           @csrf
           <input type="hidden" name="id" value="{{$my_request->id}}">
           <input type="hidden" name="user_id" value="{{$my_request->user->id  }}">
           <input type="hidden" name="friend_id" value="{{ $my_request['user_id']}}">
           <input type="hidden" name="status" value="reject">
           <button type="submit" class="btn btn-primary">Reject</button>
         </form>
      </div>
      </div>
      <hr>
  </div>

@endforeach


@endsection
