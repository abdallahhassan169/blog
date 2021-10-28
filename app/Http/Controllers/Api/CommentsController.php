<?php

namespace App\Http\Controllers\Api;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;


class CommentsController extends Controller
{
    //

    public function index($id){
        $comments= Post::find($id)->comments;
        return CommentResource::collection($comments);
    }
}
