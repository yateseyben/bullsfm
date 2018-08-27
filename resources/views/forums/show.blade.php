@extends('layouts.app')
@section('content')
<h1>{{ $forum->name }}</h1>

<a href="{{ route('forums.createTopic', $forum->id) }}">Create A New Topic</a>

<div class = "topic-list">
	@foreach($topics as $topic)
	<a href = "{{ route('topics.show', $topic->id) }}">{{ $topic->title }}</a>
	@endforeach
</div>
@endsection