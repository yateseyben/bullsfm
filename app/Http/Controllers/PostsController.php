<?php

namespace App\Http\Controllers;

use Gate;
use App\Models\Post;
use Illuminate\Http\Request;
use View;

class PostsController extends Controller
{
	public function edit($id)
	{
		$post = Post::findOrFail($id);
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
