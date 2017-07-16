<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Rest;
use App\Mnu;
use App\Cat;
use App\restaurant;
use App\Like;
use App\IsLike;
use Auth;
use Session;
use DB;

class AllController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
        
        $id=Auth::user()->id;
       // $menu_id =Mnu::find($menu_id);
        $like = new Like;
        $like->user_id=$id;
        $like->mnu_id=$request->menu_id;
        $like->review=$request->review;
        $likes=$request->menu_id;
        $review=$request->review;
        $is_data = DB::table('likes')->where('mnu_id', $likes)->value('mnu_id');
        $up_review = DB::table('likes')->where('mnu_id', $likes)->value('review');
        
        //dd($all_review);
        if(empty($is_data))
        {
              $like->save();
        } 
        else 
        {
            DB::table('likes')
            ->where('mnu_id', $likes)
            ->update(['review' => $review+$up_review]);
            // DB::table('likes')->increment('review', $review, ['mnu_id' => $likes]);
        }
        
        $alllike=like::find($likes);
        Session::flash('success','Review Successfull');
        return redirect()->back()->with('alllike',$alllike);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rest = Rest::find($id);
         $alllike=Like::all();
          $category = Cat::all();
          $menu=Mnu::all('image');
         $all_review=Like::all('review','mnu_id');
        return view('main.show')->with('restaurant',$rest)->withAlllike($alllike)->withAll_review($all_review)->withCat($category)->withMenu($menu);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
