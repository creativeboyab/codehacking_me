<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('welcome');
})->name('home');



//Route::get('/home', 'HomeController@index');


Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', function () {
        return view('admin.index');
    });
    Route::resource('admin/users', 'AdminUsersController', ['names' => [
        'index'     => 'admin.users.index',
        'create'    => 'admin.users.create',
        'show'      => 'admin.users.show',
        'edit'      => 'admin.users.edit',
    ]]);
    Route::get('/post/{id}', 'AdminPostsController@post')->name('home.post');
    Route::resource('admin/posts', 'AdminPostsController', ['names' => [
        'index'     => 'admin.posts.index',
        'create'    => 'admin.posts.create',
        'show'      => 'admin.posts.show',
        'edit'      => 'admin.posts.edit',
    ]]);
    Route::resource('admin/categories', 'AdminCategoriesController', ['names' => [
        'index'     => 'admin.categories.index',
        'create'    => 'admin.categories.create',
        'show'      => 'admin.categories.show',
        'edit'      => 'admin.categories.edit',
    ]]);
    Route::resource('admin/media', 'AdminMediaController', ['names' => [
        'index'     => 'admin.media.index',
        'create'    => 'admin.media.create',
        'show'      => 'admin.media.show',
        'edit'      => 'admin.media.edit',
    ]]);
    Route::resource('admin/comment/replies', 'AdminCommentReplyController', ['names' => [
        'index'     => 'admin.comments.replies.index',
        'create'    => 'admin.comments.replies.create',
        'show'      => 'admin.comments.replies.show',
        'edit'      => 'admin.comments.replies.edit',
    ]]);
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('admin/comments', 'AdminCommentsController', ['names' => [
        'index'     => 'admin.comments.index',
        'create'    => 'admin.comments.create',
        'show'      => 'admin.comments.show',
        'edit'      => 'admin.comments.edit',
    ]]);
    Route::post('comment/reply', 'AdminCommentReplyController@createReply');
});

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}