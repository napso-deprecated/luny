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

Auth::routes();


Route::get('/','PagesController@index')->name('home');
Route::get('/pages/create','PagesController@create')->name('createPageForm');
Route::post('/pages','PagesController@store');
Route::get('/pages/{page}','PagesController@show');
Route::get('/page/{tag}','PagesController@tagged');

Route::post('/pages/{page}/comments','CommentsController@store');
Route::get('/admin/users/{users}/confirm','UsersController@confirm')->name('users.confirm');

Route::resource('/admin/users','UsersController');
