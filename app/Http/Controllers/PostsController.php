<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Post;
use Illuminate\Http\Request;
use View;

class PostsController extends Controller
{
	public function edit($id, Request $request)
	{
		$post = Post::findOrFail($id);

		if($request->user()->cannot('update', $post))
		{
			$request->session()->flash('auth_error', 'You cannot edit another user\'s post');
			return redirect(route('topics.show', $post->topic->id));
		}
		return view::make('posts.edit')->with('post', $post);
	}

	public function updatePost($id, Request $request)
	{
		$post = Post::findOrFail($id);
		$input = $request->only(['content']);
		$post->updatePost($input);
		return redirect(route('topics.show', $post->topic->id));
	}

	public function delete($id)
	{
		$post = Post::findOrFail($id);
		$post->deletePost();
		return redirect(route('topics.show', $post->topic->id));
	}
}
