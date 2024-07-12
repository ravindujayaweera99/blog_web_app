<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function createuser()
    {
        return view('admin.createuser');
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

    public function updateStore(Request $request){

    }


    public function userlist()
    {
        $allusers = User::latest()->get();

        return view('admin.allusers', compact('allusers'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', 'Post deleted successfully!');
    }
}
