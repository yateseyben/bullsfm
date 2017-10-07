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
		//dd($topic->posts);
		return View::make('topics.show')->with('topic', $topic)->with('posts', $posts);
	}

	public function createPost($topicID, Request $request)
	{
		$input = $request->only('content');
		$input['user_id'] = Auth::id();
		$input['topic_id'] = $topicID;

		Post::create($input);

		return redirect(route('topics.show', $topicID));
	}
}
