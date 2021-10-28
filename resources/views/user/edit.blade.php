
@extends('layouts.layout')
@section('content')
    <div class="container2">
        <form action="{{route('users.update',auth()->user()->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
        <!-- header -->
        <header> <h3>Edit Profile</h3> <i class="fas fa-times-circle"></i> </header>
        <div class="padding">
                <!-- photo edit -->
            <div class="photo">
                <div class="title">
                    <h3>Profile Picture</h3>
                </div>
                <div class="input-group mb-3">
                  <div class="element">
                    @if(auth()->user()->profile_pic)
                    <img class="photo"src="/imgages/{{auth()->user()->profile_pic}}">
                  @else
                <img width="80"class="profile-img"src="{{asset('facebook/images/person-icon.jpg')}}">
                @endif
                  </div>
                    <input type="file" name="profile_pic" class="form-control" id="inputGroupFile01">
                </div>

            </div>
            <!-- add name -->
            <div class="bio">
                <h3>name</h3>
                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="{{auth()->user()->name}}" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <h3>email</h3>
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control" placeholder="{{auth()->user()->email}}" aria-label="Recipient's username" aria-describedby="basic-addon2">

                </div>
            </div>

            <!-- save -->
            <input type="submit" class="btn btn-primary">
        </div>
        </form>
    </