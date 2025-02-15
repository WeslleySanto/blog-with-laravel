<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('posts', PostController::class);

Route::get('/posts', [PostController::class, 'index'])->name('listagem_posts');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('show_posts');

Route::post('/comment', [CommentController::class, 'store'])->name('store_comment');

require __DIR__.'/auth.php';
