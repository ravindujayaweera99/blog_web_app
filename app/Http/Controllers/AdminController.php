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

    public function createuser(Request $request)
    {
        return view('admin.createuser');
    }

    public function userlist()
    {
        $allusers = User::latest()->get();

        return view('admin.allusers', compact('allusers'));
    }
}
