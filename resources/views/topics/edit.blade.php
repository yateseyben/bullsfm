<h1>Create a Topic</h1>

<div class = "form">
	{{ Form::open(array('route' => ['topics.update', $topic->id], 'method' => 'post')) }}

	<input name = "title" type = "text" placeholder="Enter the title of your topic" value = "{{ $topic->title }}">
	<input name = "content" type = "text" placeholder="Enter some content" value = "{{ $topic->content }}">
	<input name = "forum_id" value = "{{ $topic->forum->id }}" hidden>
	<button type="submit">Create Topic</button>

	{{ Form::close() }}
</div>