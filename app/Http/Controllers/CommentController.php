<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment2;
use App\Rest;
use Auth;
use Session;
class CommentController extends Controller
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
    public function store(Request $request,$rest_id)
    {
        $this->validate($request, array('comment'=>'required'));
        $id=Auth::user()->id;
        $name=Auth::user()->name;
        $email=Auth::user()->email;
        $rest =Rest::find($rest_id);
        $comment = new Comment2;
        $comment->user_id=$id;
        $comment->name=$name;
        $comment->email=$email;
        $comment->approved=true;
        $comment->rest()->associate($rest);
        $comment->comment=$request->comment;
        $comment->save();
        Session::flash('success','Comment Posted');
        return redirect()->route('allcontroller.show',$rest_id);

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
        $comment=Comment2::find($id);
        return view('comments.edit')->withComment($comment);
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
        $comment = Comment2::find($id);
        $this->validate($request, array('comment'=>'required'));
        $comment->comment=$request->comment;
        $comment->save();
        Session::flash('success','Done');
        return redirect()->route('allcontroller.show',$comment->rest->id);
    

    }

     public function delete($id)
    {
        $comment = Comment2::find($id);
        return view('comments.delete')->withComment($comment);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $comment = Comment2::find($id);
         $post_id=$comment->rest->id;
         $comment->delete();
         Session::flash('denger-success','deleted');
         return redirect()->route('allcontroller.show',$post_id);
    }
}