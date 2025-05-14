<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('author_id', auth()->id())->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        
        $validatedData['author_id'] = auth()->id();

        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->author_id = auth()->id();
        $post->slug = $request->slug;
        $post->article_text = $request->body;
        $post->image = $validatedData['image'] ?? null;
        $post->save();
        
        return to_route('dashboard.posts.index')
            ->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ];

        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $request->validate($rules);

        if ($request->hasFile('image')) { 
            if ($post->image) {
                Storage::delete($post->image);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['author_id'] = auth()->id();
        $validatedData['article_text'] = $request->body;

        $post->update($validatedData);

        return to_route('dashboard.posts.index')
            ->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }
        
        $post->delete();

        return to_route('dashboard.posts.index')
            ->with('success', 'Post has been deleted!');
    }

    /**
     * Generate a slug for the given title.
     */
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}