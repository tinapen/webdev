<?php

namespace App\Http\Controllers;

use App\Models\Post;
// use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller

{
    // Your Posts Page
    public function yourPosts(Post $posts)
    {

        $posts = Post::where('user_id', auth()->id())->get();
        return view('your-posts', ['posts' => $posts]);
    }

    // Create Post Page
    public function createPosts()
    {
        return view('create-post');
    }


    // Create Post Function 
    public function createPost(Request $request)
    {
        $formFields = $request->validate([
            'post_title' => 'required',
            'post_image' => 'nullable|mimes:png,jpeg,jpg,svg,webp,gif,avif',
            'post_caption' => 'nullable',
            'tags' => 'required',
            'post_content' => 'required',
        ]);

        if ($request->hasFile('post_image')) {
            $formFields['post_image'] = $request->file('post_image')->store('uploads', 'public');
        }
        $formFields['user_id'] = auth()->id();

        Post::create($formFields);
        return redirect('/create-post')->with('message', 'Post created successfully');
    }

    // Post Page 
    public function post($id)
    {
        $post = Post::find($id);
        return view('/post', compact('post'));
    }

    // Edit Page 
    public function editPost(Post $post)
    {
        if (auth()->user()->id !== $post->user_id) {
            $id = $post->id;
            return view('/post', compact('post'));
        }
        return view('edit-post', ['post' => $post]);
    }

    // Edit Post Function 
    public function updatePost(Post $post, Request $request)
    {
        $formFields = $request->validate([
            'post_title' => 'required',
            'post_image' => 'nullable|mimes:png,jpeg,jpg,svg,webp,gif,avif',
            'post_caption' => 'nullable',
            'tags' => 'required',
            'post_content' => 'required',
        ]);

        if ($request->hasFile('post_image')) {
            $formFields['post_image'] = $request->file('post_image')->store('uploads', 'public');
        }
        $formFields['user_id'] = auth()->id();

        $post->update($formFields);

        return redirect('/create-post')->with('message', 'Post updated successfully');
    }

    // Delete Post Function 
    public function deletePost(Post $post)
    {
        $post->delete();

        return redirect('/dashboard')->with('message', 'Post deleted successfully');
    }

    // Search Post in Dashboard Function 
    public function searchInDashboard(Request $request)
    {
        $term = $request->input('searchindashboard');
        if ($term) {

            $posts = DB::table('posts')->where('post_title', 'like', '%' . $term . '%')
                ->orwhere('post_caption', 'like', '%' . $term . '%')
                ->orwhere('tags', 'like', '%' . $term . '%')
                ->orwhere('post_content', 'like', '%' . $term . '%')->get();

            return view('/dashboard', compact('posts'));
        } else {
            return redirect('/dashboard')->with('message', 'Search term cannot be found.');
        }
    }

    // Search Post in Your Posts Function 
    public function searchInYourPosts(Request $request)
    {
        $term = $request->input('searchinyourposts');
        if ($term) {

            $posts = DB::table('posts')->where('post_title', 'like', '%' . $term . '%')
                ->orwhere('post_caption', 'like', '%' . $term . '%')
                ->orwhere('tags', 'like', '%' . $term . '%')
                ->orwhere('post_content', 'like', '%' . $term . '%')->get();

            return view('/your-posts', compact('posts'));
        } else {
            return redirect('/your-posts')->with('message', 'Search term cannot be found.');
        }
    }
}
