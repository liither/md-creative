<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;

// Main Pages
Route::get('/', function () {
    return view('index', ['title' => 'Manifest Digital Kreatif']);
});

Route::get('/blog', function () {
    return view('csoon', ['title' => 'Blog | Manifest Digital Kreatif']);
});

// Blog Routes
Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Test Blog | Manifest Digital Kreatif', 
        'posts' => Post::all()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'title' => 'Single Post', 
        'post' => $post
    ]);
});

Route::get('/singleblog', function () {
    return view('single-blog', [
        'title' => 'Test Blog | Manifest Digital Kreatif'
    ]);
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
    
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

    Route::middleware('auth')->group(function () {
        // Dashboard Home
        Route::get('/dashboard', function () {
            return view('dashboard.index');
        })->name('dashboard');
        
        // Posts Routes
        Route::prefix('/dashboard/posts')->group(function () {
            Route::get('/checkSlug', [DashboardPostController::class, 'checkSlug'])
                ->name('dashboard.posts.checkSlug');
        });
        
        Route::resource('/dashboard/posts', DashboardPostController::class)
            ->names([
                'index' => 'dashboard.posts.index',
                'create' => 'dashboard.posts.create',
                'store' => 'dashboard.posts.store',
                'show' => 'dashboard.posts.show',
                'edit' => 'dashboard.posts.edit',
                'update' => 'dashboard.posts.update',
                'destroy' => 'dashboard.posts.destroy'
            ]);
        
        // Admin Categories Routes
        Route::middleware('admin')->group(function () {
            Route::resource('/dashboard/categories', AdminCategoryController::class)
                ->except('show')
                ->names([
                    'index' => 'dashboard.categories.index',
                    'create' => 'dashboard.categories.create',
                    'store' => 'dashboard.categories.store',
                    'edit' => 'dashboard.categories.edit',
                    'update' => 'dashboard.categories.update',
                    'destroy' => 'dashboard.categories.destroy'
                ]);
        });
    });

// // Legacy route (you might want to remove this)
// Route::get('/login123', function () {
//     return view('login', ['title' => 'Login | Manifest Digital Kreatif']);
// });