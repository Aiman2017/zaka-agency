<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('author')->latest()->paginate(15);

        return view('back.blog.index', compact('posts'));
    }

    public function create()
    {
        $categories = Post::distinct()->orderBy('category')->pluck('category')->filter()->values();

        return view('back.blog.form', ['post' => new Post(), 'categories' => $categories]);
    }

    public function store(PostRequest $request)
    {
        $data               = $request->validated();
        $data['author_id']  = auth()->id();
        $data['is_published'] = $request->boolean('is_published');

        if (! $data['is_published']) {
            $data['published_at'] = null;
        }

        if ($request->hasFile('image')) {
            $data['image'] = $this->storeImage($request);
        }

        Post::create($data);

        return redirect()->route('admin.blog.index')->with('success', __('Post created successfully.'));
    }

    public function edit(Post $post)
    {
        $categories = Post::distinct()->orderBy('category')->pluck('category')->filter()->values();

        return view('back.blog.form', compact('post', 'categories'));
    }

    public function update(PostRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['is_published'] = $request->boolean('is_published');

        if (! $data['is_published']) {
            $data['published_at'] = null;
        }

        if ($request->hasFile('image')) {
            $this->deleteImage($post->image);
            $data['image'] = $this->storeImage($request);
        } else {
            unset($data['image']);
        }

        $post->update($data);

        return redirect()->route('admin.blog.index')->with('success', __('Post updated successfully.'));
    }

    public function destroy(Post $post)
    {
        $this->deleteImage($post->image);
        $post->delete();

        return redirect()->route('admin.blog.index')->with('success', __('Post deleted.'));
    }

    private function storeImage($request): string
    {
        $dir = public_path('uploads/blog');
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }
        $file     = $request->file('image');
        $filename = Str::random(40) . '.' . $file->extension();
        $file->move($dir, $filename);

        return 'uploads/blog/' . $filename;
    }

    private function deleteImage(?string $path): void
    {
        if ($path && file_exists(public_path($path))) {
            unlink(public_path($path));
        }
    }
}
