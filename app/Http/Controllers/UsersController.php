<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Requests;
use Auth;



class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $posts = Auth::user()->posts;
      return view("user.index", compact('posts'));
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
        //
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
      $user = Auth::user()->get();
        return view("user.edit",compact('user'));
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
      $id =auth()->user()->id;
      $user = auth()->user();
      if($request->hasFile('profile_pic')){
     $image=$request->file('profile_pic');
     $name=$image->getClientOriginalName();
     $image_name=time().'.'.$name;
     $user->profile_pic = $image_name;
     $request->profile_pic->move(public_path('imgages'),$image_name);
       }
        $user->update($request->all());
        return redirect(route('users.index'));

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function friends()
    {
      $user_id=auth()->user()->id;
      $requests_uid=Requests::where('user_id',$user_id)->pluck('friend_id');
      $requests_fid=Requests::where('friend_id',$user_id)->pluck('user_id');
      $user_friends=User::whereIn('id',$requests_uid)->orWhereIn('id',$requests_fid)->get();
      return view('user.friends',compact('user_friends'));
    }

    public function profile_pic()
    {
      return view('user.changeProf');
    }
}
