<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();

class AdminController extends Controller
{
    //
    public function index(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return view('admin.dashbord');
        }else{
            return view('admin_login');
        }
    }

    public function dashbord(){
        $admin_id=Session::get('admin_id');
        if(!$admin_id){
            return Redirect::to('/admin');
        }else{
            return view('admin.dashbord');
        }
    }

    public function admin_login(Request $request){
    	$email=$request->admin_email;
    	$password=md5($request->admin_password);
    	$result=DB::table('tbl_admin')
    			->where('admin_email',$email)
    			->where('admin_password',$password)
    			->first();
    			
    	if($result){
    		Session::put('admin_id',$result->admin_id);
    		Session::put('admin_name',$result->admin_name);
    		return Redirect::to('/dashbord');
    	}else{
    		Session::put('login_error',"Email or Password invalid!");
    		return Redirect::to('/admin');
    	}
    }
    
}
