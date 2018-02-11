@extends('layouts.app')
@section('content')
<h1>Topic Title {{ $topic->title }}</h1>
<b>Created By {{ $topic->user->name }}</b>
<div class="topic-content">
	<p>Content: {{ $topic->content }}</p>
	<a href="{{ route('topics.edit', $topic->id) }}">Edit Topic</a>
</div>

@if(session()->has('auth_error'))
<div class="alert alert-danger }}"> 
	{!! session('auth_error') !!}
</div>
@endif

@auth
<div class="post-form">
	{!! Form::open(array('route' => ['topics.createPost', $topic->id], 'id' =>'post-form', 'method' => 'post')) !!}

	<input type = "text" name = "content">

	<button type="submit">Submit</button>
</div>
@endauth

@guest
<div class="login-link">
	<a href="{{ route('login') }}">Login to leave a comment.</a>
</div>
@endguest

<div class = "posts">
	@foreach($posts as $post)
	<div class = "post">
		<b>{{ $post->user->name }}</b>
		<p>{{ $post->content }}</p><a href = "{{ route('posts.edit', $post->id) }}">Edit</a> <a href = "{{ route('posts.delete', $post->id) }}">Delete</a>
	</div>
	@endforeach
</div>

{!! Form::close() !!}

@endsection