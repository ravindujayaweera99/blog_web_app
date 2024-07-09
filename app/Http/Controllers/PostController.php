<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure it's an image and max 2MB size
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName); // Store the image in storage/app/public/images
        } else {
            $imageName = null; // Set default image name if no image is uploaded
        }


        // Save post to database
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->image = $imageName; // Save the image name to the database
        $post->save();

        return redirect()->back()->with('success', 'Post posted Successfully!');
    }

    public function posts()
    {
        $posts = Post::with('user')->get();

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
            'body' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload if new image is provided
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName); // Store the image in storage/app/public/images
            // Delete old image if exists and update with new one
            if ($post->image) {
                Storage::delete('public/images/' . $post->image);
            }
            $post->image = $imageName; // Save the new image name to the database
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
        // Ensure the authenticated user is the owner of the post
        if ($post->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $post->delete();
        return redirect()->back()->with('success', 'Post deleted successfully!');
    }
}

