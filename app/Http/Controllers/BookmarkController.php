<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookmarkController extends Controller
{
    public function bookmarks(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search-bookmark');

        // Get the bookmarked posts for the authenticated user
        $bookmarkedPosts = auth()->user()->bookmarkedPosts()
            ->when($search, function ($query, $search) {
                return $query->where('post_title', 'like', '%' . $search . '%')
                    ->orwhere('post_caption', 'like', '%' . $search . '%')
                    ->orwhere('tags', 'like', '%' . $search . '%')
                    ->orwhere('post_content', 'like', '%' . $search . '%');
            })
            ->with('user') // eager load the user if needed
            ->get();

        // Pass both $bookmarkedPosts and the search term to the view
        return view('bookmarks', compact('bookmarkedPosts', 'search'));
    }

    public function bookmark(Post $post)
    {
        auth()->user()->bookmarkedPosts()->attach($post->id);
        return back()->with('success', 'Post bookmarked!');
    }

    public function unbookmark(Post $post)
    {
        auth()->user()->bookmarkedPosts()->detach($post->id);
        return back()->with('success', 'Post removed from bookmarks!');
    }
}
