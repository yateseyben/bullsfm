<h1>Forums</h1>

@foreach($forums as $forum)
<div class = "forum-link">
	{{ $forum->name }}
</div>
@endforeach