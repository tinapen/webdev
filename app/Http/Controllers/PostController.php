<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $formFields = $request->validate([
            'post_title' => 'required',
            'post_image' => 'nullable|mimes:png,jpeg,jpg,svg,webp,gif,avif',
            'post_caption' => 'required',
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

    public function post($id)
    {
        $post = Post::find($id);
        return view('/post', compact('post'));
    }

    public function editPost(Post $post)
    {
        if (auth()->user()->id !== $post->user_id) {
            $id = $post->id;
            return view('/post', compact('post'));
        }
        return view('edit-post', ['post' => $post]);
    }

    public function updatePost(Post $post, Request $request)
    {
        $formFields = $request->validate([
            'post_title' => 'required',
            'post_image' => 'nullable|mimes:png,jpeg,jpg,svg,webp,gif,avif',
            'post_caption' => 'required',
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

    public function deletePost(Post $post)
    {
        $post->delete();

        return redirect('/dashboard')->with('message', 'Post deleted successfully');
    }
}
