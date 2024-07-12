<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'filterByCategory'])->name('welcome');
Route::get('/allposts', [PostController::class, 'allPosts'])->name('allposts');

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('/contactus', function () {
    return view('contactus');
})->name('contactus');
Route::post('/contactus', [App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.store');

Route::get('/addpost', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::post('/addpost', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/updatepost/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/updatepost/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');

Route::get('/singlepost/{post}', [PostController::class, 'viewPost'])->name('singlePost');

Route::get('/dashboard', [PostController::class, 'userPosts'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('adminDashboard');
Route::get('/admin/createuser',[AdminController::class, 'createuser'])->name('admin.createuser');
Route::get('/admin/userlist',[AdminController::class, 'userlist'])->name('admin.userlist');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/register", function () {
    return view('register');
})->name('register');

require __DIR__ . '/auth.php';
