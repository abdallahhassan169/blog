@extends('layouts.layout')

@section('content')
<div class="card col-md-5 col-xs-11" style="margin: 10px auto;" >
    <div class="card-header ">
     <h3>Change Profile Picture</h3>
    </div>
    <div class="card-body">

        <div class="image">
            <img src="facebook/images/person-icon.png">  <span>{{auth()->user()->name}}</span>
        </div>
        <form action="{{route('updatePicture','auth()->id')}}" method="post" enctype="multipart/form-data">h
          @csrf
          @method('PATCH')
          <input type="file" name="image" class="form-control"  ></input></br></br>
          <button type="submit" class="btn btn-primary" name="post" >Change</button>
        </form>
      </div>

    </div>

</div>
@endsection
