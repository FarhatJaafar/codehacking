<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/{id}',[App\Http\Controllers\AdminPostsController::class, 'post'])->name('post');

Route::group(['middleware'=>'admin'], function (){

    Route::get('/admin', function (){
        return view('admin.index');
    });

    Route::resource('admin/users', App\Http\Controllers\AdminUsersController::class);

    Route::resource('admin/posts', App\Http\Controllers\AdminPostsController::class);

    Route::resource('admin/categories', App\Http\Controllers\AdminCategoriesController::class);

    Route::resource('admin/media', App\Http\Controllers\AdminMediasController::class);

    Route::resource('admin/comments', App\Http\Controllers\PostCommentsController::class);

    Route::resource('admin/comment/replies', App\Http\Controllers\CommentRepliesController::class);

});

Route::group(['middleware'=>'auth'], function (){

    Route::post('comment/reply', [App\Http\Controllers\CommentRepliesController::class, 'createReply']);

});



