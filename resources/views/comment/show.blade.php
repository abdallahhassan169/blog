
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"></iink>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="container">

            <div class="row">
                <div class="col-md-8">
                  <div class="page-header">

                    <h1><small class="pull-right"></small> Comments</h1>
                  </div>
                   <div class="comments-list">
                       <div class="media">
                         @foreach ($comments as $comment)
                            <a class="media-left" href="#">
                              <h2> @if($comment->user->profile_pic)
                              <img width="80"src="/imgages/{{$comment->user->profile_pic}}">
                              @else
                              <img width="80"src="/facebook/images/person-icon.jpg">
                               @endif
                            </a>
                            <div class="media-body">

                              <h4 class="media-heading user_name">{{$comment->user->name}}</h4><br>
                              {{$comment->body}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              @if($comment->user_id == auth()->user()->id)</br><br>
                           <ul>
                               <h5><li><form  method="get" action="{{route('comments.edit',$comment->id)}}">
                                 @method('GET')
                                 @csrf
                                 <button type="submit" class="btn btn-primary">edit</span>
                                 </form></li><h5>

                             <h5><li><form  method="post" action="{{route('comments.destroy',$comment->id)}}">
                               @method('DELETE')
                               @csrf
                               <button type="submit" class="btn btn-danger">delete</span>
                               </form></li><h5>

                           </ul>
                           @endif

                         </div><hr>
                              @endforeach
                          </div>
                   </div>



                </div>
            </div>


        </div>




<style>
        .user_name{
    font-size:15px;
    font-weight: bold;
}
.comments-list .media{
    border-bottom: 1px dotted #ccc;
}

img {
border-radius: 50%;
}
</style>
