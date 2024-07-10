<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return view('addpost');
    }

    public function edit(Post $post)
    {
        return view('updatepost', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:32',
            'body' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
        } else {
            $imageName = null;
        }

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->input('title');
        $post->category = $request->input('category');
        $post->body = $request->input('body');
        $post->image = $imageName;
        $post->save();

        return redirect()->back()->with('success', 'Post posted Successfully!');
    }

    public function filterByCategory(Request $request)
    {
        $category = $request->input('category');

        $latestposts = Post::with('user')->latest()->limit(6)->get();

        $posts = Post::with('user')
            ->when($category, function ($query, $category) {
                return $query->where('category', $category);
            })
            ->latest()->limit(6)->get();

        $categories = Post::select('category')->distinct()->get();

        return view('welcome', compact('posts', 'categories', 'category', 'latestposts'));
    }

    public function allPosts(Request $request)
    {
        $category = $request->input('category');

        $allPosts = Post::with('user')
            ->when($category, function ($query, $category) {
                return $query->where('category', $category);
            })
            ->latest()
            ->paginate(12);

        $categories = Post::select('category')->distinct()->get();

        return view('allposts', compact('allPosts', 'category', 'categories'));
    }


    public function userPosts()
    {
        $userPosts = Post::where('user_id', Auth::id())->latest()->get();
        $postCount = $userPosts->count();
        return view('dashboard', compact('userPosts', 'postCount'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:32',
            'body' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            if ($post->image) {
                Storage::delete('public/images/' . $post->image);
            }
            $post->image = $imageName;
        }

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect()->back()->with('success', 'Post updated successfully!');
    }

    public function viewPost(Post $post)
    {
        return view('singlepost', compact('post'));
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $post->delete();
        return redirect()->back()->with('success', 'Post deleted successfully!');
    }
}
