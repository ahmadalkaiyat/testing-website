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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin',function (){

    return  view('admin.index');

});

Route::resource('admin/categories','AdminCategoriesController');

Route::resource('admin/users','AdminUserController');

Route::resource('admin/posts','AdminPostsController');

Route::resource('admin/branches','AdminBranchesController');


Route::resource('admin/contacts','AdminContactsController');


Route::resource('user/sections','UserSectionsController');

