<?php

use App\Http\Controllers\Auth\LogInController;
use App\Http\Controllers\Auth\LogOutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//User
Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('user.posts');
Route::get('/user/my-profile', [UserController::class, 'index'])->name('user.profile');
Route::get('/user/other-user-profile', [UserController::class, 'other'])->name('user.other-profile');
//End User

//Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::get('/post/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
//EndPosts

//Likes
Route::post('/posts/{post}/like', [PostLikeController::class, 'store'])->name('post.likes');
Route::delete('/posts/{post}/like', [PostLikeController::class, 'destroy']);
//EndLikes

//Auth
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LogInController::class, 'index'])->name('login');
Route::post('/login', [LogInController::class, 'login']);
Route::post('/logout', [LogOutController::class, 'logOut'])->name('logout');
//End Auth
