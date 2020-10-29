<div class="modal fade" id="option-modal-survey" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Encuestas</h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            @if(Auth::user()->rol_id==3)
                                @if(!empty($surveys))
                                    <div>
                                        <h5 class="text-primary">Responde estas preguntas</h5>
                                    </div>
                                    
                                    <form action="{{ route ('save.survey.student')}}" method="POST">
                                        @csrf
                                        <div class="mb-2 form-group">
                                            <label for="label-question{{$surveys->question}}">{{$surveys->question}}</label>
                                            <select class="browser-default custom-select" name="response" id="response">
                                                <option selected>Selecciona una respuesta</option>
                                                @foreach($survey_response as $respuesta)
                                                <option value="{{$respuesta->response}}">{{$respuesta->response}}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="survey_options_id" value='{{$surveys->id}}' required>
                                            <input type="hidden" name="event_id" value='{{$event->id}}' required>
                                        </div>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
