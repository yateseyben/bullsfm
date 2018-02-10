@extends('layouts.app')
@section('content')
<div class="edit-post">
	<h1> Edit Post</h1>
	{!! Form::open(array('route' => ['posts.updatePost', $post->id], 'id' =>'post-form', 'method' => 'post')) !!}

	<input name = "content" type = "text" value = "{{ $post->content }}">

	<button type = "submit">Save Changes</button>

	{!! Form::close() !!}

</div>
@endsection

