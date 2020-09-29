<div class="row">

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