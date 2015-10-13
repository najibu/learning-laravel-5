@extends('app')

@section('content')

<h1>About</h1>

@if (count($people))
	<h3>People I like: </h3>

	<ul>
		@foreach ($people as $person)
			<li>{{ $person }}</li>
		@endforeach
	</ul>
@endif

	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo sit repellat adipisci eum tenetur ad unde aspernatur beatae vero dolores numquam, ut ipsa cupiditate deleniti, ullam optio, animi error consequatur.</p>
@stop