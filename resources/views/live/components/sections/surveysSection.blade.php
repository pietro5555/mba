@if(Auth::user()->rol_id==3)
                                @if(!empty($resources_survey))
                                    <div>
                                        <h5 class="text-primary">Responde estas preguntas</h5>
                                    </div>

                                    <form action="{{ route ('save.survey.student')}}" method="POST">
                                        @csrf
                                        <div class="mb-2 form-group">
                                            @foreach($resources_survey  as $encuesta)
                                            <input type="hidden" name="row[]" value="{{$loop->index}}">
                                                <label class="mt-2" for="label-question{{$encuesta->pregunta->question}}">{{$encuesta->pregunta->question}}</label>
                                                 <select class="browser-default custom-select" name="response[]" id="response">
                                                <option selected>Selecciona una respuesta</option>
                                                @foreach($encuesta->pregunta->responses->where('selected', 0)  as $respuesta)
                                                    <option value="{{$respuesta->response}}">{{$respuesta->response}}</option>
                                                @endforeach
                                                </select>

                                                <input type="hidden" name="survey_options_id[]" value='{{$encuesta->pregunta->id}}' required>
                                            @endforeach



                                            <input type="hidden" name="event_id" value='{{$event->id}}' required>
                                            <input type="hidden" name="user_id" value='{{Auth::user()->ID}}' required>
                                            <input type="hidden" name="selected" value='1' required>
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
                                    <h4 class="text-white">Estadísticas de encuesta</h4>
                                </div>
                                <div>
                                    <canvas id="myChart" width="400" height="400"></canvas>
                                </div>
                            @endif