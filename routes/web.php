<?php

use App\Http\Controllers\PostsController;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostsController::class);

Route::get('/forum', function() {
    // $comment = Comment::first();
    // dd($comment->post->title);
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
