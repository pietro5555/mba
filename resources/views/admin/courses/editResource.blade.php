<div class="row">
	<input type="hidden" name="resource_id" value="{{ $material->id }}">
	<div class="col-md-12">
		<div class="form-group">
			<label>Título</label>
			<input type="text" class="form-control" name="title" value="{{ $material->title }}" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label>Tipo</label>
			<select class="form-control" name="type" id="type2" onchange="changeType('update');"> 
				<option value="Archivo" @if ($material->type == 'Archivo') selected @endif>Archivo</option>
				<option value="Enlace" @if ($material->type == 'Enlace') selected @endif>Enlace</option>
			</select>
		</div>
    </div>
    <div class="col-md-12" id="file_div2" @if ($material->type == 'Archivo') style="display: block;" @else style="display: none;" @endif>
		<div class="form-group">
			<label>Archivo</label>
			<input type="file" class="form-control" name="file" id="file2">
		</div>
	</div>
    <div class="col-md-12" id="url_div2" @if ($material->type == 'Enlace') style="display: block;" @else style="display: none;" @endif>
		<div class="form-group">
			<label>URL</label>
			<input type="url" class="form-control" name="url" id="url2" @if ($material->type == 'Enlace') value="{{ $material->material }}" @endif>
		</div>
	</div>
</div>