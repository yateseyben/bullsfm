<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class ForumsController extends Controller
{

	public function index()
	{
		return view::make('forums.index');
	}
}
