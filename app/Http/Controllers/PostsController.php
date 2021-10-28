<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Requests;

use Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $user_id=auth()->id();
       $friends_ids=Requests::where('status','accept')->where('user_id',$user_id)->pluck('friend_id');
       $other_friends_ids=Requests::where('status','accept')->where('friend_id',$user_id)->pluck('user_id');
       $posts=Post::whereIn('user_id',$friends_ids)->orWhereIn('user_id',$other_friends_ids)
       ->orWhere('user_id',$user_id)->paginate(10);


      return view('post.index',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request->hasFile('image')){
     $image=$request->file('image');
     $name=$image->getClientOriginalName();
     $image_name=time().'.'.$name;
     $request->image->move(public_path('images'),$image_name);
     $post=new Post;
     $post->body=$request->input('body');
     $post->user_id=auth()->user()->id;
     $post->image=$image_name;
     $post->save();
       }
       else {
         $post=new Post;
         $post->body=$request->input('body');
         $post->user_id=auth()->user()->id;
         $post->save();

       }

      return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Post::findOrfail($id);
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Request $request, $id)
    {

    if($request->hasFile('image')){
   $image=$request->file('image');
   $name=$image->getClientOriginalName();
   $image_name=time().'.'.$name;
   $request->image->move(public_path('images'),$image_name);
   $post = Post::findOrfail($id);
   $post->image=$image_name;
   $post->body=$request->input('body');
   $post->user_id=auth()->user()->id;
   $post->save();
    }

    else{

      $post = Post::findOrfail($id);
      $post->body=$request->input('body');
      $post->user_id=auth()->user()->id;
      $post->save();

    }


    return redirect(route('posts.index'));
     }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::findOrfail($id);
      $post->delete();
      return redirect(route('posts.index'));
    }

    public function users()
    {

      $user_id=auth()->user()->id;
      $requests_uid=Requests::where('user_id',$user_id)->pluck('friend_id');
      $requests_fid=Requests::where('friend_id',$user_id)->pluck('user_id');
      $f_reqs=User::whereNotIn('id',$requests_fid )->Where('id','!=',$user_id)->
      whereNotIn('id',$requests_uid)->whereNotIn('id',auth()->user()->
      userFriends()->pluck('user_id'))->get();
      return view('user.userslist',compact('f_reqs'));
    }


}
