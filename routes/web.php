<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;

//Public Routes
Route::get('/', [PostController::class, 'filterByCategory'])->name('welcome');
Route::get('/allposts', [PostController::class, 'allPosts'])->name('allposts');
Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');
Route::get('/contactus', function () {
    return view('contactus');
})->name('contactus');
Route::post('/contactus', [App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.store');

//Post Routes //
Route::get('/addpost', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::post('/addpost', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/updatepost/{post}', [PostController::class, 'edit'])->name('post.edit');
Route::put('/updatepost/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('/singlepost/{post}', [PostController::class, 'viewPost'])->name('singlePost');

//Comment Routes
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

//User Dashboard Route
Route::get('/dashboard', [PostController::class, 'userPosts'])->middleware(['auth', 'verified'])->name('dashboard');

//Admin Routes
Route::get('/admin/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('adminDashboard');
Route::get('/admin/createuser', [AdminController::class, 'createuser'])->name('admin.createuser');
Route::post('/admin/createuser', [AdminController::class, 'storeUser'])->name('admin.storeuser');
Route::get('/admin/userlist', [AdminController::class, 'userlist'])->name('admin.userlist');
Route::delete('/admin/userlist/{user}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::get('/admin/allposts', [AdminController::class, 'allPosts'])->name('admin.allposts');
Route::delete('/admin/posts/{post}', [AdminController::class, 'deletePost'])->middleware(['auth', 'admin'])->name('admin.deletePost');
Route::put('/admin/updateuser', [AdminController::class, 'updateUser'])->name('admin.updateuser');

//Auth Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//User Registration Route
Route::get("/register", function () {
    return view('register');
})->name('register');

require __DIR__ . '/auth.php';
