<?php

namespace App\Http\Controllers\Api;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\User;

class PostController extends Controller
{
    //
    public function index($id){
       $posts=User::find($id)->posts;
       return PostResource::collection($posts);
    }


    

    

}
