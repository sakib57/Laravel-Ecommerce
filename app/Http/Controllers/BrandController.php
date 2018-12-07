<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
//session_start();

class BrandController extends Controller
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
    	return view('admin.add_brand');
    }

    public function save_brand(Request $request){
    	$data=array();
    	$data['brand_name']=$request->brand_name;
    	$data['brand_detail']=$request->brand_description;
    	$data['publication_status']=$request->publication_status;
    	DB::table('tbl_brand')->insert($data);
    	Session::put('msg','Brand added successfully !!');
    	return Redirect::to('/add-brand');
    }
    public function view_brand(){
    	$all_brand=DB::table('tbl_brand')->get();
    	return view('admin.view_brand')->with('all_brand',$all_brand);
    }
    public function inactive_brand($id){
    	DB::table('tbl_brand')
    		->where('brand_id',$id)
    		->update(['publication_status'=>0]);
    		Session::put('msg','Ctegoty status inactiveted !!');
    	return Redirect::to('/view-brand');
    }
    public function active_brand($id){
    	DB::table('tbl_brand')
    		->where('brand_id',$id)
    		->update(['publication_status'=>1]);
    		Session::put('msg','Ctegoty status activeted !!');
    	return Redirect::to('/view-brand');
    }
    public function edit_brand($id){
    	$data=DB::table('tbl_brand')
    		->where('brand_id',$id)
    		->first();
    	return view('admin.edit_brand')->with('brand_detail',$data);
    }
    
    public function update_brand(Request $request){
    	$id=$request->brand_id;
    	$data=array();
    	$data['brand_name']=$request->brand_name;
    	$data['brand_detail']=$request->brand_description;
    	DB::table('tbl_brand')
    			->where('brand_id',$id)
    			->update($data);
    	Session::put('msg','Ctegoty updated successfully !!');
    	return Redirect::to('/view-brand');
    }
    
    public function delete_brand($id){
    	DB::table('tbl_brand')
    			->where('brand_id',$id)
    			->delete();
    	return Redirect::to('/view-brand');
    }
}
