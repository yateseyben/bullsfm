@extends('layouts.app')
@section('content')
<div class ="breadcrumbs">
	<b>Forums</b>
</div>
<h1>Forums</h1>

@foreach($forums as $forum)
<div class = "forum-link">
	<a href = "{{ route('forums.show',$forum->id) }}" >{{ $forum->name }}</a>
</div>
@endforeach
@endsection