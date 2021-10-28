@extends('layouts.layout')

@section('content')
<body>
    <div class="container">
        <section class="photo-sec">
            <div class="photos">

                <div class="photos">
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <div class="photo">
                      @if(auth()->user()->profile_pic)
                        <img class="profile-img" src="/imgages/{{auth()->user()->profile_pic}}">
                        @else
                          <img width="120"src="{{asset('facebook/images/person-icon.jpg')}}">
                        @endif
                          <a href="{{route('users.edit',auth()->user()->id)}}">
                        <span class="edit-photo">
                            <i class="fas fa-camera"></i>
                        </span>
                      </a>
                    </div>
                </div>

            </div>
            <div class="description">
                <h1 class="user-name">{{auth()->user()->name}}</h1>
            </div>
            <div class="op">
                <ul>
                    <li><a href="{{route('friends')}}">Friends</a></li>
                      <li><a href="{{route('users.edit',auth()->user()->id)}}">Edit Profile</a><li>
                </ul>
            </div>
        </section>
        <!-- content section -->
        <section class="content">
            <div class="row">
                <!-- info div -->
                <div class="col-md-5 col-xs-12">
                    <div class="footer">
                        Privacy  · Terms  · Advertising  · Ad Choices   · Cookies  · More · Facebook © 2021

                    </div>
                </div>
                <!-- posts div -->
                <div class="col-md-7 col-xs-12">
                    <div class="posts">
                        <!-- create post -->
                        <div class="create-post">
                            <a href="{{'posts/create'}}">Create a post</a>
                            </div>
                        </div>
                        <!-- filter div -->
                        <div class="post-style">

                            <div class="title">
                                <h5>Posts</h5>

                            </div>
                            <div class="style">
                                <div class="list active">
                                    <i class="fas fa-list-ul"></i>
                                    <span>List View</span>
                                </div>
                                <div class="grid">
                                    <i class="fas fa-th-large"></i>
                                    <span>Grid View</span>
                                </div>
                            </div>
                        </div>
                        @foreach($posts as $p)
                        <div class="post" >
                            <div class="user">
                                <div class="name-image">
                                    <div class="image">
                                      @if($p->user->profile_pic)
                                      <img src="/imgages/{{$p->user->profile_pic}}">
                                      @else
                                      <img src="facebook/images/person-icon.jpg">
                                      @endif
                                    </div>
                                    <div class="name-date">
                                        <a href="#" class="name">{{$p->user->name}}</a>
                                        <div class="date">
                                            <a href="#">{{$p->created_at}}</a>
                                            <i class="fas fa-globe-europe"></i>
                                        </div>
                                    </div>
                                </div>
                                @if($p->user_id == auth()->user()->id)
                                <div class="btn-group">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <li><form  method="get" action="{{route('posts.edit',$p->id)}}">
                                        @method('GET')
                                        @csrf
                                        <button type="submit" class="btn btn-primary">edit</span>
                                        </form></li>
                                      <li><form class="blog-confirm" method="post" action="{{route('posts.destroy',$p->id)}}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">delete</span>
                                  </form></li>

                                    </ul>

                                  </div>
                                  @endif

                            </div>
                            <!-- content div -->
                            <div class="post-content">
                              <center>
                                @if($p->image)
                              <img src="/images/{{$p->image}}" width="100" ></br>
                                @endif
                            </center>
                              {{$p->body}}

                            </div>
                            <!-- actions div -->
                            <div class="actions">
                                <div class="like">
                                    <i class="far fa-thumbs-up"></i>
                                    <span>Like</span>
                                </div>
                                <div class="comment">
                                    <i class="far fa-comment-alt"></i>
                                    <span><a href="{{route('comments.show',$p->id)}}">comment</a></span>
                                </div>
                                <div class="share">
                                    <i class="fas fa-share"></i>
                                    <span>share</span>
                                </div>
                            </div>
                            <div class="write-comment">

                                <div class="com-input">

                                    <form class="blog-confirm" method="post" action="{{route('comments.store')}}">
                                      @method('POST')
                                      @csrf
                                      <input type="text" name="body" placeholder="Write a Comment">
                                      <input type="hidden" name="post_id" value="{{$p->id}}"></input>
                                      <button type="submit" class="btn btn-primary" method="post"  style="width: 60px; height:40px; margin-top: 5px;">send</button>
                                </form>
                                </div>

                            </div>
                            <!--friend comment -->

                        </div>
                        @endforeach
                </div>
            </div>
        </section>
    </div>

</body>



@endsection
