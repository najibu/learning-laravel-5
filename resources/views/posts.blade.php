<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	@foreach ($posts as $post)
		<article>
			<h2>{{ $posts->title }}</h2>
			<div class="body">{{ $post->body }}</div>
		</article>
	@endforeach
</body>
</html>