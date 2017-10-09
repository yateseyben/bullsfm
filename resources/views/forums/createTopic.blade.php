<h1>Create a Topic</h1>

{{ Form::open(array('route' => ['forums.storeTopic', $forum->id], 'method' => 'post')) }}

<div class = "form">
	<input name = "title" type = "text" placeholder="Enter the title of your topic">
	<input name = "content" type = "text" placeholder="Enter some content">
	<input name = "forum_id" value = "{{ $forum->id }}" hidden>
	<button type="submit">Create Topic</button>
</div>

	{{ Form::close() }}