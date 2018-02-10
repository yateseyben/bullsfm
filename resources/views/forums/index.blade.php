@extends('layouts.app')
@section('content')
<h1>Forums</h1>

@foreach($forums as $forum)
<div class = "forum-link">
	<a href = "{{ route('forums.show',$forum->id) }}" >{{ $forum->name }}</a>
</div>
@endforeach
@endsection