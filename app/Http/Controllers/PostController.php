<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::published()->take(3)->get();
        
        return view('posts.index', compact('posts'));
    }

    public function create()
    {   
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:posts,slug',
            'image' => 'nullable|image|max:2048',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'type' => 'required|in:promo,news,tips',
            'is_published' => 'required|boolean',
            'published_at' => 'nullable|date',
        ]);

        $imagePath = null;
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        Post::create([
            'title' => $request->title,
            'slug' => $request->slug ?? \Str::slug($request->title),
            'image' => $imagePath,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'type' => $request->type,
            'is_published' => $request->is_published,
            'published_at' => $request->published_at ?? now(),
        ]);

        return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat.');
    }
}
