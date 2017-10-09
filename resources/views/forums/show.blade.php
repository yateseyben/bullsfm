<h1>{{ $forum->name }}</h1>

<div class = "topic-list">
	@foreach($topics as $topic)
	<a href = "{{ route('topics.show', $topic->id) }}">{{ $topic->title }}</a>
	@endforeach
</div>