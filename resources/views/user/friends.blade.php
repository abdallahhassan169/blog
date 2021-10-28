@extends('layouts.layout')
@section('content')
<title>All Friends</title>

<div class="container">
    <div class="con">
        <div class="head">
            <h4>All Friends</h4>
        </div>
        @foreach($user_friends as $user)
  <div class="friends">
            <!-- 1 -->
            <div class="card">
                <div class="card-body">
                  @if($user->profile_pic)
                  <img src="/imgages/{{$user['profile_pic']}}">
                  @else
                  <img src="facebook/images/person-icon.jpg">
                  @endif
                    <h5 class="card-title">{{ $user['name'] }}</h5>
                </div>
                <div class="dots">
                  <span><a href="#"></a></span>
                  <span><a href="#"></a></span>
                  <span><a href="#"></a></span>
                </div>
            </div>

            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
