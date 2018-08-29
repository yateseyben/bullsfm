@extends('layouts.app')
@section('content')
<div class ="breadcrumbs">
	<a href="{{ route('forums.index') }}">Forums</a> < <b>{{ $forum->getName() }}</b>
</div>
<h1>{{ $forum->getName() }}</h1>

<div class ="create-new-button">
	<a href="{{ route('forums.createTopic', $forum->id) }}"><i class="fas fa-plus"></i> New Topic</a>
</div>

<div class = "topic-list listings">
	<table>
		<thead>
			<th width ="60%">Name</th>
			<th width ="10%">Posts</th>
			<th width ="30%">Last Update</th>
		</thead>
		@foreach($topics as $topic)
		<tr>
			<tbody>
				<td class ="topic-listing-title"><a href="{{ route('topics.show', $topic->id) }}">{{ $topic->getTitle() }}</a></td>
				<td>{{ $topic->posts()->count() }}</td>
				<td>{{ \Carbon\Carbon::parse($topic->posts()->max('created_at'))->format('d M Y g:i a') }}</td>	
			</tbody>
		</tr>
		@endforeach
</div>
@endsection