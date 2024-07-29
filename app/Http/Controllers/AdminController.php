<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $postCount = Post::count();

        return view('admin.dashboard', compact('userCount', 'postCount'));
    }

    public function createuser()
    {


        return view('admin.createuser');
    }

    public function allPosts()
    {

        $posts = Post::latest()->get();

        return view('admin.allposts', compact('posts'));
    }


    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'usertype' => 'required|string|in:user,admin',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype,
        ]);

        return redirect()->route('admin.userlist')->with('success', 'User created successfully!');
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->id,
            'usertype' => 'required|string|in:user,admin',
        ]);

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->usertype = $request->usertype;
        $user->save();

        return redirect()->route('admin.userlist')->with('success', 'User updated successfully!');
    }


    public function userlist()
    {
        $allusers = User::latest()->get();

        return view('admin.allusers', compact('allusers'));
    }

    public function deletePost(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.allposts')->with('success', 'Post deleted successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', 'Post deleted successfully!');
    }
}
