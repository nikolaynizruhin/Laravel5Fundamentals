@extends('app')

@section('content')

	<h2>Create Article</h2>
	<hr>

	{!! Form::model($article = new \App\Article, ['url' => 'articles']) !!}
		@include('articles.form', ['submitButtonText' => 'Add Article'])
	{!! Form::close() !!}

	@include('errors.list')

@stop