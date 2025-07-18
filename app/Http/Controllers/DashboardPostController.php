<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the posts for the authenticated user, with optional category filtering.
     */
    public function index(Request $request)
    {
        $categories = Category::all();

        $query = Post::with('category')
            ->where('author_id', auth()->id());

        if ($request->filled('category')) {
            $category = Category::where('slug', $request->category)->first();

            if ($category) {
                $query->where('category_id', $category->id);
            } else {
                // Jika slug kategori tidak valid, kosongkan hasil
                $query->whereRaw('0 = 1');
            }
        }

        $posts = $query->get();

        return view('dashboard.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts,slug',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|file|max:1024',
            'body' => 'required'
        ]);

        // Handle image upload and store the image in 'post-images' folder on public disk
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('post-images', 'public');
        }

        $validated['author_id'] = auth()->id();
        $validated['article_text'] = $validated['body'];

        Post::create($validated);

        return redirect()->route('dashboard.posts.index')
            ->with('success', 'New post has been added!');
    }

    /**
     * Display the specified post.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|file|max:1024',
            'body' => 'required'
        ];

        // Validate slug only if it's different
        if ($request->slug !== $post->slug) {
            $rules['slug'] = 'required|unique:posts,slug';
        }

        $validated = $request->validate($rules);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            if ($post->image) {
                // Delete old image if it exists
                Storage::delete($post->image);
            }
            // Store new image in 'post-images' folder on public disk
            $validated['image'] = $request->file('image')->store('post-images', 'public');
        }

        $validated['author_id'] = auth()->id();
        $validated['article_text'] = $validated['body'];

        $post->update($validated);

        return redirect()->route('dashboard.posts.index')
            ->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post)
    {
        // Delete image from storage if exists
        if ($post->image) {
            Storage::delete($post->image);
        }

        $post->delete();

        return redirect()->route('dashboard.posts.index')
            ->with('success', 'Post has been deleted!');
    }

    /**
     * Generate a unique slug from a title via AJAX.
     */
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title ?? '');
        return response()->json(['slug' => $slug]);
    }
}