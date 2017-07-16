<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Rest;
use App\Menu;
use App\Mnu;
use App\Category;
use App\Cat;
use App\Upcomingfood;
use Session;
use Image;
use Storage;
use DB;

class AddrestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category_name = Cat::lists('category','id');
        $cats= Cat::all();
        return view('add.index',compact('category_name'))->withCat($cats);
    }


    public function getAllRestaurants()
    {
        $art= Mnu::all();
        $foods = Upcomingfood::orderBy('id','desc')->paginate(2);
        $restaurant = Rest::all();
        $cats= Cat::all();
        return view('main.index')->with('articles',$art)->with('food',$foods)->withCat($cats)->withRestaurant($restaurant);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('addrest.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'rest_name' =>'required',
            'rest_address' =>'required',
            'rest_mobile' =>'required',
            'category_name' =>'required',
             //'file'=>'sometimes|image',
            ));
        $restaurant = new Rest;
        $mnu = new Mnu;
        $menu = new Menu;
        $restaurant->name =$request->rest_name;
        $restaurant->rest_address =$request->rest_address;
        $restaurant->rest_mobile =$request->rest_mobile;
        $restaurant->rest_email=$request->rest_email;
        $restaurant->rest_website=$request->rest_website;
        $restaurant->save();
      
        if ($restaurant->save())
         {
            $id=$restaurant->id;
           
            $files=$request->file('image');

            foreach ($files as $file) {
               $image=time().'.'.$file->getClientOriginalName();
         foreach ($request->category_name as $key => $v) {

                $data = array(
                    'rest_id'=>$id,
                    'cat_id'=>$v,
                    'menu_name'=>$request->menu_name [$key],
                    'menu_price'=>$request->menu_price[$key],
                    'image'=>$image
                    );
                    Mnu::insert($data);
                    break;
         }
          }
        }
         /*$files=$request->file('image');

            if (!empty($files)) {
            foreach ($files as $file) { 
                $menu=time().'.'.$file->getClientOriginalName();
               Storage::put(time().'.'.$file->getClientOriginalName(),file_get_contents($file));
               $menu =array(
                'mnu_id'=>$i,
                'image'=>$menu
                );
                Menu::insert($menu);
          }}*/
         
        Session::flash('success','Restaurant Added Successfully');
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
