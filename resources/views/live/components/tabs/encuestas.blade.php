@if(Auth::user()->rol_id==3)
@if(!empty($surveys))
<div>
    <h5 class="text-primary">Responde estas preguntas</h5>
</div>

<form action="{{ route ('save.survey.student')}}" method="POST">
    @csrf
    @foreach($surveys as $survey)
    <div class="mb-2 form-group">
        <label for="label-question{{$survey->question}}">{{$survey->question}}</label>
        <select class="browser-default custom-select" name="response" id="response">
            <option selected>Selecciona una respuesta</option>
            @foreach($survey->responses as $respuesta)
            <option value="{{$respuesta->response}}">{{$respuesta->response}}</option>
            @endforeach
        </select>
        <input type="hidden" name="survey_options_id" value='{{$survey->id}}' required>
        <input type="hidden" name="event_id" value='{{$event->id}}' required>
    </div>
    @endforeach
    <button class="btn btn-smal btn-success float-right" type="submit">Enviar</button>
</form>
@else
<div>
    <h6 class="text-primary">
        No hay encuestas asignadas.
    </h6>
</div>
@endif
@endif
@if(Auth::user()->rol_id==2)
<div>
    <h4>Estadísticas de encuesta</h4>
</div>
<div>
    <canvas id="myChart" width="400" height="400"></canvas>
</div>


@endif
