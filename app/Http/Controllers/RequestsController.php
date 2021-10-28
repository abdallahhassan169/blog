<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;
use App\Models\User;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $id=auth()->user()->id;
       $requests=Requests::where('friend_id','=',$id)->where('status','!=','accept')->get();

       return view('request.requests',compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user_id=$request->input('user_id');
      $friend_id=$request->input('friend_id');
      $request=Requests::create($request->all());
      return redirect('others');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accept(Request $request)
    {
        $action=$request->input('status');
        $user_id=$request->input('user_id');
        $friend_id=$request->input('friend_id');
        $user=User::find($user_id);
        if($action == "accept"){
          $user->friendsUser()->attach([$friend_id]);
          $req_id=$request->input('id');
          $req=Requests::find($req_id);
          $req->status=$request->input('status');
          $req->update($request->all());
          return redirect('others');
        }
        elseif ($action == "reject") {
          $id=$request->input('id');
          $the_request=Requests::find($id);
          $the_request->delete();
          return redirect('others');

        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
