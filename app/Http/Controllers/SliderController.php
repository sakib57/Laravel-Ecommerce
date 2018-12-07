<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
class SliderController extends Controller
{
    //constructor
    function __construct() {        
        $admin_id=Session::get('admin_id');
        if(!$admin_id){
            return Redirect::to('/admin')->send();
        }       
    }
	//end constructor
    public function index(){
    	return view('admin.add_slider');
    }


    public function save_slider(Request $request){
    	$data=array();
    	$data['publication_status']=$request->publication_status;
    	$image=$request->file('image');
    	if($image){
    		request()->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
    		$data['slider_image'] = time().'.'.request()->image->getClientOriginalExtension();
        	$success=request()->image->move(public_path('images/slider/'), $data['slider_image']);
    	}
        if($success){
    	   DB::table('tbl_slider')->insert($data);
    	   Session::put('msg','Slider image added successfully !!');
    	   return Redirect::to('/add-slider');
        }else{
            echo "Image Upload Error..!";
        }
    }

    public function view_slider(){
    	$all_slider=DB::table('tbl_slider')->get();
    	return view('admin.view_slider')->with('all_slider',$all_slider);
    }

    public function inactive_slider($id){
    	DB::table('tbl_slider')
    		->where('id',$id)
    		->update(['publication_status'=>0]);
    		Session::put('msg','Slider image status inactiveted !!');
    	return Redirect::to('/view-slider');
    }
    public function active_slider($id){
    	DB::table('tbl_slider')
    		->where('id',$id)
    		->update(['publication_status'=>1]);
    		Session::put('msg','Slider image status activeted !!');
    	return Redirect::to('/view-slider');
    }

    public function delete_slider($id){
    	DB::table('tbl_slider')
    			->where('id',$id)
    			->delete();
    	return Redirect::to('/view-slider');
    }
}
