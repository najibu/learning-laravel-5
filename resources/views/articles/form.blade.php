<div class="form-group">
	{!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('body', 'Body:') !!}
	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('published_at', 'Published On:') !!}
	{!! Form::input('date', 'published_at', $article->published_at, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tags_list', 'Tags:') !!}
	{!! Form::select('tags_list[]', $tags, null, ['id' => 'tags_list', 'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('footer')
	<script type="text/javascript">
		$('#tags_list').select2({
			placeholder: 'Choose a tag',
			tags: true,
			data: [
				{id: 'one', text: 'One'},
				{id: 'two', text: 'Two'}
			]
		});
	</script>
@stop