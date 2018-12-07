<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('layout');
});
*/
//=====================Frontend Route======================
Route::get('/',"Homecontroller@index");






//====================Backend Route==========================
Route::get('/admin-logout',"SuperAdminController@logout");
Route::get('/admin',"Admincontroller@index");
Route::get('/dashbord',"Admincontroller@dashbord");
Route::post('/admin-login',"Admincontroller@admin_login");
//-------------Category Route--------------------------------
Route::get('/add-category',"CategoryController@index");
Route::post('/save-category',"CategoryController@save_category");
Route::get('/view-category',"CategoryController@view_category");
Route::get('/inactive-category/{id}',"CategoryController@inactive_category");
Route::get('/active-category/{id}',"CategoryController@active_category");
Route::get('/edit-category/{id}',"CategoryController@edit_category");
Route::get('/delete-category/{id}',"CategoryController@delete_category");
Route::post('/update-category',"CategoryController@update_category");

//-------------Brand Route--------------------------------
Route::get('/add-brand',"BrandController@index");
Route::post('/save-brand',"BrandController@save_brand");
Route::get('/view-brand',"BrandController@view_brand");
Route::get('/inactive-brand/{id}',"BrandController@inactive_brand");
Route::get('/active-brand/{id}',"BrandController@active_brand");
Route::get('/edit-brand/{id}',"BrandController@edit_brand");
Route::get('/delete-brand/{id}',"BrandController@delete_brand");
Route::post('/update-brand',"BrandController@update_brand");

//-------------Product Route--------------------------------
Route::get('/add-product',"ProductController@index");
Route::post('/save-product',"ProductController@save_product");
Route::get('/view-product',"ProductController@view_product");
Route::get('/inactive-product/{id}',"ProductController@inactive_product");
Route::get('/active-product/{id}',"ProductController@active_product");
Route::get('/edit-product/{id}',"ProductController@edit_product");
Route::get('/delete-product/{id}',"ProductController@delete_product");
Route::post('/update-product',"ProductController@update_product");

//-------------Slider Route--------------------------------
Route::get('/add-slider',"SliderController@index");
Route::post('/save-slider',"SliderController@save_slider");
Route::get('/view-slider',"SliderController@view_slider");
Route::get('/inactive-slider/{id}',"SliderController@inactive_slider");
Route::get('/active-slider/{id}',"SliderController@active_slider");
Route::get('/delete-slider/{id}',"SliderController@delete_slider");
