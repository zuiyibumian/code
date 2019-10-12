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

    Route::get('/', function () {
        return view('welcome');
    });




    Route::group(['middleware'=>'web'],function(){
         Route::any('admin/login', 'Admin\LoginController@login');
         Route::get('admin/code', 'Admin\LoginController@code');
         Route::get('/', 'Home\IndexController@index');
        Route::get('/cate/{cate_id}', 'Home\IndexController@cate');
        Route::get('/a/{art_id}', 'Home\IndexController@article');

});

     Route::group(['prefix' => 'admin' , 'namespace' =>'Admin','middleware'=>['web','admin.login']],function(){
             Route::get('/','IndexController@index');
             Route::get('info','IndexController@info');
             Route::get('quit','LoginController@quit');
             Route::any('pass','IndexController@pass');
             Route::post('cate/changeorder','CategoryController@changeorder');
             Route::post('links/changeorder','CategoryController@changeorder');
             Route::resource('category','CategoryController');
             Route::resource('article','ArticleController');
             Route::any('upload','CommonController@upload');
             Route::resource('config','ConfigController@upload');
             Route::get('/navs', 'Home\IndexController@article');
             Route::resource('links','LinksController');
             Route::resource('navs','NavsController');
});
