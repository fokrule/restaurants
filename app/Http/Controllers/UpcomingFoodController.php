<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Upcomingfood;
use App\Rest;
use Session;

class UpcomingFoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allrestaurants = Rest::lists('name','id');
        $ct=Upcomingfood::all();
        return view('add.upcomingfood')->withAllrestaurants($allrestaurants)->with('ct',$ct);
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
        $this->validate($request, array(
            'menu_name'=>'required',
            'menu_price'=>'required',
            'rest_name'=>'required',
            ));
        $upcoming = new Upcomingfood;
        $upcoming->menu_name=$request->menu_name;
        $upcoming->menu_price=$request->menu_price;
        $upcoming->rest_id=$request->rest_name;
        $upcoming->save();
        Session::flash('success','Food Menu Added Successfullly');
        return back()->withInput();
        
       
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
