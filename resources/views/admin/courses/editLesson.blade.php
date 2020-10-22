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
			<label>Título de la Lección (Inglés)</label>
			<input type="text" class="form-control" name="english_title" value="{{ $leccion->english_title }}" required>
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
			<label>URL Español</label>
			<input type="url" class="form-control" name="url" value="{{ $leccion->url }}" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label>URL Inglés</label>
			<input type="url" class="form-control" name="english_url" value="{{ $leccion->english_url }}">
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label>Nivel de Acceso</label>
			<select class="form-control" name="subcategory_id" id="" required>
				<option value="" disabled @if ($leccion->subcategory_id == 0) selected @endif>Seleccione una categoria</option>
				@foreach ($subcategory as $sub)
				<option value="{{$sub->id}}" @if ($sub->id == $leccion->subcategory_id) selected @endif>{{$sub->title}}</option>
				@endforeach
			</select>
		</div>
	</div>
</div>