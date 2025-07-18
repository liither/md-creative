<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {  
        $data = [
            'title' => 'Blog | Manifest Digital Kreatif',
            'posts' => Post::all()
        ];

        return view('posts', $data);
    }

    // Menampilkan satu data post
    public function show(Post $post)
    {   
        $data =  [
            'title' => 'Blog | ' . $post->title, 
            'post' => $post
        ];
        
        return view('post', $data);
    }

   public function search(Request $request)
{
    $query = $request->input('query');
    
    // Search for posts that match the title or content
    $posts = Post::where('title', 'LIKE', "%$query%")
                 ->orWhere('article_text', 'LIKE', "%$query%")
                 ->paginate(8); // Paginate the results
    
    // Return the search results to the view
    return view('posts', compact('posts'))->with('title', 'Search Results for: ' . $query);
}


}
