<div class="row">
	<input type="hidden" name="course_id" value="{{ $curso->id }}">
	<div class="col-md-12">
		<div class="form-group">
			<label>Título del Curso</label>
			<input type="text" class="form-control" name="title" value="{{ $curso->title }}" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label>Categoría</label>
			<select class="form-control" name="category_id" required>
				@foreach ($categorias as $categoria)
					<option value="{{ $categoria->id }}" @if ($curso->category_id == $categoria->id) selected @endif>{{ $categoria->title }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label>Subcategoría</label>
			<select class="form-control" name="subcategory_id" required>
				@foreach ($subcategorias as $subcategoria)
					<option value="{{ $subcategoria->id }}" @if ($curso->subcategory_id == $subcategoria->id) selected @endif>{{ $subcategoria->title }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label>Mentor</label>
			<select class="form-control" name="mentor_id" required>
				@foreach ($mentores as $mentor)
					<option value="{{ $mentor->ID }}" @if ($curso->mentor_id == $mentor->ID) selected @endif>{{ $mentor->user_email }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label>Descripción</label>
			<textarea class="form-control" name="description">{{ $curso->description }}</textarea> 
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label>Imagen de Cover</label>
			<input type="file" class="form-control" name="cover" >
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label>Etiquetas Disponibles</label>
			<div class="row">
				@foreach ($etiquetas as $etiqueta)
					@php
						$check = 0;
						if (in_array($etiqueta->id, $etiquetasActivas)){
							$check = 1;
						}
					@endphp
					<div class="col-sm-6 col-md-3">
						<input type="checkbox" class="form-check-input" name="tags[]" value="{{ $etiqueta->id }}" @if ($check == 1) checked @endif>
						<label class="form-check-label">{{ $etiqueta->tag }}</label>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>