<div class="row">
	<input type="hidden" name="event_id" value="{{ $event->id }}">
	<div class="col-md-12">
		<div class="form-group">
			<label>Título del Evento</label>
			<input type="text" class="form-control" name="title" value="{{ $event->title }}" required>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
			<label>Mentor</label>
			<select class="form-control" name="mentor_id" required>
                <option value="" selected disabled>Seleccione un mentor..</option>
                @foreach ($mentores as $mentor)
                    <option value="{{ $mentor->ID }}"  @if ($event->user_id == $mentor->ID) selected @endif >{{ $mentor->user_email }}</option>
                @endforeach
            </select>
		</div>
	</div>
	<div class="col-md-12">
        <div class="form-group">
            <label>Descripción</label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="10" required>{{ $event->description }}</textarea>
        </div>
    </div>


    <div class="col-md-12">
		<div class="form-group">
           <label class="control-label text-center">Cursos</label>
                <select name="cursos" class="form-control" required>
                    <option value="" selected disabled>Seleccione un Curso</option>
                      @foreach($cursos as $curs)
                        <option value="{{$curs->id}}" @if ($event->id_courses == $curs->id) selected @endif>{{$curs->title}}</option>
                      @endforeach
                </select>       
        </div>
	</div>

   <div class="col-md-12">
		<div class="form-group">
			<label>Imagen de Cover</label>
			<input id="file-input" name="image" type="file"/>
		</div>
	</div>	 
</div>
