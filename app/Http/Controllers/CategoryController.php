<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
//session_start();

class CategoryController extends Controller
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
    	return view('admin.add_category');
    }

    public function save_category(Request $request){
    	$data=array();
    	$data['category_name']=$request->category_name;
    	$data['category_description']=$request->category_description;
    	$data['publication_status']=$request->publication_status;
    	DB::table('tbl_category')->insert($data);
    	Session::put('msg','Ctegoty added successfully !!');
    	return Redirect::to('/add-category');
    }
    public function view_category(){
    	$all_category=DB::table('tbl_category')->get();
    	return view('admin.view_category')->with('all_category',$all_category);
    }
    public function inactive_category($id){
    	DB::table('tbl_category')
    		->where('category_id',$id)
    		->update(['publication_status'=>0]);
    		Session::put('msg','Ctegoty status inactiveted !!');
    	return Redirect::to('/view-category');
    }
    public function active_category($id){
    	DB::table('tbl_category')
    		->where('category_id',$id)
    		->update(['publication_status'=>1]);
    		Session::put('msg','Ctegoty status activeted !!');
    	return Redirect::to('/view-category');
    }
    public function edit_category($id){
    	$data=DB::table('tbl_category')
    		->where('category_id',$id)
    		->first();
    	return view('admin.edit_category')->with('category_detail',$data);
    }
    
    public function update_category(Request $request){
    	$id=$request->category_id;
    	$data=array();
    	$data['category_name']=$request->category_name;
    	$data['category_description']=$request->category_description;
    	DB::table('tbl_category')
    			->where('category_id',$id)
    			->update($data);
    	Session::put('msg','Ctegoty updated successfully !!');
    	return Redirect::to('/view-category');
    }
    
    public function delete_category($id){
    	DB::table('tbl_category')
    			->where('category_id',$id)
    			->delete();
    	return Redirect::to('/view-category');
    }
}
