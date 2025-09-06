<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cloudinary\Cloudinary;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::query()->where('is_published', true)->latest('published_at')->paginate(9);
        return view('blog.index', compact('posts'));
    }

    public function show(BlogPost $post)
    {
        abort_unless($post->is_published, 404);
        return view('blog.show', compact('post'));
    }

    public function adminIndex()
    {
        $posts = BlogPost::latest()->paginate(15);
        return view('admin.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_published' => 'in:0,1',
            'published_at' => 'nullable|date',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_published'] = $request->boolean('is_published');
        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        // Handle image upload to Cloudinary
        if ($request->hasFile('image')) {
            $cloudinary = new Cloudinary();
            $cloudinaryResponse = $cloudinary->uploadApi()->upload($request->file('image')->getRealPath(), [
                'resource_type' => 'image',
                'folder' => 'visiting-angels/blog'
            ]);
            $validated['image_url'] = $cloudinaryResponse['secure_url'];
        }

        BlogPost::create($validated);
        return redirect()->route('admin.blog.index')->with('success', 'Post created');
    }

    public function edit(BlogPost $post)
    {
        return view('admin.blog.edit', compact('post'));
    }

    public function update(Request $request, BlogPost $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_published' => 'in:0,1',
            'published_at' => 'nullable|date',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_published'] = $request->boolean('is_published');
        if ($validated['is_published'] && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        // Handle image upload to Cloudinary
        if ($request->hasFile('image')) {
            $cloudinary = new Cloudinary();
            $cloudinaryResponse = $cloudinary->uploadApi()->upload($request->file('image')->getRealPath(), [
                'resource_type' => 'image',
                'folder' => 'visiting-angels/blog'
            ]);
            $validated['image_url'] = $cloudinaryResponse['secure_url'];
        }

        $post->update($validated);
        return redirect()->route('admin.blog.index')->with('success', 'Post updated');
    }

    public function destroy(BlogPost $post)
    {
        $post->delete();
        return redirect()->route('admin.blog.index')->with('success', 'Post deleted');
    }

    public function toggle(BlogPost $post)
    {
        $post->is_published = !$post->is_published;
        if ($post->is_published && empty($post->published_at)) {
            $post->published_at = now();
        }
        $post->save();
        return back()->with('success', 'Publish status updated');
    }
}

