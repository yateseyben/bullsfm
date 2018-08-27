@extends('layouts.app')
@section('content')
<div class ="breadcrumbs">
	<a href="{{ route('forums.index') }}">Forums</a> < <b>{{ $forum->getName() }}</b>
</div>
<h1>{{ $forum->getName() }}</h1>

<a href="{{ route('forums.createTopic', $forum->id) }}">Create A New Topic</a>

<div class = "topic-list">
	@foreach($topics as $topic)
	<a href = "{{ route('topics.show', $topic->id) }}">{{ $topic->title }}</a>
	@endforeach
</div>
@endsection