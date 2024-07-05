<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->name('welcome');

Route::get('/', [PostController::class, 'posts'])->name('welcome');

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('/contactus', function () {
    return view('contactus');
})->name('contactus');
Route::post('/contactus', [App\Http\Controllers\FeedbackController::class, 'store'])->name('feedback.store');

Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::post('/posts', [App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('post.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');
// Route::get('/', [App\Http\Controllers\PostController::class, 'posts']);



Route::get('/dashboard', [PostController::class, 'userPosts'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/register", function () {
    return view('register');
})->name('register');

require __DIR__ . '/auth.php';
