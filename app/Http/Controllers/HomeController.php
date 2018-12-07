<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
class HomeController extends Controller
{
	public function index(){
		$all_product=DB::table('tbl_products')
					->limit(9)
					->get();
		return view('pages.home_content')
						->with('all_product',$all_product);
	}
    
}
