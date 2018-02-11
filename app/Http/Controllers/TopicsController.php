<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Post;
use View;
use Auth;

class TopicsController extends Controller
{
	public function show($id)
	{
		$topic = Topic::findOrFail($id);
		$posts = $topic->posts;
		return View::make('topics.show')->with('topic', $topic)->with('posts', $posts);
	}

	public function createPost($topicID, Request $request)
	{
		if(!Auth::check())
			{
				$request->session()->flash('auth_error', 'You must be logged in to create a Post.');
				return redirect(route('topics.show', $topicID));
			}
			
		$input = $request->only('content');
		$input['user_id'] = Auth::id();
		$input['topic_id'] = $topicID;

		Post::create($input);

		return redirect(route('topics.show', $topicID));
	}

	public function edit($id)
	{
		$topic = Topic::findOrFail($id);
		return view::make('topics.edit')->with('topic', $topic);
	}

	public function update($id, Request $request)
	{
		$topic = Topic::findOrFail($id);
		$input = $request->only(['title', 'content']);
		$topic->updateTopic($input);
		return redirect(route('topics.show', $topic->id));
	}

}
