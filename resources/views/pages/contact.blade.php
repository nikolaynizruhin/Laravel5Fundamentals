@extends('app')

@section('content')
<h2>{{$title}}</h2>
<hr>

@if (count($contacts))
	<ul class="list-group">
		@foreach ($contacts as $contact)
			<li class="list-group-item">
				{{ $contact }}
			</li>
		@endforeach
	</ul>
@endif

@stop