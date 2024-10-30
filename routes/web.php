<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Pages Routes 

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    $posts = Post::all();
    return view('dashboard', ['posts' => $posts]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', [PostController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/post', function () {
    return view('post');
});

Route::get('/create-post', function () {
    return view('create-post');
});

Route::get('/your-posts', function () {
    $posts = Post::where('user_id', auth()->id())->get();
    return view('your-posts', ['posts' => $posts]);
});

// Profile Routes 

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

//Posts Routes
Route::post('/create-post', [PostController::class, 'createPost']);
Route::get('/post/{id}', [PostController::class, 'post']);
Route::get('/edit-post/{post}', [PostController::class, 'editPost']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

//Search in Dashboard
Route::get('/search', [PostController::class, 'search']);