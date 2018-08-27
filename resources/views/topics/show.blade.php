@extends('layouts.app')
@section('content')
<div class ="breadcrumbs">
	<a href="{{ route('forums.index') }}">Forums</a> < <a href="{{ route('forums.show', $topic->forum->id) }}"> {{ $topic->forum->getName() }}</a> < <b>{{ $topic->getTitle() }}</b>
</div>
<h1>{{ $topic->getTitle() }}</h1>
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
		<p>{{ $post->content }}</p>@can('update', $post)<a href = "{{ route('posts.edit', $post->id) }}">Edit</a>@endcan @can('delete', $post)<a href = "{{ route('posts.delete', $post->id) }}">Delete</a>@endcan
	</div>
	@endforeach
</div>

{!! Form::close() !!}

@endsection