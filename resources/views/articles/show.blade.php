@extends('app')

@section('content')
	<h2>Articles</h2>
	<hr>
	<h3>
		{{ $article->title }}
	</h3>
	<p>{{ $article->body }}</p>

	@unless ($article->tags->isEmpty())
		<h4>Tags:</h4>
		<ul>
			@foreach ($article->tags as $tag)
				<li>{{ $tag->name }}</li>
			@endforeach
		</ul>
	@endunless
@stop