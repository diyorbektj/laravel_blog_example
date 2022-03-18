<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ChatController;

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

Route::get('/', [PostController::class, 'index'])->name('index')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);


//post
Route::get('/addpost', [PostController::class, 'create'])->name('create');
Route::post('/addpost', [PostController::class, 'store'])->name('create.post');
Route::get('/post/{slug}', [PostController::class, 'show'])->name('post');

//cat
Route::get('/addcat', [CategoryController::class, 'create'])->name('create.category');
Route::post('/addcat', [CategoryController::class, 'store'])->name('create.cat');
Route::get('/cat/{slug}', [CategoryController::class, 'show'])->name('cat.post');

//like
Route::get('/like/{id}', [PostController::class, 'like'])->name('post.like');
Route::get('/dislike/{id}', [PostController::class, 'dislike'])->name('post.dislike');

//comment
Route::post('/comment/{id}', [PostController::class, 'comment'])->name('post.comment');
Route::get('/pcomment/{id}', [PostController::class, 'pcom'])->name('post.pcom');
Route::post('/pcomment/{id}', [PostController::class, 'pcomment'])->name('post.pcomment');

Route::get('/test', [PostController::class, 'create'])->name('create.test');

//user
Route::get('/users/index', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/users/online', [App\Http\Controllers\UserController::class, 'onlinelist'])->name('user.online');
Route::get('/users/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user.profile');
Route::post('/users/status/{id}', [App\Http\Controllers\UserController::class, 'status'])->name('user.status');
Route::post('/users/follow/{id}', [App\Http\Controllers\UserController::class, 'follow'])->name('user.follow');


//admin

Route::get('admin/index', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');


//chat


Route::get('/chat/index', [ChatController::class, 'index'])->name('chat');
Route::get('/chat/create', [ChatController::class, 'createchat'])->name('chat.create');
Route::post('/chat/create', [ChatController::class, 'create'])->name('create.chat');
Route::get('/chat/index/{id}', [ChatController::class, 'show'])->name('chat.show');
Route::post('chat/index/{id}', [ChatController::class, 'store'])->name('store.chat');
Route::post('chat/follow/{id}', [ChatController::class, 'following'])->name('follow.chat');


//search
Route::get('/search/index', [PostController::class, 'search'])->name('search.index');

//mail
Route::get('/mail/index', [MailController::class, 'index'])->name('mail.index');
Route::get('/mail/{id}', [MailController::class, 'show'])->name('mail.show');
Route::post('/mail/{id}', [MailController::class, 'store'])->name('mail.store');



Route::get('/test/test', [App\Http\Controllers\HomeController::class, 'test'])->name('mail.test');

