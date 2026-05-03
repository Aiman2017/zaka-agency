<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::published()->with('author')->latest('published_at');

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $posts      = $query->paginate(9)->withQueryString();
        $categories = Post::published()->distinct()->orderBy('category')->pluck('category')->filter()->values();

        return view('front.blog', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        abort_if(! $post->is_published, 404);

        $related = Post::published()
            ->where('id', '!=', $post->id)
            ->when($post->category, fn ($q) => $q->where('category', $post->category))
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('front.blog-show', compact('post', 'related'));
    }
}
