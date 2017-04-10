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

use App\Page;
use App\User;

Auth::routes();

//Route::get('/', function (\Illuminate\Http\Request $request) {
//    /* @var User $user*/
//    $user = $request->user();
//    dd($user->roles);
//
//});

//Route::get('/', function (\Illuminate\Http\Request $request) {
//      permissions
//        $user = $request->user();
//        dd($user->can('delete posts'));
//        $user->givePermissionTo(['edit posts']);
//     tags
//    $page = Page::find(1);
//    $tag = \Napso\Lunytags\Models\Tag::where('slug', 'khaki')->first();
//    $page->tag(['khaki']);
//    $page->tag(['mediumblue', 'aliceblue']);
//
//    $page->untag();
//    $page->tags()->detach();
//    $pages = Page::pagesWithAnyTag(['khaki','asd']);
//    dd($pages->get());
//    dd($page->tags);
//});

/* Pages */

// index
Route::get('/', 'PagesController@index')->name('home');
// create
Route::get('/pages/create', 'PagesController@create')->name('createPageForm');
// show
Route::get('/pages/{page}', 'PagesController@show')->name('pages.show');
// store
Route::post('/pages', 'PagesController@store');
// update
Route::post('/pages/{page}', 'PagesController@update');
// edit
Route::get('/pages/{page}/edit', 'PagesController@edit')->name('editPageForm');;


/* Comments */
Route::post('/pages/{page}/comments', 'CommentsController@store');


Route::post('/tags', 'TagsController@store');
Route::get('/page/{tag}', 'PagesController@tagged');
Route::get('/tags/create', 'TagsController@create')->name('createTagForm');
Route::get('/admin/users/{users}/confirm', 'UsersController@confirm')->name('users.confirm');



// show all pages in admin dashboard
Route::get('/admin/pages', 'PagesController@indexAdmin')->name('adminPagesIndex');

// Admin routes

Route::group(['prefix' => 'admin'], function () {
    Route::resource('users', 'UsersController');
});
