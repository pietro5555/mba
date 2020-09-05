<div class="row">
	<input type="hidden" name="lesson_id" value="{{ $leccion->id }}">
	<div class="col-md-12">
		<div class="form-group">
			<label>Título</label>
			<input type="text" class="form-control" name="title" value="{{ $leccion->title }}" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label>Descripción</label>
			<textarea class="form-control" name="description">{{ $leccion->description }}</textarea> 
		</div>
    </div>
    <div class="col-md-12">
		<div class="form-group">
			<label>URL</label>
			<input type="url" class="form-control" name="url" value="{{ $leccion->url }}" required>
		</div>
	</div>
</div>