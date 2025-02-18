<?php

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['title' => 'Manifest Digital Kreatif']);
});

Route::get('/blog', function () {
    return view('csoon', ['title' => 'Blog | Manifest Digital Kreatif']);
});

// Route::get('/blogtest', function () {
//     return view('blog', ['title' => 'Test Blog | Manifest Digital Kreatif']);
// });

// banyak posts
Route::get('/posts', function () {
    return view('posts', ['title' => 'Test Blog | Manifest Digital Kreatif', 'posts' => Post::all()]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    // $post = Post::find($post);

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/singleblog', function ($post) {
    return view('single-blog', ['title' => 'Test Blog | Manifest Digital Kreatif']);
});

Route::get('/login', function () {
    return view('login', ['title' => 'Login | Manifest Digital Kreatif']);
});
