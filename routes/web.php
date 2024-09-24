<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostsController::class);
Route::post('/posts/{post}/comments/create', [CommentsController::class, 'store'])
            ->name('createComment');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function() {
    return 'This is the dashboard!!!';
})->middleware('auth');

Route::get('/forum', function() {
    $redditPosts = Post::all();
    return view('forum')->with('redditPosts', $redditPosts);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/saveContactData', function() {
    $data = request()->all();
});
