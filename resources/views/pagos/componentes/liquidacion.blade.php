	
		<div class="modal fade" id="liquidacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
							aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Liquidaciones</h4>
						</div>
						<div class="modal-body">
							<form action="{{route('price-liquida-todo')}}" method="post">
								{{ csrf_field() }}
           
         
								
								<div class="form-group has-feedback">
									<label for="">Fecha Desde</label>
									<input type="date" class="form-control" name="desde" required>
								</div>
								
								<div class="form-group has-feedback">
									<label for="">Fecha Hasta</label>
									<input type="date" class="form-control" name="hasta" required>
								</div>
								
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Aceptar Liquidacion</button>
								</div>
							</form>
						
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>