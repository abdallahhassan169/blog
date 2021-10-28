<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $Comment = new Comment;
      $Comment->body=$request->input('body');
      $Comment->user_id = Auth::id();
      $Comment->post_id=$request->input('post_id');
      $Comment->save();
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $all = post::find($id);
      $comments = $all->comments;
      return view('comment.show' , compact('comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $comment =  Comment::find($id);
      $id = $comment->user_id;

        if (Auth::id() == $id) {
            $body = $comment;
            return view('comment.edit',compact('body'));
        }else{
            return("you can't edit your comment");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $comment = Comment::find($id);

      $comment->body = $request->body;
      $comment->save();
      return redirect()->back()->with("msg" ,'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $comment = Comment::findOrfail($id);
      $comment->delete();

      return redirect()->back();    }
}
