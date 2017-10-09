<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use View;

class ForumsController extends Controller
{

	public function index()
	{
		$forums = Forum::all();
		return view::make('forums.index')->with('forums', $forums);
	}
}
