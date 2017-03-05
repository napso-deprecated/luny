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

use App\User;

Auth::routes();


//*/Route::get('/', function (\Illuminate\Http\Request $request) {
    /* @var User $user */
//    $user = $request->user();

//    dd($user->can('delete posts'));
//    $user->givePermissionTo(['edit posts','delete posts']);

//    return response('good');
//});


Route::get('/', 'PagesController@index')->name('home');
Route::get('/pages/create', 'PagesController@create')->name('createPageForm');
Route::post('/pages', 'PagesController@store');
Route::post('/pages/{page}', 'PagesController@update');
Route::get('/pages/{page}/edit', 'PagesController@edit')->name('editPageForm');;
Route::get('/pages/{page}', 'PagesController@show')->name('pages.show');
Route::get('/page/{tag}', 'PagesController@tagged');

Route::post('/pages/{page}/comments', 'CommentsController@store');
Route::get('/admin/users/{users}/confirm', 'UsersController@confirm')->name('users.confirm');

Route::resource('/admin/users', 'UsersController');

// show all pages in admin dashboard
Route::get('/admin/pages', 'PagesController@indexAdmin')->name('adminPagesIndex');
