


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- normalize file -->
    <link rel="stylesheet" href="{{asset('facebook/css/normalize.css')}}"/>
    <!-- bootstrap file -->
    <link rel="stylesheet" href="{{asset('facebook/css/bootstrap.min.css')}}"/>
    <!-- css file -->
    <link rel="stylesheet" href="{{asset('facebook/css/facebook.css')}}"/>

    <!-- fontawesome-->
    <link rel="stylesheet" href="{{asset('facebook/css/all.min.css')}}"/>


    <title>Facebook</title>
</head>


<body>
     <!-- start navbar -->
     <nav   >
        <div class="iconsearch" >
            <i class="fab fa-facebook"></i>
        </div>
        <ul>
            <a href="{{route('posts.index')}}"><li><i class="fas fa-home"></i></li></a>
            <a href="{{route('others')}}"><li><i class="fas fa-users"></i></li></a>
            <a href="{{route('requests.index')}}"><li><i class="fas fa-user"></i></li></a>
            <a href="{{route('friends')}}"><li><i class="fas fa-user-friends"></i></li></a>

        </ul>
        <div class="other">
            <div class="id">
                  @if(auth()->user()->profile_pic)
                  <img src="/imgages/{{auth()->user()->profile_pic}}">
                @else
              <img src="{{asset('facebook/images/person-icon.jpg')}}">
              @endif
               <a href="{{route('users.index')}}"><span>{{auth()->user()->name}}</span></a>
            </div>

             </span>

             <span>
               <form class="" action="{{route('logout')}}" method="post">
                 @csrf
                 <button type="submit" class="fas fa-sign-out-alt" name="button"></button>
               </form>
             </span>



        </div>

    </nav>
<div class="col-md-7 col-xs-12" style="margin: 10px auto;">
        <div class="posts" >



            @yield('content')



        </div>
    </div>
</div>
</section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<!-- JavaScript Bundle with Popper -->
    </body>
</html>
