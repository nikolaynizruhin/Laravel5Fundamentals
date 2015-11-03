@extends('app')

@section('content')
<h2>Articles</h2>
<hr>
@foreach ($articles as $article)
<h3>
	<a href="{{ url('articles', $article->id) }}">{{ $article->title }}</a>
</h3>
<p>{{ $article->body }}</p>
@endforeach
@stop