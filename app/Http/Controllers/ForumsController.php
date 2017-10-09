<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Forum;
use App\Models\Topic;
use Illuminate\Http\Request;
use View;

class ForumsController extends Controller
{

	public function index()
	{
		$forums = Forum::all();
		return view::make('forums.index')->with('forums', $forums);
	}

	public function createTopic($id)
	{
		$forum = Forum::findOrFail($id);
		return view::make('forums.createTopic')->with('forum', $forum);
	}

	public function storeTopic($id, Request $request)
	{
		$input = collect($request)->only(['title', 'content']);
		$input['user_id'] = Auth::id();
		$forum = Forum::findOrFail($id);;
		$forum->createTopic($input);

		return redirect(route('topics.show', Topic::all()->last()->id));
	}

	public function show($id)
	{
		$forum = Forum::find($id);
		$topics = $forum->topics;

		return view::make('forums.show')->with('forum', $forum)->with('topics', $topics);
	}
}
