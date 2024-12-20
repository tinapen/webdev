<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\FeedbackController;

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

Route::get('/post', function () {
    return view('post');
});

Route::get('/create-post', [PostController::class, 'createPosts'])->name('create-post');

Route::get('/your-posts', [PostController::class, 'yourPosts'])->name('your-posts');

Route::get('/feedback', [FeedbackController::class, 'feedbackView'])->name('feedback');
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
Route::get('/edit-post/{post}', [PostController::class, 'editPost'])->middleware(['auth', 'verified'])->name('edit-post');
Route::put('/edit-post/{post}', [PostController::class, 'updatePost'])->middleware(['auth', 'verified'])->name('edit-post');
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost'])->middleware(['auth', 'verified']);

//Search 
Route::get('searchindashboard', [PostController::class, 'searchInDashboard']);
Route::get('searchinyourposts', [PostController::class, 'searchInYourPosts']);

//Feedback Routes
Route::post('/feedback', [FeedbackController::class, 'sendFeedback']);

//Bookmark
Route::get('/bookmarks', [BookmarkController::class, 'bookmarks'])->name('bookmarks');
Route::post('/post/{post}/bookmark', [BookmarkController::class, 'bookmark'])->name('post.bookmark');
Route::delete('/post/{post}/unbookmark', [BookmarkController::class, 'unbookmark'])->name('post.unbookmark');
