@extends('layouts.app')
@section('content')
<div class ="breadcrumbs">
	<a href="{{ route('forums.index') }}">Forums</a> < <b>{{ $forum->getName() }}</b>
</div>
<h1>{{ $forum->getName() }}</h1>

<a href="{{ route('forums.createTopic', $forum->id) }}">Create A New Topic</a>

<div class = "topic-list listings">
	<table>
		<thead>
			<th width ="60%">Name</th>
			<th width ="10%">Posts</th>
			<th width ="30%">Last Update</th>
		</thead>
		@foreach($topics as $topic)
		<tr class="clickable-row" data-href="{{ route('topics.show', $topic->id) }}">
			<tbody>
				<td><a href="{{ route('topics.show', $topic->id) }}">{{ $topic->getTitle() }}</a></td>
				<td>{{ $topic->posts()->count() }}</td>
				<td>{{ \Carbon\Carbon::parse($topic->posts()->max('created_at'))->format('d M Y g:i a') }}</td>	
			</tbody>
		</tr>
		@endforeach
</div>
@endsection
<script>

jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});

</script>