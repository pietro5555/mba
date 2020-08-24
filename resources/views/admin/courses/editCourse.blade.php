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
			<select class="form-control" name="category_id" id="category_id2" required onchange="loadSubcategories('edit');">
				@foreach ($categorias as $categoria)
					<option value="{{ $categoria->id }}" @if ($curso->category_id == $categoria->id) selected @endif>{{ $categoria->title }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label>Subcategoría</label>
			<select class="form-control" name="subcategory_id" id="subcategory_id2" required>
				@foreach ($subcategorias as $subcategoria)
					<option value="{{ $subcategoria->id }}" @if ($curso->subcategory_id == $subcategoria->id) selected @endif>{{ $subcategoria->title }}</option>
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
</div>