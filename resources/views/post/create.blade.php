@extends('layouts.layout')


@section('content')
<div class="card col-md-5 col-xs-11" style="margin: 10px auto;" >
    <div class="card-header ">
     <h3>Create Post</h3>
    </div>
    <div class="card-body">

        <div class="image">
          @if(auth()->user()->profile_pic)
          <img src="/imgages/{{auth()->user()->profile_pic}}">
          @else
          <img src="/facebook/images/person-icon.jpg">
          @endif
        </div>
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
          @csrf
          <textarea name ="body" placeholder="What's on your mind?"></textarea>
          <input type="file" name="image" class="form-control"></input></br></br>
          <input type="submit" class="btn btn-primary" name="post" value='Post'></input>
        </form>
      </div>

    </div>

</div>
@endsection
