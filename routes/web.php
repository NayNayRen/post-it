<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
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

// index
Route::get('/', [UserController::class, 'index'])->name('user.index');

// USER ROUTES
// register user
Route::post('/user_create', [UserController::class, 'createUser'])->name('user.create');

// show login form
Route::get('/show_login_form', [UserController::class, 'showLoginForm'])->name('user.showLoginForm');

// log user in
Route::post('/user_login', [UserController::class, 'loginUser'])->name('user.login');

// update user
Route::put('/user_update/{user}', [UserController::class], 'updateUser')->name('user.update');

// delete user
Route::delete('/user_delete/{user}', [UserController::class, 'deleteUser'])->name('user.delete');

// log user out
Route::post('/user_logout', [UserController::class, 'logoutUser'])->name('user.logout');

// CREATE, SHOW, EDIT, & REMOVE POST ROUTES
// create users post
Route::post('/post_create', [PostController::class, 'createPost'])->name('post.create');

// show all users posts
Route::get('/posts_all/{user_id}', [PostController::class, 'showAllPosts'])->name('posts.all');

// show single users post
Route::get('/post_single/{post_id}', [PostController::class, 'showSinglePost'])->name('post.single');

// edit users post
Route::put('/post_edit/{post_id}', [PostController::class, 'editPost'])->name('post.edit');

// delete users post
Route::delete('/post_delete/{post_id}', [PostController::class, 'deletePost'])->name('post.delete');
