@extends('layouts.layout')
@section('content')
@foreach($f_reqs as $user)
    <div class="card col-md-6 col-xs-4" style="margin: 10px auto;">
      <div class="card-header ">
        <h3>People you may know</h3>
       </div>
      <div class="row g-0">
        <div class=" friend col-md-4" >
          @if($user['profile_pic'])
          <img src="/imgages/{{$user['profile_pic']}}">
          @else
          <img src="facebook/images/person-icon.jpg">
          @endif
        </div>

        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{ $user['name'] }}</h5>

            <form  action="{{route('requests.store')}}" method="post">
              @csrf
              <input type="hidden" name="friend_id" value="{{$user->id }}">
              <input type="hidden" name="user_id" value="{{auth()->user()->id  }}">

              <button type="submit" class="btn btn-primary">Add</button>
            </form>


          </div>
          </div>
          <hr>


        </div>

      </div>
@endforeach
@endsection
