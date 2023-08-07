<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        // dd($request);
        // validate all form entries
        // key matches name of input
        $postFormInputs = $request->validate([
            'title' => ['required'],
            'body' => ['required']
        ]);
        $postFormInputs['user_id'] = auth()->id();
        Post::create($postFormInputs);
        return redirect(route('user.index'))->with('flash-message', 'Post Was Created Successfully');
    }

    public function showAllPosts()
    {
        $id = auth()->user()->id;
        $posts = Post::getAllPosts($id);
        return view('allPosts', [
            'posts' => $posts
        ]);
    }

    public function showSinglePost($post_id)
    {
        $user_id = auth()->user()->id;
        $post = Post::getSinglePost($post_id, $user_id);
        return view('singlePost', [
            'post' => $post
        ]);
    }

    public function editPost(Request $request, $post_id)
    {
        $user_id = auth()->user()->id;
        $post = Post::getSinglePost($post_id, $user_id);
        $editFormInputs = $request->validate([
            'title' => ['required'],
            'body' => ['required']
        ]);
        $post->update($editFormInputs);
        return redirect(route('posts.all', $user_id))->with('flash-message', 'Your post was updated.');
    }

    public function deletePost($post_id)
    {
        $user_id = auth()->user()->id;
        $post = Post::getSinglePost($post_id, $user_id);
        $post->delete();
        return redirect(route('posts.all', $user_id))->with('flash-message', 'Your post has been deleted.');
    }
}
