@if(Session::has('msg'))
<p class="alert alert-info">{{ Session::get('msg') }}</p>
@endif

@extends('layouts.layout')
@section('content')

<div class="card col-md-5 col-xs-11" style="margin: 10px auto;" >
    <div class="card-header ">
     <h3>Edit Comment</h3>
    </div>
    <div class="card-body">

      <div class="image">
        @if(auth()->user()->profile_pic)
        <img src="/imgages/{{auth()->user()->profile_pic}}">
        @else
        <img src="/facebook/images/person-icon.jpg">
        @endif        </div>
          <form action="/comments/{{$body->id}}" method="post">
              @method("put")
              @csrf
              <input type="text" name="body" value="{{$body->body}}" >
              <input type="submit" value="edit">
          </form>
      </div>

    </div>

</div>
@endsection
