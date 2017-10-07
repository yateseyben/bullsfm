<h1>Topic Title {{ $topic->title }}</h1>
<p>Content: {{ $topic->content }}

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