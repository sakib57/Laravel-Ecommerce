<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;

class ProductController extends Controller
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
    	$all_brand=DB::table('tbl_brand')->get();
    	$all_category=DB::table('tbl_category')->get();
    	return view('admin.add_product')
    					->with('category',$all_category)
    					->with('brand',$all_brand);
    }

    public function save_product(Request $request){
    	$data=array();
    	$data['product_name']=$request->product_name;
    	$data['category']=$request->category;
    	$data['brand']=$request->brand;
        $data['product_price']=$request->product_price;
    	$data['short_desc']=$request->short_desc;
    	$data['long_desc']=$request->long_desc;
    	$data['publication_status']=$request->publication_status;
    	$image=$request->file('image');
    	if($image){
    		request()->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
    		$data['image'] = time().'.'.request()->image->getClientOriginalExtension();
        	$success=request()->image->move(public_path('images/'), $data['image']);
    	}
        if($success){
    	   DB::table('tbl_products')->insert($data);
    	   Session::put('msg','Product added successfully !!');
    	   return Redirect::to('/add-product');
        }else{
            echo "Image Upload Error..!";
        }
    }

    public function view_product(){
        $all_prodyct=DB::table('tbl_products')
                        ->join('tbl_category','tbl_category.category_id','=','tbl_products.category')
                        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_products.brand')
                        ->select('tbl_products.*','tbl_category.category_name','tbl_brand.brand_name')
                        ->get();
        return view('admin.view_products')->with('all_products',$all_prodyct);
    }
    public function inactive_product($id){
        DB::table('tbl_products')
            ->where('id',$id)
            ->update(['publication_status'=>0]);
            Session::put('msg','Ctegoty status inactiveted !!');
        return Redirect::to('/view-product');
    }
    public function active_product($id){
        DB::table('tbl_products')
            ->where('id',$id)
            ->update(['publication_status'=>1]);
            Session::put('msg','Product status activeted !!');
        return Redirect::to('/view-product');
    }

    public function edit_product($id){
        $all_brand=DB::table('tbl_brand')->get();
        $all_category=DB::table('tbl_category')->get();

        $data=DB::table('tbl_products')
            ->join('tbl_category','tbl_category.category_id','=','tbl_products.category')
            ->join('tbl_brand','tbl_brand.brand_id','=','tbl_products.brand')
            ->where('id',$id)
            ->first();

        return view('admin.edit_product')
                                ->with('product_detail',$data)
                                ->with('category',$all_category)
                                ->with('brand',$all_brand);
    }
    
    public function update_product(Request $request){
        $id=$request->id;
        $data=array();
        $data['product_name']=$request->product_name;
        $data['category']=$request->category;
        $data['brand']=$request->brand;
        $data['product_price']=$request->product_price;
        $data['short_desc']=$request->short_desc;
        $data['long_desc']=$request->long_desc;
        $data['publication_status']=$request->publication_status;

        $image=$request->file('image');
        if($image){
            request()->validate(['image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
            $data['image'] = time().'.'.request()->image->getClientOriginalExtension();
            $success=request()->image->move(public_path('images/'), $data['image']);
        }

        DB::table('tbl_products')
                ->where('id',$id)
                ->update($data);
        Session::put('msg','Product updated successfully !!');
        return Redirect::to('/view-product');
    }
    
    public function delete_product($id){
        DB::table('tbl_products')
                ->where('id',$id)
                ->delete();
        return Redirect::to('/view-product');
    }
    	
}
