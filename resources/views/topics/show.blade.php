<h1>Topic Title {{ $topic->title }}</h1>
<b>Created By {{ $topic->user->name }}</b>
<div class="topic-content">
	<p>Content: {{ $topic->content }}</p>
	<a href="{{ route('topics.edit', $topic->id) }}">Edit Topic</a>
</div>

<div class="post-form">
	{!! Form::open(array('route' => ['topics.createPost', $topic->id], 'id' =>'post-form', 'method' => 'post')) !!}

	<input type = "text" name = "content">

	<button type="submit">Submit</button>

	<div class = "posts">
		@foreach($posts as $post)
		<div class = "post">
			<b>{{ $post->user->name }}</b>
			<p>{{ $post->content }}</p>
		</div>
		@endforeach
	</div>

	{!! Form::close() !!}

</div>