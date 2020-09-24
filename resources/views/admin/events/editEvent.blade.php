<input type="hidden" name="event_id" value="{{ $evento->id }}">
<div class="col-md-12">
	<div class="form-group">
		<label>Título del Evento</label>
		<input type="text" class="form-control" name="title" value="{{ $evento->title }}" required>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label>Mentor</label>
		<select class="form-control" name="user_id" required>
			@foreach ($mentores as $mentor)
			<option value="{{ $mentor->ID }}" @if ($mentor->ID == $evento->user_id) selected @endif>{{ $mentor->user_email }}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label>Categoría</label>
		<select class="form-control" name="category_id" required>
			@foreach ($categorias as $categoria)
			<option value="{{ $categoria->id }}" @if ($categoria->id == $evento->category_id) selected @endif>{{ $categoria->title }}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label>Descripción</label>
		<textarea name="description" class="form-control" id="description2" cols="30" rows="10" required>{{ $evento->description }}</textarea>
	</div>
</div>
<div class="col-md-12">
	<label>Fecha</label>
	<input type="date" class="form-control" name="date" value="{{$evento->date}}" required>
</div>
<div class="col-md-12">
	<label>Hora</label>
	<input type="time" class="form-control" name="time" value="{{$evento->time}}" required>
</div>
<div class="col-md-12">
	<label>Duración (Minutos)</label>
	<input type="number" class="form-control" name="duration" value="{{ $evento->duration }}" required>
</div>
<div class="col-md-12">
	<div class="form-group">
		<label class="control-label text-center">Banner</label>
		<input class="form-control" type="file" name="banner">
	</div>
</div>