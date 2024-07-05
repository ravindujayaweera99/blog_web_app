<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            'body' => 'required|string|required|max:255'
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect()->back()->with('success', 'Post posted Successfully!');
    }

    public function posts()
    {
        $posts = Post::all();

        return view('welcome', compact('posts'));
    }

    public function userPosts()
    {
        $userPosts = Post::where('user_id', Auth::id())->get();
        $postCount = $userPosts->count();
        return view('dashboard', compact('userPosts', 'postCount'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:32',
            'body' => 'required|string|max:255'
        ]);

        $userPosts = Post::where('user_id', Auth::id())->get();

        // Ensure the authenticated user is the owner of the post
        if ($post->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect()->back()->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        // Ensure the authenticated user is the owner of the post
        if ($post->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $post->delete();
        return redirect()->back()->with('success', 'Post deleted successfully!');
    }
}

